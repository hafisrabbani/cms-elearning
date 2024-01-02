<?php

namespace App\Services\Auth;

use LaravelEasyRepository\BaseService;

interface AuthService extends BaseService{
    public function login(array $data, string $type);
    public function check();
    public function logout();
}
