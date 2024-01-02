<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;

class MainController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function login(Request $request){
        $data = $request->all();
        $result = $this->authService->login($data, 'web');
        if($result){
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Email atau Password Salah!');
    }

    public function logout(){
        $result = $this->authService->logout();
        if($result){
            return redirect()->route('login');
        }
        return redirect()->back()->with('error', 'Gagal Logout!');
    }
}
