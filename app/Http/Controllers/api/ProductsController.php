<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function getAllProducts(){
        
        $products=product::get();
        return $products;
    }
}
