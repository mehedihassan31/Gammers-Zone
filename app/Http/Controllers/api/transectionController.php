<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class transectionController extends Controller
{
    
    function getAllTransections($id){

        $userid=$id;
        
        $results=transection::where('user_id',$userid)->orderBy('id','desc')->get();
        return $results;

   }
    function makeDeposit(Request $request){

        $userid=$request->input('user_id');
        $ammount=$request->input('ammount');
        $number=$request->input('number');
        $pmethod=$request->input('pmethod');
    
        $results=transection::insert(['user_id'=>$userid,'ammount'=>$ammount,'number'=>$number,'pmethod'=>$pmethod]);

        $response=[
            
            'message'=>"Deposit Successfull"
            
            ];
  


        if($results==true)
        {
            return response($response,200) ;

        }else{
            return response(500);
        }
   }


}
