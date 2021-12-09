<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function getAllOrders(Request $request){

        $userid=$request->input('user_id');
        
        $results=order::with('product','user')->where('user_id',$userid)->orderBy('id','desc')->get();
        return $results;

   }
}
