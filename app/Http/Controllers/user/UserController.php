<?php

namespace App\Http\Controllers\user;

use App\Models\withdraw;
use App\Models\admin\order;
use App\Models\admin\users;
use Illuminate\Http\Request;
use App\Models\admin\Information;
use App\Models\admin\transection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function IndexProfile(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.profile',[
            'userdata'=>$userdata
        ]);
    }

    

    function IndexDashboard(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.dashboard',[
            'userdata'=>$userdata
        ]);

    }



    function IndexWallet(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.wallet',[
            'userdata'=>$userdata
        ]);

    }
    function IndexWithdraw(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.withdraw',[
            'userdata'=>$userdata
        ]);

    }

    function IndexTransection(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.transection',[
            'userdata'=>$userdata
        ]);

    }
    function IndexMystatistics(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.mystatistics',[
            'userdata'=>$userdata
        ]);

    }

    function IndexMyorder(){
        $id=Auth::user()->id;
        $userdata=users::find($id);
        $countPending=order::where('user_id',$id)->where('status','Pending')->count();
        $countTotall=order::where('user_id',$id)->count();
        $countDelivered=order::where('user_id',$id)->where('status','Delivered')->count();

        return view('user.myorder',[
            'userdata'=>$userdata,
            'cpen'=>$countPending,
            'cTotall'=>$countTotall,
            'cdeli'=>$countDelivered

        ]);

    }
    function IndexDeposits(){
        $id=Auth::user()->id;
        $userdata=users::find($id);
        $info=Information::all();

        return view('user.deposits',[
            'userdata'=>$userdata,
            'info'=>$info
        ]);
    }




    function getAllDeposits(){

        $userid=Auth::user()->id;
        
        $results=transection::where('user_id',$userid)->orderBy('id','desc')->get();
        return $results;

   }

    function makeDeposit(Request $request){

        $userid=Auth::user()->id;
        $ammount=$request->input('ammount');
        $number=$request->input('number');
        $pmethod=$request->input('pmethod');
    
        $results=transection::insert(['user_id'=>$userid,'ammount'=>$ammount,'number'=>$number,'pmethod'=>$pmethod]);


  
        if($results==true)
        {
            return 1 ;

        }else{
            return 0;
        }
   }



   function getSingleWithdrawHistory(){

    $userid= Auth::user()->id;
    $results=withdraw::where('user_id',$userid)->orderBy('id','desc')->get();
    return $results;

}




function withdrawReq(Request $request){

    $userid= Auth::user()->id;
    $userbalance=Auth::user()->winbalance;
    $ammount=$request->input('ammount');
    $number=$request->input('number');
    $pmethod=$request->input('pmethod');

if($userbalance>0 && $ammount<=$userbalance){

    $results=withdraw::insert(['user_id'=>$userid,'ammount'=>$ammount,'number'=>$number,'pmethod'=>$pmethod]);

    $orderpay=users::where('id','=',$userid)->decrement('winbalance', $ammount);

    if($results==true)
    {
        return 1 ;

    }else{
        return 0;
    }

}else{
    return 2;
}

}



    function IndexRefer(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.refer',[
            'userdata'=>$userdata
        ]);

    }




    function getAllOrders(){

        $userid=Auth::user()->id;
        
        $results=order::with('user','product')->where('user_id',$userid)->orderBy('id','desc')->get();
       
        return $results;  
                
   }



   function makeOrder(Request $request){

    $user_id=Auth::user()->id;
    $product_id=$request->input('product_id');
    $game_id=$request->input('game_id');
    $price=$request->input('product_price');
    $order=order::insert(['user_id'=>$user_id,'product_id'=>$product_id,'game_id'=>$game_id,'price'=>$price]);

    $orderpay=users::where('id','=',$user_id)->decrement('balance', $price);


    
    if($order==true && $orderpay==true){
        return 1;
    }else{
        return 0;
    }


   }



}
