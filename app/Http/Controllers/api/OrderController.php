<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\transection;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function getAllOrders(Request $request){

        $userid=$request->input('user_id');
        
        $results=order::with('product','user')->where('user_id',$userid)->orderBy('id','desc')->get();
        return $results;

   }


   function makeOrder(Request $request){

    $user_id=$request->input('user_id');
    $product_id=$request->input('product_id');
    $game_id=$request->input('game_id');
    $price=$request->input('product_price');
    $order=order::insert(['user_id'=>$user_id,'product_id'=>$product_id,'game_id'=>$game_id,'price'=>$price]);

    $orderpay=User::where('id','=',$user_id)->decrement('balance', $price);


    $response = [
        'message' =>'Order Placed',
    ];
    
    if($order==true && $orderpay==true){
        return response($response,200);
    }else{
        return 'Something went wrong';
    }


   }
}
