<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function postlogin(Request $request){
        //dd($request->all());
        // if (Auth::attempt($request->only('email','password'))){
        //     return redirect('admin');
        // }
        // return redirect('login');
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin =[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->level == 'admin') {
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->back()->withErrors('Username atau Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
