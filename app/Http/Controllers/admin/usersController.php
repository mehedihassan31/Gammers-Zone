<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\users;
use Illuminate\Http\Request;

class usersController extends Controller
{
    function UsersIndex(){
        return view('admin.users');
    }

    function getUsersData(){
        $results=json_encode(users::orderBy('id','desc')->get());
        return $results;

    }


    function productDelete(Request $request){
        $id=$request->input('id');
        $results=users::where('id','=',$id)->delete();

            if($results==true){

                return 1 ;
            }else{

                return 0;
            }
                        
   }

function getProductDetails(Request $req){

    $id=$req->input('id');
   $results=json_encode(users::where('id','=',$id)->get());

   return $results;

}


function balanceAdd(Request $request){
    $id=$request->input('id');
    $balance=$request->input('balance');
    $results=users::where('id', $id)->increment('balance', $balance);
    if($results==true){

        return 1 ;
    }else{
    
        return 0;
    }

}
function winBalanceAdd(Request $request){
    $id=$request->input('id');
    $balance=$request->input('winbalance');
    $results=users::where('id', $id)->increment('winbalance', $balance);
    if($results==true){

        return 1 ;
    }else{
    
        return 0;
    }

}



function productUpdate(Request $req){
    $id=$req->input('id');
    $diamond=$req->input('diamond');
    $price=$req->input('price');
    $saleprice=$req->input('saleprice');
   $results=users::where('id','=',$id)->update(['diamond'=>$diamond,'price'=>$price,'sale_price'=>$saleprice]);

   if($results==true){

    return 1 ;
}else{

    return 0;
}
}






}
