<?php
namespace App\Http\Controllers;


use App\Models\AuditList;
use App\Models\User;
use DB;
use Auth;
use App\Models\AuditType;

class AuditListController extends AdminBaseController {

    protected $modelName = 'App\Models\AuditList';
    protected $resource = 'audit-lists';


    function diffBetweenTwoDays($day1, $day2) {
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);

        if ($second1 < $second2) {
            $tmp = $second2;
            $second2 = $second1;
            $second1 = $tmp;
        }
        return ($second1 - $second2) / 86400;
    }

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        parent::beforeRender();
        $sModelName = $this->modelName;
        $aAuditTypes = AuditType::getAuditTypes();
        $aStatus = [];

        foreach ($sModelName::$statusDesc as $key => $value) {
            $aStatus[$key] = ___('_auditlist.' . $value);
        }

        $this->setVars(compact('aAuditTypes', 'aStatus'));
    }

    /**
     * [updateAuditRecord 新增审核记录, 或修改审核状态]
     *
     * @param  [Array] $data [审核记录结构的数据]
     *
     * @return [Boolean]       [成功/失败]
     */
    private function updateAuditRecord() {
        $aRules = AuditList::$rules;
        $aRules['status'] = 'required|' . $aRules['status'];
        $bSucc = false;
        if ($bSucc = $this->model->save($aRules)) {
            if ($this->model->status == AuditList::STATUS_AUDITED) {
                $oUser = User::find($this->model->user_id);
                if ($oUser) {
                    /*if ($bSucc = $this->model->explodeParams($oUser)) {*/ // 2018-07-07 使用新解析函数
                    if ($bSucc = $this->model->analysisParams($oUser)) {
                        $bSucc = $oUser->forceSave();
                    }
                }
            }
        }
        return $bSucc;
    }

    /**
     * [changeStatus 改变审核记录状态]
     *
     * @param  [Int] $id   [记录id]
     * @param  [Int] $iStatus [状态类型，见AuditList 的Model]
     *
     * @return [Response]       [框架的响应]
     */
    private function changeStatus($id, $iStatus) {
        $this->model = AuditList::find($id);
        if (!$this->model->exists) {
            $sMsg = ___(sprintf('%s not exists', $this->resourceName));
            return $this->goBack('error', $sMsg);
        }
        if ($iStatus != AuditList::STATUS_CANCELED && $this->model->author_id == session('admin_user_id')) { // 不能审核自己的申请
            return $this->goBack('error', ___('_auditlist.audit-failed-self'));
        }
        if ($this->model->status != AuditList::STATUS_IN_AUDITING) { // 状态不在 待审核中 不能审核
            return $this->goBack('error', ___('_auditlist.status-error'));
        }
        if (in_array($iStatus, [AuditList::STATUS_AUDITED, AuditList::STATUS_REJECTED])) {
            $this->model->auditor_id = session('admin_user_id');
            $this->model->auditor = session('admin_username');
        }
        $this->model->status = $iStatus;
        DB::beginTransaction();
        $bSucc = $this->updateAuditRecord();
        if ($bSucc) {
            DB::connection()->commit();
        } else {
            DB::connection()->rollBack();
        }
        return $this->renderReturn($bSucc, AuditList::$statusDesc[$iStatus]);
    }

    /**
     * [renderReturn description]
     *
     * @param  [Boolean] $bSucc [成功/失败]
     * @param  [Int]     $sDesc [状态类型描述]
     *
     * @return [Response]       [框架的响应]
     */
    private function renderReturn($bSucc, $sDesc) {
        if ($bSucc) {
            $this->createUserManageLogs();
            return $this->goBack('success', ___('_auditlist.change-status-success', ['status' => ___('_auditlist.' . $sDesc)]));
        } else {
            return $this->goBack('error', ___('_auditlist.change-status-fail', ['status' => ___('_auditlist.' . $sDesc)]), true);
        }
    }

    /**
     * [addAuditRecord 增加一条审核记录]
     *
     * @param [Array] $data [数据]
     */
    public function addAuditRecord($data) {
        DB::connection()->beginTransaction();
        $this->model->fill($data);
        $bSucc = $this->updateAuditRecord();
        if ($bSucc) {
            DB::connection()->commit();
        } else {
            DB::connection()->rollBack();
        }
        return $bSucc;
    }

    /**
     * [audit 审核通过]
     *
     * @param  [Int] $id [审核记录id]
     *
     * @return [type]     [description]
     */
    public function audit($id) {
        return $this->changeStatus($id, AuditList::STATUS_AUDITED);
    }

    /**
     * [reject 拒绝一条审核记录]
     *
     * @param  [Int] $id [审核记录id]
     *
     * @return [type]     [description]
     */
    public function reject($id) {
        return $this->changeStatus($id, AuditList::STATUS_REJECTED);
    }

    /**
     * [cancel 取消一条审核记录, 在该审核通过或拒绝之前, 添加该审核的管理员可修改其状态为取消]
     *
     * @param  [Int] $id [审核记录id]
     *
     * @return [type]     [description]
     */
    public function cancel($id) {
        $oAuditList = AuditList::find($id);
        $iAdminId = session('admin_user_id');
        // 只能取消自己提交的审核记录
        if ($oAuditList->author_id != $iAdminId) {
            return $this->goBack('error', ___('_audit_list.not-your-record'));
        }
        return $this->changeStatus($id, AuditList::STATUS_CANCELED);
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
        empty($iUserId) && $iUserId = $this->model->user_id;
        if (empty($sComment)) {
            $aAuditTypes = AuditType::getSelectSearchArrays();
            switch ($this->action) {
                case 'audit':
                    empty($sComment) && $sComment = $sComment = '审核通过['.(empty($aAuditTypes[$this->model->type_id]) ? $this->model->type_id : $aAuditTypes[$this->model->type_id]).']';
                    break;
                case 'reject':
                    empty($sComment) && $sComment = '审核拒绝['.(empty($aAuditTypes[$this->model->type_id]) ? $this->model->type_id : $aAuditTypes[$this->model->type_id]).']';
                    break;
                case 'cancel':
                    empty($sComment) && $sComment = '审核取消['.(empty($aAuditTypes[$this->model->type_id]) ? $this->model->type_id : $aAuditTypes[$this->model->type_id]).']';
                    break;
                default:
                    break;
            }
        }
        return parent::createUserManageLogs($iUserId, $sComment);
    }

}
