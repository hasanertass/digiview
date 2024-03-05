<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->has('remember'); // 'remember' adında bir alanın formda olduğunu varsayalım
        $user = User::where('email', $email)->first();
        if ($user) {
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                return redirect()->route('merchant.show', ['merchant' => $user->url]);
            } else {
                // Giriş başarısız, şifre kontrolü başarısız oldu
                dd('başarısız');
                return back()->withErrors([
                    'email' => 'Girilen bilgiler hatalı.',
                ])->withInput(['email']);
            }
        } else {
            // Giriş başarısız, kullanıcı bulunamadı
            return back()->withErrors([
                'email' => 'Girilen bilgiler hatalı.',
            ])->withInput();
        }
    }
}
