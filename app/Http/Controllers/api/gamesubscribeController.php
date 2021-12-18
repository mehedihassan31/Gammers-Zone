<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use App\Models\gamesubscribe;
use App\Models\matches;
use Illuminate\Http\Request;

class gamesubscribeController extends Controller
{
    function getAllMatcheswithroomid(){

        $matches=gamesubscribe::with('match')->get();

            return $matches;  
    }

   function getongoingmatch(){

    
    $results=matches::where('match_time','<=',Carbon::now())->get();
    
    return response($results,200);

}

function getalluserbymatch($matchid){
    $results=gamesubscribe::with('user:id,username')->where('match_id',$matchid)->get();
    return $results;
}

function joinMatch(Request $request){
    $userid = Auth::user()->id;
    $match_id=$request->input('match_id');
    $results=gamesubscribe::insert(['user_id'=>$userid,'match_id'=>$match_id]);

    if($results==true){
        return response('Successfully join the game',200);

    }else{
        return response('Failed',400);

    }



}

}
