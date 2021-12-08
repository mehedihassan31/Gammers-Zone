<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function OrderIndex(){

        return view('admin.order');




    }

    function getOrderData(){
        // $order=DB::table('order')
        // ->join('products','order.product_id','products.id')
        // ->join('users','order.user_id','users.id')->get();
        // return $order;

        $orderjson=order::with('user','product')->get();
        return $orderjson;
        
    }

    function sUpdate(Request $request){
        $id=$request->input('id');
        $status=$request->input('status');
        $orderstatus=order::where('id','=',$id)->update(['status'=>$status]);

        if($orderstatus==true)
        {
            return 1;

        }else{
            return 0;
        }
        
        
    }


}
