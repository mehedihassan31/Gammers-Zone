<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\transection;
use App\Models\User;
use App\Models\withdraw;
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




function withdrawReq(Request $request){

    $userid= Auth::user()->id;

    $userbalance=Auth::user()->winbalance;
    $ammount=$request->input('ammount');
    $number=$request->input('number');
    $pmethod=$request->input('pmethod');


if($userbalance>0 && $ammount<=$userbalance){

    $results=withdraw::insert(['user_id'=>$userid,'ammount'=>$ammount,'number'=>$number,'pmethod'=>$pmethod]);

    $orderpay=User::where('id','=',$userid)->decrement('winbalance', $ammount);

    $response=[
       
        'message'=>"Withdraw Successfull"
        ];


    if($results==true)
    {
        return response($response,200) ;

    }else{
        return response("Withdraw Failed",500);
    }


}else{
    return response("Insufficient win Balance",500);


}




}




}
