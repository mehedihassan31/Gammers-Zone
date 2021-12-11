<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class transectionController extends Controller
{
    
    function getAllTransections(Request $request){

        $userid=$request->input('user_id');
        
        $results=transection::where('user_id',$userid)->orderBy('id','desc')->get();
        return $results;

   }
    function makeDeposit(Request $request){

        $userid=$request->input('user_id');
        $ammount=$request->input('ammount');
        $number=$request->input('number');
        $pmethod=$request->input('pmethod');
    
        $results=transection::insert(['user_id'=>$userid,'ammount'=>$ammount,'number'=>$number,'pmethod'=>$pmethod]);

        if($results==true)
        {
            return response("Deposit Successfull") ;

        }else{
            return response('Somethong Error');
        }
   }


}
