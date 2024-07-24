<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // đăng nhập
    public function showFormLogin(){
        return view('auths.login');

    }

    public function login(Request $request){
        $user = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        // dd($user); 

        if(Auth::attempt($user)){
            return redirect()->intended('/sanpham');
        }

        return redirect()->back()->withErrors([
            'email' => 'Thông tin người dùng không đúng'
        ]);
    }

    // đăng ký
    public function showFormRegister(){
        return view('auths.register');
    }

    public function register(Request $request){ 
        $request->merge(['chuc_vu_id' => $request->input('chuc_vu_id', 1)]);
        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'so_dien_thoai' => ['required', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'dia_chi' => ['required', 'string'],
            'chuc_vu_id' => ['required', 'integer', 'exists:chuc_vus,id'],
        ]);

        $user = User::query()->create($data);
        Auth::login($user);
        return redirect()->intended('login');
        
    }

    // đăng xuất
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
