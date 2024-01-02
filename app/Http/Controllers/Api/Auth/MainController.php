<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Traits\ResponseTrait;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    use ResponseTrait;
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }


    public function login(AuthRequest $request){
        if($result = $this->authService->login($request->validated(), 'api')){
            return $this->successResponse($result, 'Login Success');
        }
        return $this->errorResponse('Email atau Password Salah!');
    }

    public function me(Request $request){
        return response()->json(Auth::user());
    }
}
