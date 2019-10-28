<?php

namespace LoiPham\WooCommerce\App\Http\Controllers\Admin;
use LoiPham\WooCommerce\App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LoiPham\WooCommerce\App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use LoiPham\WooCommerce\App\Models\User;
use Session;
class AuthController extends Controller
{
    function __construct()
    {

    }
    public function getCheckUsername(Request $request)
    {
//        dd(Auth::user()->name);
        if (Auth::guard('woo')->check()) {
            return redirect()->route('woo.admin.index');
        }
        page_title()->setTitle(__('woo-commerce::login.page_title'));
        if($request->step == 'check-username'){
            $bodyClass = 'login-page';
            $request->session()->forget('userLogin');
            return view('woo-commerce::admin.pages.auth.login.step1', compact('bodyClass'));
        }
        if($request->step == 'check-password'){
            $bodyClass = 'lockscreen';
            $user = $request->session()->get('userLogin');
            if($user){
                return view('woo-commerce::admin.pages.auth.login.step2', compact('bodyClass', 'user'));
            }
            return redirect()->route('getCheckUsername');
        }
        return redirect()->route('getCheckUsername', ['step'=>'check-username']);
    }
    public function postCheckUsername(Request $request)
    {
        $rules = [
            'txtUsername' => 'required'
        ];
        $messages =  [
            'txtUsername.required' => __('woo-commerce::validation.required', ['attribute' => __('woo-commerce::login.placeholder.username')])
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::where('username', $request->txtUsername)->first();
        if ($user){
            $request->session()->put('userLogin', $user);
            return redirect()->route('getCheckUsername', ['step'=>'check-password']);
        }
        $notification = array(
            'message' => __('woo-commerce::login.notify.not_found', ['attribute' => __('woo-commerce::login.placeholder.username')]),
            'alert-type' => 'error',
        );
        return redirect()->back()->withInput()->with($notification);
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'txtPassword' => 'required'
        ];
        $messages =  [
            'txtPassword.required' => __('woo-commerce::validation.required', ['attribute' => __('woo-commerce::login.placeholder.password')])
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = $request->session()->get('userLogin');
        $data = [
            'username' => $user->username,
            'password' => $request->txtPassword,
        ];
        if (Auth::guard('woo')->attempt($data, true)){
            $notifySuccess = array(
                'message' => 'Đăng Nhập Thành Công',
                'alert-type' => 'success',
            );
            return redirect()->route('woo.admin.index')->with($notifySuccess);
        }
        $error = array(
            'message' => __('woo-commerce::validation.password_not_match', ['attribute' => __('woo-commerce::login.placeholder.password'), 'user' => $user->name]),
            'alert-type' => 'error',
        );
        return redirect()->back()->with($error);
    }
    public function getLogout() {
        Auth::guard('woo')->logout();
        return redirect()->back();
    }
}
