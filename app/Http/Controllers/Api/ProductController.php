<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::orderBy('price', 'ASC')->get());
    }

}
