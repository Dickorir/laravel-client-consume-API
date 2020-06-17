<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Traits\GetInfo;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use GetInfo;

    public function index()
    {
        $title = 'Products';
        $url = url()->full();;
        $newurl = Str::afterLast($url, '?');
        $page = (Str::contains($url, 'page')) == true ? '?'.$newurl : '';
//        dd($page);

        $response = Http::withToken($this->getToken())->get($this->url().'/products'.$page);

        $products = $response->object();
//        $products = new Collection($products); // needs a use statement
//        $orders_collection = collect($products); // alternative. You can use helper function
//        dd($products);

        return view('products.index', compact('products', 'title'));
//        $response = $response->getBody()->getContents();
//        $response = json_decode($request->getBody(true)->getContents());
//        $data = json_decode($response);
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


    public function create(Request $request)
    {
        $title = 'Add products';

        return view('products.create', compact( 'title'));
    }

    public function store(Request $request)
    {
//        dd($request);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'discount' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
//        dd($request->all());
        $data = [
            'name' => $request->name,
            'detail' => $request->detail,
            'price' => $request->price,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'user_id' => session()->get('user')->id
        ];
//        dd($data);
        $response = Http::withToken($this->getToken())->post($this->url().'/products', $data);

        $create = $response->successful();

        if ($create == true) {
            return redirect('products')->with('success', trans('Product created'));
        } else {
            return back()->withInput()->with('error', trans('Product not created'));
        }
    }

    public function show($id)
    {
        $title = 'Products';
        $response = Http::withToken($this->getToken())->get($this->url().'/products/'.$id);

        $products = $response->object();
//        $products = new Collection($products); // needs a use statement
//        $orders_collection = collect($products); // alternative. You can use helper function
        dd($products);

        return view('products.index', compact('products', 'title'));
    }

    public function edit(Request $request, $id)
    {
        $title = 'Product';
        $response = Http::withToken($this->getToken())->get($this->url().'/products/'.$id);
        $product = $response->object()->data;
//        dd($product);

        return view('products.edit', compact('product', 'title'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'discount' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
//        dd($request->all());
        $data = [
            'name' => $request->name,
            'detail' => $request->detail,
            'price' => $request->price,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'user_id' => session()->get('user')->id
        ];
//        dd($data);
        $response = Http::withToken($this->getToken())->put($this->url().'/products/'.$id, $data);

//        dd($response->object());

        $update = $response->successful();

        if ($update == true) {
            return redirect('products')->with('success', trans('Product updated'));
        } else {
            return back()->withInput()->with('error', trans('Product not updated'));
        }
    }

    public function destroy($id)
    {
        $response = Http::withToken($this->getToken())->delete($this->url().'/products/'.$id);

        $delete = $response->successful();
//        dd($admin);
        if ($delete) {
            return redirect('products')->with('success', trans('Product Deleted'));
        } else {
            return redirect('products')->withInput()->with('error', trans('Product not deleted'));
        }
    }
}
