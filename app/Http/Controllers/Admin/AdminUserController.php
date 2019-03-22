<?php
namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\SysConfig;
use App\Events\BaseCacheEvent;

use Auth;
use DB;
use Session;
use Event;
use Hash;
use App\Models\Menu;
use Config;
use App\Models\AdminUser;
use App\Models\AdminPwdHistory;
use Tool;

/**
 * 管理员管理
 *
 * Class AdminUserController
 * @package App\Http\Controllers
 */
class AdminUserController extends AdminBaseController
{
    protected $customViewPath = 'admin.admin';
    protected $customViews    = [
        'create', 'resetPassword', 'edit', 'view', 'changePassword', 'profile'
    ];

    /**
     * 资源模型名称，初始化后转为模型实例
     * @var string|Illuminate\Database\Eloquent\Model
     */
    protected $modelName = 'App\Models\AdminUser';
    protected $resource  = 'admin-users';
    const menuid  = 0;

    protected function & _makeVadilateRules($oModel) {
        parent::_makeVadilateRules($oModel);
        $sClassName = get_class($oModel);
        $aRules     = $sClassName::$rules;
        $isEdit     = $oModel->exists;
        if ($isEdit) {
            array_forget($aRules, 'password');
            array_forget($aRules, 'password_confirmation');
        }
        if ($oModel->id) {
            $aRules['username'] = 'required|between:4,32|unique:admin_users,username,' . $oModel->id;
        }
        return $aRules;
    }

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        parent::beforeRender();
        $sModelName = $this->modelName;

