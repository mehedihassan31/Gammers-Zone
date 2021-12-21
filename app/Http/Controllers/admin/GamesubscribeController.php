<?php

namespace App\Http\Controllers\admin;

use App\Models\gamesubscribe;

use App\Http\Controllers\Controller;
use App\Models\admin\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesubscribeController extends Controller
{
    function ResultIndex($id){

        return view('admin.results',[
            'match_id'=>$id,
        ]);
    }

    function getAllsubsData(Request $req){

        $matchid=$req->input('id');
        $results=gamesubscribe::with('user')->where('match_id',$matchid)->get();
        return $results;

    }


    function pricemoneyAdd(Request $request){
        $rid=$request->input('rid');
        $balance=$request->input('pricemoney');

        $results=gamesubscribe::where('id', $rid)->increment('price_money',$balance);
        $result=gamesubscribe::where('id', $rid)->get();

        $userid=$result[0]->user_id;

       $res=users::where('id', $userid)->increment('winbalance', $balance);

        if($results==true && $res==true){
    
            return 1 ;
        }else{
           
            return 0;
        }
    
    }



    function killAdd(Request $request){
        $id=$request->input('id');
        $kill=$request->input('kill');
        $results=gamesubscribe::where('id', $id)->increment('killbyuser', $kill);
        if($results==true){
    
            return 1 ;
        }else{
        
            return 0;
        }
    
    }

    function ResultDelete(Request $request){

        $id=$request->input('id');
        $results=gamesubscribe::where('id','=',$id)->delete();

            if($results==true){

                return 1 ;
            }else{

                return 0;
            }


    }
}
