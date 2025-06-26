<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller {
    
    public function login(){
        $title = __("Login");
        $description = __("Some description for the page");
        return view('auth.login',compact('title','description'));
    }

    public function register(){
        $title = __("Register");
        $description = __("Some description for the page");
        return view('auth.register',compact('title','description'));
    }

    public function forgetPassword(){
        $title = __("Forget Password");
        $description = __("Some description for the page");
        return view('auth.forget_password',compact('title','description'));
    }

    public function signup(Request $request){
        $validators = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return redirect()->route('register')->withErrors($validators)->withInput();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            auth()->login($user);
            return redirect()->route('dashboard.demo_one', 'en')->with('message', __('Registration was successful!'));            
        }
    }

    public function authenticate(Request $request){
        $validators = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return redirect()->route('login')->withErrors($validators)->withInput();
        } else {
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                Log::info('User logged in: '.$request->email);
                return redirect()->route('dashboard.demo_one', 'en')->with('message', __('Welcome back!'));
            } else {
                Log::warning('Failed login attempt: '.$request->email);
                return redirect()->route('login')->withErrors([
                    'email' => __('Login failed! Email/Password is incorrect.')
                ])->withInput();
            }
        }
    }

    public function logout(){  
        Auth::logout(); 
        return redirect()->route('login')->with('message', __('Successfully logged out!'));       
    }
}
