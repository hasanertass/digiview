<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
        ]);

        $user = User::where('id',$this->user->id)->first();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Geçerli şifre hatalı.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Şİfre değiştirme işlemi başarılı');
    }

    public function password(){
        $merchant=User::Where('url',$this->user->url)->first();
        return view('merchant_panel.changepassword',compact('merchant'));
    }
}
