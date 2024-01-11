<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use URL;
use Validator;

use \App\User;
use \App\SystemLog;


class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest:users')->except('logout');
    }

    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        $messages = [
            'password.required' => 'Please enter your NIC number',
            'email.required' => 'Please enter a valid email address',
        ];

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required',

        ], $messages);

        if($validator->fails()){
            return redirect('/admin/login')->withErrors($validator)->withInput();
        }else{
            if(Auth::guard('users')->attempt(['email'=>$request->email,'password'=>$request->password,'is_active'=>1],false)){
                SystemLog::create(['ip'=>$request->ip(),'user_id'=>NULL,'module'=>'Login','description'=>'Successful Login for username : '.$request->email]);
                return redirect('/admin');
            }
            else {
                SystemLog::create(['ip'=>$request->ip(),'user_id'=>NULL,'module'=>'Login','description'=>'Failed Login for username : '.$request->email]);
                return redirect()->back()->withInput($request->only('email'))->withErrors(['account'=>'Unable to Authenticate.']);
            }
        }
    }

    public function logout(){
        Auth::guard('users')->logout();
        return redirect('/admin/login');
    }


}
