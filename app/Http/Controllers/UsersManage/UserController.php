<?php

/**
 * users
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\SysConfig;
use App\Models\UserManageLogs;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class UserController extends AdminBaseController {

    protected $modelName = 'App\Models\User';

    protected $customViewPath = 'user';

    protected $customViews = [ 'index', 'resetPassword' ];

    protected function beforeRender() {
        parent::beforeRender();
        $aBlockedTypes = baseOption('base.user.blocked_type');
        $aTesters = baseOption('base.isTester');
        $this->setVars(compact('aTesters', 'aBlockedTypes'));

    }

    /**
     * 冻结/解除冻结入口
     *
     * @param $id 用户id
     *
     * @return RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function blockedUser($id) {
        if($this->request->isMethod('post')){
            $iBlocked = intval($this->request->blocked) ?? 0;
            $aComment = $this->request->comment ?? null;
            list($bSucc, $sMsg) = $this->model->setUserBlockedStatus($id, $iBlocked, $aComment);

            return $this->renderReturn($bSucc, $sMsg);
        }

        return $this->goBackToIndex('warning', ___('_users.illegal-request'));
    }

    /**
     * 重置密码
     *
     * @param $id 用户ID
     *
     * @return UserController|\Illuminate\Http\RedirectResponse
     */
    public function resetPassword($id) {
        if(!$oUser = $this->model->find($id)){
            return $this->goBackToIndex('error', 'users not exists');
        }
        if($this->request->isMethod('PUT')){
            \DB::beginTransaction();
            list($bSucc, $sMsg) = $this->model->updatePassword($oUser, $this->request);
            if(!$bSucc) return $this->renderReturn($bSucc, $sMsg);
            $bSucc && $bSucc = UserManageLogs::createLog($oUser->id, $sMsg);
            if($bSucc) \DB::commit();
            \DB::rollback();

            return $this->renderReturn($bSucc, $sMsg);
        }else{
            $this->setVars('data', $oUser);

            return $this->render();
        }
    }

    public function renderReturn($bSucc, $sMsg) {
        if($bSucc){
            // $this->createUserManageLogs();
            return $this->goBackToIndex('success', $sMsg);
        }

        return $this->goBack('error', $sMsg);
    }

    /**
     * 添加用户管理日志
     *
     * @param int  $iUserId
     * @param null $sComment
     *
     * @return bool
     */
    protected function createUserManageLogs($iUserId = 0, $sComment = null) {
        if(empty($iUserId) || empty($sComment)){
            $aFunction = debug_backtrace();
            for($i = 0; $i < count($aFunction); $i++){
                switch($aFunction[ $i ]['function']){
                    case 'blockedUser':
                        if(empty($this->params['blocked'])) $this->params['blocked'] = 0;
                        empty($sComment) && $sComment = baseOption('base.user.blocked_type')[ $this->params['blocked'] ].'：'.( empty($this->params['comment']) ? $sComment : $this->params['comment'] );
                        empty($iUserId) && $iUserId = !empty($aFunction[ $i ]['args'][0]) ? $aFunction[ $i ]['args'][0] : 0;
                        break 2;
                    case 'resetPassword':
                        empty($sComment) && $sComment = '重置密码：'.( empty($this->params['description']) ? $sComment : $this->params['description'] );
                        empty($iUserId) && $iUserId = !empty($aFunction[ $i ]['args'][0]) ? $aFunction[ $i ]['args'][0] : 0;
                        break 2;
                    default:
                        if($i > 5) break 2;
                        break;
                }
            }
        }

        return parent::createUserManageLogs($iUserId, $sComment);
    }

    // 删除 副表搜索参数
    protected function compileParams() {
        if(isset($this->params['account_available_from'])) unset($this->params['account_available_from']);
        if(isset($this->params['account_available_to'])) unset($this->params['account_available_to']);
    }

    // 添加账户表搜索参数
    protected function customSearchConditions($oQuery, $aParams) {
        if(!empty($aParams['account_available_from'])){
            $oQuery = $oQuery->with('account')->whereHas('account', function($q) use ($aParams) {
                if(!empty($aParams['account_available_to'])){
                    $q->where('available', '>=', $aParams['account_available_from'])
                        ->where('available', '<=', $aParams['account_available_to']);
                }else{
                    $q->where('available', '>=', $aParams['account_available_from']);
                }
            });
        }else if(!empty($aParams['account_available_to'])){
            $oQuery = $oQuery->with('account')->whereHas('account', function($q) use ($aParams) {
                $q->where('available', '<=', $aParams['account_available_to']);
            });
        }

        return $oQuery;
    }
}