        switch($this->action){
            case 'index':
            case 'view':
            case 'edit':
            case 'create':
            case 'profile':
                $sLanguageSource = SysConfig::readDataSource('sys_support_languages');
                $aLanguages      = SysConfig::getSource($sLanguageSource);
                $aMerchantIds      = Merchant::getSelectSearchArrays();
                $this->setVars(compact('aLanguages','aMerchantIds'));
                break;
        }
    }

    public function create($id = null) {
        if ($this->request->isMethod('POST')) {

//             pr($this->params);exit;
            $aReturnMsg = $this->model->generateUserInfo($this->params);

            if (!$aReturnMsg['success']) {
                $this->langVars['reason'] = $aReturnMsg['msg'];
                return $this->goBack('error', ___('_basic.create-fail', $this->langVars));
            }
            DB::connection()->beginTransaction();

            $info = $this->model;
            $bSucc = $this->model->save();

            if ($bSucc) {

//                $sPasswordConfirmation = isset($this->params['password_confirmation']) ? $this->params['password_confirmation'] : '';
//                $update = array(
//                    'password' =>bcrypt($sPasswordConfirmation),
//                );
//
//                $result = DB::table('admin_users')->where('id',$this->model->id)->update($update);

                DB::connection()->commit();
                $rr =  $this->model->id;
                $loginarray = array(
                    'id' =>$this->model->id,
                    'userid' =>$this->model->username,
                    'name' =>$this->model->name,
                    'status' =>0,
                    'receive' =>'20',
                    'authority' =>$this->model->id,
                    'img' =>$this->model->id
                );

                Event::fire(new BaseCacheEvent($this->model));

                return $this->goBackToIndex('success', ___('_basic.created', $this->langVars));
            } else {
                DB::connection()->rollback();
                $this->langVars['reason'] = & $this->model->getValidationErrorString();
                return $this->goBack('error', ___('_basic.create-fail', $this->langVars));
            }
        } else {
            $data = $this->model;
            $isEdit = false;
            $this->setVars(compact('data', 'isEdit'));
            $sModelName = $this->modelName;
            list($sFirstParamName, $tmp) = each($this->paramSettings);
            !isset($sFirstParamName) or $this->setVars($sFirstParamName, $id);
            $aInitAttributes = isset($sFirstParamName) ? [$sFirstParamName => $id] : [];
            $this->setVars(compact('aInitAttributes'));
            return $this->render();
        }
    }

    public function changePasswordOld() {
        $id = Auth::user()->id;
        return $this->updatePasswrod($id);
    }

    public function changePassword() {
        $id         = Session::get('admin_user_id');
        $oAdminUser = AdminUser::find($id);

        // pr($this->model->toArray());exit;
        if (!$oAdminUser) {
            $sMsg = __(sprintf('%s not exists', $this->resourceName));
            return $this->goBack('error', $sMsg);
        }

        $sLowerUsername = strtolower($oAdminUser->username);
        if ($this->request->isMethod('PUT')) {

            $sNewPassword = trim($this->params['password']);
            $sOldPassword = trim($this->params['old_password']);
            $sOldPwdSafe  = md5(md5(md5($sLowerUsername . $sOldPassword)));

            //判断输入的老密码是否和数据库中的一样
            if (!Hash::check($sOldPwdSafe, $oAdminUser->password)) {
                return $this->goBack('error', ___('_adminuser.old-pwd-error'));
            }

            //当密码到期或者重置密码后，不走这里  判断新旧密码是否一样
            if (!Session::get('force_change_pwd')) {
                if ($sOldPassword == $sNewPassword) {
                    return $this->goBack('error', ___('_adminuser.old-pwd-same'));
                }
            }
//            // 检查密码是否与过去的三次相同
//            if ($aPassedPwds = AdminPwdHistory::getPwdHistories($oAdminUser->id)) {
//                $sNewPwdSafe = md5(md5(md5($sLowerUsername . $sNewPassword)));
//                $bUsed       = false;
//                foreach ($aPassedPwds as $sPassedPwds) {
//                    if ($bUsed = Hash::check($sNewPwdSafe, $sPassedPwds)) {
//                        break;
//                    }
//                }
//                if ($bUsed) {
//                    return $this->goBack('error', ___('_adminuser.pwd-used'));
//                }
//            }
            $db         = DB::connection();
            $aFormData  = [
                'password'              => $sNewPassword,
                'password_confirmation' => trim($this->params['password_confirmation']),
            ];
            $db->beginTransaction();
            $aReturnMsg = $oAdminUser->resetPassword($aFormData, false);
            $bSucc      = $aReturnMsg['success'];
            if (!$bSucc) {
                return $this->goBack('error', $aReturnMsg['msg'], true);
            }
            $bSucc = $oAdminUser->setPwdChangedTime() && AdminPwdHistory::createRecord($oAdminUser->id, $oAdminUser->password);
            $bSucc ? $db->commit() : $db->rollback();
            if ($bSucc) {
                if (Session::get('force_change_pwd')) {
                    Session::forget('force_change_pwd');
                    return redirect()->route('admin.home');
                }
            }
            $sDesc = $bSucc ? ___('_user.password-updated') : ___('_basic.update-password-fail');
            return $this->renderReturn($bSucc, $sDesc);
        }
        else {
            $data = $oAdminUser;
            $this->setVars(compact('data'));
            return $this->render();
        }
    }

    /**
     * [resetPassword 重置管理员密码]
     * @param  [Int] $id [管理员id]
     * @return [Response]     [description]
     */
    public function resetPassword($id)
    {
        return $this->updatePasswrod($id);
    }

    /**
     * [updatePasswrod 重置密码]
     * @param  [Int] $id [管理员id]
     * @return [Response]     [description]
     */
    private function updatePasswrod($id)
    {
        $this->model  = $this->model->find($id);
        $isAdminReset = Auth::user()->id;

        if (!$this->model) {
            $sMsg = __(sprintf('%s not exists', $this->resourceName));
            return $this->goBack('error', $sMsg);
        }
        if ($this->request->isMethod('PUT')) {
            if ($isAdminReset) {
                $sNewPassword = trim($this->request->input('password'));
                $sNewPasswordConfirmation = trim($this->request->input('password_confirmation'));
                $aFormData                = [
                    'password'              => $sNewPassword,
                    'password_confirmation' => $sNewPasswordConfirmation,
                ];
                $aReturnMsg               = $this->model->resetPassword($aFormData);
                $bSucc                    = $aReturnMsg['success'];
                if (!$bSucc) {
                    return $this->goBack('error', $aReturnMsg['msg'], true);
                }
                $sDesc = $bSucc ? ___('_user.password-updated') : ___('_basic.update-password-fail');
            } else {
                return $this->goBack('error', ___('_basic.no-rights'), true);
            }
            return $this->renderReturn($bSucc, $sDesc);
        } else {
            $data = $this->model;
            $this->setVars(compact('data'));
            return $this->render();
        }
    }

    public function renderReturn($bSucc, $sDesc)
    {
        if ($bSucc) {
            return $this->goBackToIndex('success', $sDesc);
        } else {
            return $this->goBack('error', $sDesc, true);
        }
    }

    public function profile() {
        if ($this->request->isMethod('PUT')) {
            pr($this->params);
            $oAdminUser = AdminUser::find(Session::get('admin_user_id'));
            $oAdminUser->fill($this->params);
            if ($oAdminUser->save()) {
                return $this->renderReturn(TRUE, '_adminuser.profile-setted');
            }
            else {
                return $this->renderReturn(FALSE, '_adminuser.profile-set-failed');
            }
        }
        else {
            $data = AdminUser::find(Session::get('admin_user_id'));
            $this->setVars(compact('data'));
            return $this->render();
        }
    }

}
