<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str,Hash,Auth;

use App\Mail\ForgetPasswordMail;
use Mail;
use App\Http\Requests\ResetPasword;
class AuthController extends Controller
{
    public function getregistro(){
        return view('auth.registra');
    }
    
    public function login(){
        return view('auth.login');
    }

    public function login_post(Request $request){
        //dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
            if(Auth::User()->is_role == '2'){
                //echo "superadmin"; die();
                return redirect()->intended('superadmin/dashboard');
            }else if(Auth::User()->is_role == '1'){
                //echo "admin"; die();
                return redirect()->intended('admin/dashboard');
            }else if(Auth::User()->is_role == '0'){
               // echo "user"; die();
               return redirect()->intended('user/dashboard');
            }else{
                return redirect('login')->with('error','No evoalibles email..plees checkea carajo');
            }
        }else{
            return redirect()->back()->with('error','Usuario o contraseña incorrectos');
        }
    }
    public function forget(){
        return view('auth.forget');
    }

    public function forget_post(Request $request){
        $count = User::where('email', '=', $request->email)->count();
        if($count > 0){
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();
            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('success', 'Password has been reset.');
        }else{
            return redirect()->back()->with('error', 'Email no faund checkea carajo');
        }
    }

    public function getReset(Request $request, $token){
        $user = User::where('remember_token','=', $token);
        if($user->count() == 0){
            abort(403);
        }
        $user = $user->first();
        $data['token'] = $token;

        return view('auth.reset', $data);
    }

    public function postReset($token, ResetPasword $request){
        $user = User::where('remember_token', '=', $token);
        if($user->count() == 0){
            abort(403);
        }
        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('login')->with('success','felicidades password reseterado');
    }


    public function postregistro(Request $request){
        $user = $request->validate([
            'name'           => 'required',
            'email'          => 'required|unique:users',
            'password'       => 'required|min:6',
            'confi_password' => 'required_with:password|same:password|min:6',
            'is_role'        => 'required',
        ]);

        $user                   =new User;
        $user->name             =trim($request->name);
        $user->email            =trim($request->email);
        $user->password         =Hash::make($request->password);
        $user->is_role          =trim($request->is_role);
        $user->remember_token   =Str::random(50);
        $user->save();

 
        return   redirect('login')->with('success','registro exitoso');
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with('success','Sesión cerrada');
    }
}
