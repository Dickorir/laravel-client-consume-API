<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Traits\GetInfo;

class DashboardController extends Controller
{
    use GetInfo;
    public function index(Request $request)
    {
        $token = $this->getToken($request);
        $url = $this->url();
        $user = $this->getUser();
//        dd($token, $url, $user);

        return view('index');
    }
    public function index1(Request $request)
    {
        $token = $this->getToken($request);
        $url = $this->url();
        dd($token, $url);

        $client = new Client();
        $request = $client->get('http://127.0.0.1:8006/api/user', [
            'headers' => [
                'Content-type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$state
            ]]);

// Get the actual response without headers
        $response = $request->getBody()->getContents();
//        $response = json_decode($request->getBody(true)->getContents());

        $data = json_decode($response, true);
//        dd($data);

        return view('index');
    }
}
