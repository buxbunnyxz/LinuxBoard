<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller {
    
    public function login(){
        $title = __("login.title");
        $description = __("login.description");
        return view('auth.login', compact('title','description'));
    }

    public function register(){
        $title = __("register.title");
        $description = __("register.description");
        return view('auth.register', compact('title','description'));
    }

    public function forgetPassword(){
        $title = __("forget_password.title");
        $description = __("forget_password.description");
        return view('auth.forget_password', compact('title','description'));
    }

    public function signup(Request $request){
        $validators = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        if($validators->fails()){
            return redirect()
                ->route('register', ['locale' => app()->getLocale()])
                ->withErrors($validators)
                ->withInput();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            auth()->login($user);
            return redirect()
                ->route('home', ['locale' => app()->getLocale()])
                ->with('message', __('auth.registration_successful'));            
        }
    }

    public function authenticate(Request $request){
        $validators = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validators->fails()){
            return redirect()
                ->route('login', ['locale' => app()->getLocale()])
                ->withErrors($validators)
                ->withInput();
        } else {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                Log::info('User logged in: '.$request->email);
                return redirect()
                    ->route('home', ['locale' => app()->getLocale()])
                    ->with('message', __('auth.welcome_back'));
            } else {
                Log::warning('Failed login attempt: '.$request->email);
                return redirect()
                    ->route('login', ['locale' => app()->getLocale()])
                    ->withErrors([
                        'email' => __('auth.login_failed')
                    ])
                    ->withInput();
            }
        }
    }

    public function logout(){  
        Auth::logout(); 
        return redirect()
            ->route('login', ['locale' => app()->getLocale()])
            ->with('message', __('auth.logged_out'));       
    }
}
