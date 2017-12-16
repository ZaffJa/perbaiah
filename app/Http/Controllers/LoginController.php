<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {

        $user = User::where('no_kp', $request->no_kp)->first();

        if ($user && Hash::check($request->kata_laluan, $user->kata_laluan)) {
            Auth::login($user, true);

            if(auth()->user()->is('admin')) {

                return redirect('/admin/user');
            }
            else {
                return redirect('/user');
            }
        }
        
        return back()->withErrors('Nama atau kata laluan salah');

    }
}
