<?php

// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://localhost:1323/barang');

            if ($response->successful()) {
                $products = $response->json();
                return view('admin.store', ['products' => $products]);
            } else {
                return 'Error: Unable to fetch data from the API.';
            }
        } catch (\Exception $e) {
            return 'API error: ' . $e->getMessage();
        }
    }
}
