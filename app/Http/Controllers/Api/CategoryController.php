<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryWithProductsResource;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::whereIsRoot()->get());
    }

    public function show($id)
    {
        $category = Category::findORfail($id);
  
        return new CategoryWithProductsResource($category);
    }
}
