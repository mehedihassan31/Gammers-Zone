<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\transection;
use App\Models\withdraw;
use App\Models\admin\users;
use Illuminate\Http\Request;

class transectionController extends Controller
{
    function transectionsIndex(){

        return view("admin.transection");

    }

    function getTransectionData(){
        
         $results=transection::with('user')->orderBy('id','desc')->get();
         return $results;

    }


    function TransectionDelete(Request $request){
        $id=$request->input('id');
        $results=transection::where('id',$id)->delete();
        if($results==true){
            return 1;
        
        }else{
            return 0;
        }



    }

    function StatusConfirm(Request $request){
        
        $id=$request->input('id');
        $userid=$request->input('userid');
        $ammount=$request->input('ammount');
        $status=$request->input('status');

        $TransectionStatus=transection::where('id','=',$id)->decrement('ammount', $ammount);
        $statusupadte=transection::where('id','=',$id)->update(['status'=>$status]);
        $results=users::where('id', $userid)->increment('balance', $ammount);

        if($TransectionStatus==true && $results==true && $statusupadte)
        {
            return 1;

        }else{
            return 0;
        }
        
    
    }


function withdrawIndex(){

    return view("admin.withdraw");
}

function getWithdrawData(){

    $results=withdraw::with('user')->orderBy('id','desc')->get();
    return $results;
}

function withdrawStatusConfirm(Request $request){
        
    $id=$request->input('id');
    $status=$request->input('status');
    $statusupadte=withdraw::where('id','=',$id)->update(['status'=>$status]);

    if($statusupadte)
    {
        return 1;

    }else{
        return 0;
    }
    

}



function WithdrawDelete(Request $request){
    $id=$request->input('id');
    $results=withdraw::where('id',$id)->delete();
    if($results==true){
        return 1;
    
    }else{
        return 0;
    }



}

    

}
