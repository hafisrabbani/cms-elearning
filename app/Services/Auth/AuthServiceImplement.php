<?php

namespace App\Services\Auth;

use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Auth;

class AuthServiceImplement extends Service implements AuthService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    public function login(array $data, string $type)
    {
        try {
            $credentials = [
                'email' => $data['email'],
                'password' => $data['password']
            ];

            $attemptResult = Auth::attempt($credentials);

            if ($attemptResult && $type === 'web') {
                return true;
            }

            return $attemptResult ? auth('api')->attempt($credentials) : false;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function check()
    {
        try{
            return \auth('api')->user();
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }


    public function logout()
    {
        try{
            return Auth::user()->tokens()->delete();
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

}
