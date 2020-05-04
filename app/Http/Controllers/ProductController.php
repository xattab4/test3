<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('price', 'ASC')->paginate(25);

        return view('product.index', ['products' => $products]);
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, ',', ' ');
    }

}
