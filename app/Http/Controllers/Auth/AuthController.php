<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use App\Http\Controllers\Controller;

use App\Models\AdminUser;
use App\Models\AdminRole;
use App\Models\SysConfig;

use Session;
use SessionTool;
use Validator;
use Input;
use Auth;
use Hash;
use Carbon;


class AuthController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $username = 'username';

    /**
     * AuthController constructor.
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * 登录
     *
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login(Request $request) {

        $bCaptcha = SysConfig::check('enable_identifying_code_check', true);
        if ($request->isMethod('POST')) {

            $iResult = $this->checkUser($bCaptcha, $request, $oUser, $aRoles);

            if ($iResult != AdminUser::LOGIN_SUCCESS) {
                $aMsgKeys = [
                    AdminUser::LOGIN_FAILED_CAPTCHA => '_basic.login-fail-captcha',
                    AdminUser::LOGIN_FAILED_PASSWD => '_basic.login-fail-wrong',
                    AdminUser::LOGIN_FAILED_NON_ACTIVIED => '_basic.login-fail-not-actived',
                    AdminUser::LOGIN_FAILED_SECURD => '_basic.login-fail-secure',
                    AdminUser::LOGIN_FAILED_DENY => '_basic.login-fail-wrong',
                ];
                return redirect()->back()->withInput()->with('error', ___($aMsgKeys[$iResult]));
            }

            //save session
            SessionTool::deleteSession(true, $oUser->username);
            SessionTool::saveSessionId(true, $oUser->username, Session::getId());
            Session::put('admin_user_id', $oUser->id);
            Session::put('admin_name', $oUser->name);
            Session::put('admin_username', $oUser->username);
            Session::put('admin_language', $oUser->language);
            Session::put('CurUserRole', $aRoles);
            Session::put('IsAdmin', in_array(AdminRole::ADMIN, $aRoles));
            //判断如果用户只有商户权限并且没有设置所属商户，默认赋值成-1,为了防止看到所有商户
            if(in_array(AdminRole::MERCHANT, $aRoles) && !$oUser->merchant_id){
                $oUser->merchant_id = -1;
            }
            Session::put('merchant_id',$oUser->merchant_id);
            // 增加是否修改密码的检查，未修改过则强制修改密码
            $bChangePwd = false;
            if (!$oUser->pwd_seted_at) {
                $bChangePwd = true;
            } else {
                if ($iPwdValidDays = SysConfig::get('pwd_valid_days')) {
                    $sLastValidPwdSetDate = Carbon::today()->subDays($iPwdValidDays)->toDateTimeString();
                    $bChangePwd = $oUser->pwd_seted_at < $sLastValidPwdSetDate;
                }
            }
            if ($bChangePwd) {
                $sUrl = route('admin-users.change-password');
                Session::put('force_change_pwd', 1);
                return redirect()->to($sUrl);
            } else {
                Session::forget('force_change_pwd');
            }
            return redirect()->to('/');

        } else {
            return view('auth.login')->with(compact('bCaptcha'));
        }
    }

    /**
     * 退出
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout() {
        Auth::logout();

        $userkey = Session::get('admin_username');
        $user = Redis::hdel("LoginUSER", $userkey);

        if (Session::get('admin_user_id') > 0) {
            $userkey = Session::get('admin_username');
            $user = Redis::hdel("LoginUSER", $userkey);
            Session::flush();
        }
        return redirect()->route('login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'username' => 'required|alpha_num|between:4,32|unique:admin_users',
            'email' => 'email|between:0, 200',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create(array $data) {
        return AdminUser::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    private function checkUser($bCaptcha, $oRequest, & $oUser, & $aRoles) {

        if ($bCaptcha) {
            $captcha = ['captcha' => Input::get('captcha')];
            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make($captcha, $rules);
            if (!$validator->passes()) {
                return AdminUser::LOGIN_FAILED_CAPTCHA;
            }
        }

        $sUsername = Input::get('username');
        if (!$oUser = AdminUser::where('username', '=', $sUsername)->first()) {
            return AdminUser::LOGIN_FAILED_PASSWD;
        }

        if (!$oUser->actived) {
            return AdminUser::LOGIN_FAILED_NON_ACTIVIED;
        }

        if (!Auth::attempt(['username' => $oRequest->username, 'password' => $oRequest->password])) {
            return AdminUser::LOGIN_FAILED_PASSWD;
        }


        if (empty($oUser) || !Hash::check($oRequest->password, $oUser->password)) {
            return AdminUser::LOGIN_FAILED_PASSWD;
        }

        $aRoles = $this->_getUserRole($oUser);
        if (in_array(AdminRole::DENY, $aRoles)) {
            return AdminUser::LOGIN_FAILED_DENY;
        }

        return AdminUser::LOGIN_SUCCESS;
    }

    /**
     * [_getUserRole 获取用户角色数据]
     * @return [type] [存入Session, key为CurUserRole]
     */
    protected function _getUserRole($oUser) {
        $roles = $oUser->getRoleIds();

        $adminRoleId = AdminRole::ADMIN;
        $everyOneId = AdminRole::EVERYONE;

        // 如果用户有Administrators角色，使用系统管理员权限；否则，默认添加everyone角色
        array_push($roles, $everyOneId);
        array_map(function ($value) {
            return (int)$value;
        }, $roles);
        array_unique($roles);
        return $roles;
    }
}
