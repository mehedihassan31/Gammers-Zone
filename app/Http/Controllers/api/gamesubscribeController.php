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

        $userid = Auth::user()->id;
            $matches=matches::get();
            $data= Array();
            foreach($matches as $key=>$m){
                $match_id=$m->id;
                $results=gamesubscribe::where('user_id',$userid)->where('match_id',$match_id)->get();
            if($results->isEmpty()){
                $data[$key]['id']= $m->id;
                $data[$key]['name']= $m->name;
                $data[$key]['Device']= $m->Device;
                $data[$key]['Type']= $m->Type;
                $data[$key]['version']= $m->version;
                $data[$key]['map']= $m->map;
                $data[$key]['match_type']= $m->match_type;
                $data[$key]['totall_p']= $m->totall_p;
                $data[$key]['Entry_Fee']= $m->Entry_Fee;
                $data[$key]['match_time']= $m->match_time;
                $data[$key]['winning_price']= $m->winning_price;
                $data[$key]['runnerup_one']= $m->runnerup_one;
                $data[$key]['runnerup_two']= $m->runnerup_two;
                $data[$key]['per_kill']= $m->per_kill;
                $data[$key]['total_price']= $m->total_price;
                $data[$key]['registered_p']= $m->registered_p;
                $data[$key]['game_link']= $m->game_link;
                $data[$key]['category']= $m->category;
                $data[$key]['game_name']= $m->game_name;
                $data[$key]['game_type_by_date']= $m->game_type_by_date;
                $data[$key]['joinornot']= false;    
           
            }else{               
                $data[$key]['id']= $m->id;
                $data[$key]['name']= $m->name;
                $data[$key]['Device']= $m->Device;
                $data[$key]['Type']= $m->Type;
                $data[$key]['version']= $m->version;
                $data[$key]['map']= $m->map;
                $data[$key]['match_type']= $m->match_type;               
                $data[$key]['room_id']= $m->room_id;
                $data[$key]['room_password']= $m->room_password;
                $data[$key]['totall_p']= $m->totall_p;
                $data[$key]['Entry_Fee']= $m->Entry_Fee;
                $data[$key]['match_time']= $m->match_time;
                $data[$key]['winning_price']= $m->winning_price;
                $data[$key]['runnerup_one']= $m->runnerup_one;
                $data[$key]['runnerup_two']= $m->runnerup_two;
                $data[$key]['per_kill']= $m->per_kill;
                $data[$key]['total_price']= $m->total_price;
                $data[$key]['registered_p']= $m->registered_p;
                $data[$key]['game_link']= $m->game_link;
                $data[$key]['category']= $m->category;
                $data[$key]['game_name']= $m->game_name;
                $data[$key]['game_type_by_date']= $m->game_type_by_date;
                $data[$key]['joinornot']= true;    
            }
            }
            return json_encode($data);
    }



   function getongoingmatch(){

    $results=matches::where('match_time','<=',Carbon::now())->get();
    
    return response($results,200);

}

function getalluserbymatch($matchid){
    $results=gamesubscribe::with('user:id,username')->where('match_id',$matchid)->get();
    return $results;
}



function getallmatchbyuser(){

    $userId=Auth::user()->id;
    $results=gamesubscribe::with('match')->where('user_id',$userId)->get();
    return $results;
}



function joinMatch(Request $request){
    $userid = Auth::user()->id;
    $match_id=$request->input('match_id');

    $results=gamesubscribe::where('user_id',$userid)->where('match_id',$match_id)->get();

if($results->isEmpty()){
    $res=gamesubscribe::insert(['user_id'=>$userid,'match_id'=>$match_id]);
    if($res==true){
        return response('Successfully join the game',200);
    }else{
        return response('Failed',400);
    }
    
}else if(!$results->isEmpty()){
    return response('You are Already registered ',400);
}

}


function getResults($id){
    $match_id=$id;

    $results=gamesubscribe::with('user:id,username')->where('match_id',$match_id)->get();

    return $results;

}


}
