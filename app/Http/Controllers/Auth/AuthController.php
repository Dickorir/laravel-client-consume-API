<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\ClientException;

class AuthController extends Controller
{
    private $client = null;
    const API_URL = "http://127.0.0.1:8006/api";

    var $auth_key;
    var $auth_email;
    var $accessToken;

    public function __construct()
    {
//        $this->auth_email = $email;
//        $this->auth_key = $key;
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
        $client = new Client(["base_uri" => "http://127.0.0.1:8006"]);
        $options = [
            'form_params' => [
                "email" => $request->email,
                "password" => $request->password
            ]
        ];
        $options = [
            'json' => [
                "email" => $request->email,
                "password" => $request->password
            ]
        ];

        try {
            $response = $client->post("/api/login", $options);
        } catch (ClientException $exception) {
//            $statusCode = $response->getStatusCode();
            $response = $exception->getResponse();
        }
        $data = json_decode((string) $response->getBody(), true);
//        $data = json_decode($response->getBody());
        if ($data['success'] == true){

        }else{
            return back()->withInput();
        }

//        dd($response,7);
        dd($data,7);
    }

}
