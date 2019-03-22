<?php
namespace App\Models;


class AuditList extends BaseModel {
    const STATUS_IN_AUDITING = 0;
    const STATUS_AUDITED = 1;
    const STATUS_REJECTED = 2;
    const STATUS_CANCELED = 3;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'audit_lists';

    /**
     * 资源名称
     * @var string
     */
    public static $resourceName = 'AuditList';

    public static $columnForList = [
        'type_id',
        'username',
        'author',
        'auditor',
        'description',
        'status',
        'updated_at',
    ];

    public static $htmlSelectColumns = [
        'type_id' => 'aAuditTypes',
        'status' => 'aStatus', // 0:审核中, 1: 审核通过, 2: 审核拒绝, 3: 撤销密码重置
    ];

    public static $statusDesc = [
        self::STATUS_IN_AUDITING => 'in-auditting',
        self::STATUS_AUDITED => 'audited',
        self::STATUS_REJECTED => 'rejected',
        self::STATUS_CANCELED => 'canceled'
    ];

    protected $fillable = [
        'id',
        'type_id',
        'user_id',
        'author_id',
        'auditor_id',
        'username',
        'author',
        'auditor',
        'audit_data',
        'description',
        'status',
    ];
    public static $rules = [
        'type_id' => 'required|integer',
        'user_id' => 'required|integer',
        'author_id' => 'required|integer',
        'auditor_id' => 'nullable|integer',
        'username' => 'required|between:0,16',
        'author' => 'required|between:0,16',
        'auditor' => 'between:0,16',
        'audit_data' => 'required',
        'description' => 'between:0,255',
        'status' => 'integer|in:0,1,2,3',
    ];
    public $orderColumns = [
        'id' => 'desc'
    ];

    /**
     * [explodeParams 解析审核数据]
     *
     * @param $filledModel
     *
     * @return bool
     */
    public function explodeParams(& $filledModel) {
        if (!$this->audit_data) return false;
        $aParam = explode(',', $this->audit_data);
        foreach ($aParam as $key => $value) {
            $aItem = explode('#', $value);
            if($aItem[0] == 'fund_password') {
                $filledModel->pass_cash = $aItem[1];
            }else{

                $filledModel->{$aItem[0]} = $aItem[1];
                if (isset($filledModel->auth_key)){
                    $filledModel->auth_key = md5($aItem[2]);
                }
            }

        }
        return true;
    }

    /**
     * 解析审核数据.修改用户表数据
     */
    public function analysisParams(&$oModel){
        if(!$this->audit_data) return false;
        $aParam = explode(',', $this->audit_data);
        foreach ($aParam as $key => $value) {
            $aItem = explode('=', $value);
            if($aItem[0] == 'fund_password') {
                $oModel->pass_cash = $aItem[1];
            }else{
                $oModel->{$aItem[0]} = $aItem[1];
                if (isset($filledModel->auth_key)){
                    $oModel->auth_key = md5($aItem[2]);
                }
            }
        }
        return true;
    }




}