<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait GetInfo
{
    public function url()
    {
        return config('app.url');
    }

    public function getToken()
    {
//        $token = $request->session()->get('token');
        $token = session()->get('token');
        return $token;
    }

    public function getUser()
    {
        $user = session()->get('user');
        return $user;
    }
}
