<?php

/**
 * 重置管理员登录密码
 *
 * @author winter
 */
namespace App\Console\Commands;

use App\Models\AdminUser;


class ResetAdminPassword extends BaseCommand {

    protected $signature = 'system:reset-password {username} {password}';
    protected $name = 'system:reset-password';
    protected $description = 'Reset ADmin Password';

    public function doCommand() {
        $sUsername = $this->argument('username');
        $sPwd = $this->argument('password');
        $oAdmin = AdminUser::where('username', '=', $sUsername)->first();
        if (!$oAdmin) {
            $this->log = "The Admin $sUsername Not Exisits!";
            return;
        }
        $data = [
            'password' => $sPwd,
            'password_confirmation' => $sPwd
        ];
        $aResults = $oAdmin->resetPassword($data, true);
        $this->log = $aResults['msg'];
    }


}
