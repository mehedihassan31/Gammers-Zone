<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    function getAllProducts(){
        $id= Auth::user()->id;
            
        $user=User::findOrFail($id);
        $products=product::get();
        
        $response=[
            'balance'=>$user->balance,
            'data'=>$products
        ];

        
        return response($response,201);
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