<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Http;
use App\Traits\GetInfo;

class AuthController extends Controller
{
    use GetInfo;
    private $client = null;
    const API_URL = "http://127.0.0.1:8006/api";

    var $url;
    var $auth_email;
    var $accessToken;

    public function __construct()
    {
//        $this->auth_email = $email;
        $this->url = 'http://127.0.0.1:8006';
        $this->client = new Client();

    }
    public function prepare_access_token(Request $request)
    {
        try
        {
            $url = self::API_URL . "/oauth/access_token";
            $data = ['email' => $this->auth_email,'api_key' => $this->auth_key];
            dd($data,98);
            $response = $this->client->post($url, ['query' => $data]);
            $result = json_decode($response->getBody()->getContents());
            $this->accessToken = $result->access_token;
        }
        catch (RequestException $e)
        {
            $response = $this->StatusCodeHandling($e);
            return $response;
        }
    }
    public function index()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        //dd($request->all());
        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $email = $request->email;
        $password = $request->password;
        try {
            // dd(Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1]));
            $data = [
                'email' => $email,
                'password' => $password,

            ];
            $response = Http::post($this->url().'/login', $data);
//            $data = json_decode($response->getBody(), true);
//            $data = $response->json();

//            dd($response->object()->data->user);
            if ($response->json()['success'] == true) {
                // dd($response->object()->result->user);
                $request->session()->put(
                    [
                        'authenticated' => time(),
                        'user' => $response->object()->data->user,
                        'token' => $response->object()->data->token
                    ]
                );
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->back()->with('error', $response->object()->message);
            }
//            if (Auth::attempt(['email' => $email, 'password' => $password])) {
//                return redirect()->intended('/dashboard');
//            }
//            return redirect()->back()->with('error', 'Could not login to your account,invalid email or password!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Could not login to your account,invalid email or password!');
        }
    }


    public function processLogin3(Request $request)
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8006"]);
        $options = [
            'form_params' => [
                "email" => $request->email,
                "password" => $request->password
            ]
        ];

        $response = Http::post('ttp://127.0.0.1:8006/api/login', [
            "email" => $request->email,
            "password" => $request->password
        ]);

        try {
            $response = $client->post("/api/login", $options);
        } catch (ClientException $exception) {
//            $statusCode = $response->getStatusCode();
            $response = $exception->getResponse();
        }
        $data = json_decode((string) $response->getBody(), true);
//        $data = json_decode($response->getBody());
//        dd($data['data']['token'],7);
        if ($data['success'] == true){

            $minutes = 1;
            $response = new Response('Hello World');
            $response->withCookie(cookie('state', $data['data']['token'], $minutes));
            $data = json_decode((string) $response, true);
//            dd($response,12);


            // Via a request instance...
//            $request->session()->put('state', $data['data']['token']);

// Via the global helper...
//            session(['key' => 'value']);
//            return view('auth.login');
            return redirect('/dashboard');
        }else{
            return back()->withInput();
        }

//        dd($response,7);
        dd($data,7);
    }

    public function processLogin2(Request $request)
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8006"]);
        $options = [
            'form_params' => [
                "email" => $request->email,
                "password" => $request->password
            ]
        ];

//        $options = [
//            'json' => [
//                "email" => $request->email,
//                "password" => $request->password
//            ]
//        ];

        try {
            $response = $client->post("/api/login", $options);
        } catch (ClientException $exception) {
//            $statusCode = $response->getStatusCode();
            $response = $exception->getResponse();
        }
        $data = json_decode((string) $response->getBody(), true);
//        $data = json_decode($response->getBody());
//        dd($data['data']['token'],7);
        if ($data['success'] == true){

            $minutes = 1;
            $response = new Response('Hello World');
            $response->withCookie(cookie('state', $data['data']['token'], $minutes));
            $data = json_decode((string) $response, true);
//            dd($response,12);


            // Via a request instance...
//            $request->session()->put('state', $data['data']['token']);

// Via the global helper...
//            session(['key' => 'value']);
//            return view('auth.login');
            return redirect('/dashboard');
        }else{
            return back()->withInput();
        }

//        dd($response,7);
        dd($data,7);
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

}
