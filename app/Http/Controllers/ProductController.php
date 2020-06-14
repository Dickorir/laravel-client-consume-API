<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
//use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request;

class ProductController extends Controller
{
    public function index(){
        $request = new Request('GET', 'http://127.0.0.1:8006/api/products');

        $response = $request->getBody()->getContents();
//        $response = json_decode($request->getBody(true)->getContents());

        $data = json_decode($response);

//        dd($response,7);
        dd($data,7);

    }
    public function index1(){
        $client = new Client();

        // Create a request
//        $request = $client->request('GET', 'http://127.0.0.1:8006/api/products');
        $request = $client->request('GET', 'http://127.0.0.1:8006/api/products', [
            'headers' => [ 'Accept' => 'application/json', 'Content-type' => 'application/json', 'Authorization' => 'Bearer' ],
            ]);

//        $request = $client->get('http://127.0.0.1:8006/api/products', [
//            'headers' => [
//                'Content-type' => 'application/json',
//                'Accept' => 'application/json',
//                'Authorization' => 'Bearer'
//            ]]);

// Get the actual response without headers

        $response = $request->getBody()->getContents();
//        $response = json_decode($request->getBody(true)->getContents());

        $data = json_decode($response);

//        dd($response,7);
        dd($data,7);
        return $response;
    }
    public function StatusCodeHandling($e)
    {
        if ($e->getResponse()->getStatusCode() == ‘400’)
        {
            $this->prepare_access_token();
        }
        elseif ($e->getResponse()->getStatusCode() == ‘422’)
        {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
        elseif ($e->getResponse()->getStatusCode() == ‘500’)
        {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
        elseif ($e->getResponse()->getStatusCode() == ‘401’)
        {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
        elseif ($e->getResponse()->getStatusCode() == ‘403’)
        {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
        else
        {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
    }
}
