<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function getAllProducts(){
        
        
        
        $products=product::get();

        
        return response($products,201);
    }
//     function getAllProductsById($id){
        
        
//         $user=User::findOrFail($id);
//         $products=product::get();
        
//         $response=[
//             'balance'=>$user->balance,
//             'data'=>$products
//             ];

        
//         return response($response,201);
//     }
// }
}