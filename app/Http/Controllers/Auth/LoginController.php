<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
session_start();

class LoginController extends Controller
{
    public function login(){
        return view('Auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect(route('login'));
    }
    public function store(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                'name'=>'required|min:4|max:30|alpha',
                'email'=>'required|email',
                'password' =>'min:6|required_with:confirm-password|same:confirm-password',
                'confirm-password'=>'min:6',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
        $user = DB::table('users')->where('email',$request->email)->first();
        if(!$user){
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = $request->password;
            $newUser->save();
            return redirect()->route('register')->with('message','Tạo tài khoản thành công');
        }else{
            return redirect()->route('register')->with('message','Tài khoản đã tồn tại');  
        }
        }
    }
}
