<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RegisterController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   public function postregister (Request $request )
   {
        //dd($request->all());
        
        User::create([
            'name' => $request->name,
            'level'=> 'user',
            'email' =>$request->email,
            'password' =>bcrypt($request->password),
            'remember_token'=> Str::random(60)
        ]);

        return redirect('login');
   }
}
