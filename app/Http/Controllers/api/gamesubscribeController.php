<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\admin\users;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\gamesubscribe;
use App\Models\matches;
use Illuminate\Http\Request;

class gamesubscribeController extends Controller
{
    function getAllMatcheswithroomid(){
        $userid = Auth::user()->id;
            $matches=matches::where('match_time','>=',Carbon::now())->where('resultstatus','=','open')->get();
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
                $data[$key]['reg_status']= $m->reg_status;
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
                $data[$key]['reg_status']= $m->reg_status;
                $data[$key]['joinornot']= true;    
            }
            }
            return json_encode($data);
    }




function getalluserbymatch($matchid){
    $results=gamesubscribe::with('user:id,username')->where('match_id',$matchid)->get();
    return $results;
}



function getallmatchbyuser(){

    $userId=Auth::user()->id;
    $results=gamesubscribe::with('match')->distinct()->select('match_id')->where('user_id',$userId)->get();

   
    // foreach($results as $key=>$n){
    //     $data1[$key]= $n->match;
    // }
    // $data= Array();
    // foreach($data1 as $key=>$m){
    //     $data[$key]['id']= $m->id;
    //     $data[$key]['name']= $m->name;
    //     $data[$key]['Device']= $m->Device;
    //     $data[$key]['Type']= $m->Type;
    //     $data[$key]['version']= $m->version;
    //     $data[$key]['map']= $m->map;
    //     $data[$key]['match_type']= $m->match_type;
    //     $data[$key]['totall_p']= $m->totall_p;
    //     $data[$key]['Entry_Fee']= $m->Entry_Fee;
    //     $data[$key]['match_time']= $m->match_time;
    //     $data[$key]['winning_price']= $m->winning_price;
    //     $data[$key]['runnerup_one']= $m->runnerup_one;
    //     $data[$key]['runnerup_two']= $m->runnerup_two;
    //     $data[$key]['per_kill']= $m->per_kill;
    //     $data[$key]['total_price']= $m->total_price;
    //     $data[$key]['registered_p']= $m->registered_p;
    //     $data[$key]['game_link']= $m->game_link;
    //     $data[$key]['category']= $m->category;
    //     $data[$key]['game_name']= $m->game_name;
    //     $data[$key]['game_type_by_date']= $m->game_type_by_date;
    //     $data[$key]['reg_status']= $m->reg_status;
    //     $data[$key]['joinornot']= true;    
    // }
    return $results;
}



function joinMatch(Request $request){


    //refer check-------------------------------------
    $reference=Auth::user()->reference;
    $refer=Auth::user()->refer;

    // -------------------------------------
    $userbalance = Auth::user()->balance;
    $userid =Auth::user()->id;

    
    $match_id=$request->input('match_id');
    $gamename=$request->input('gamename');
    $countdata=count($gamename);
    $match_feeget=matches::where('id',$match_id)->select('Entry_Fee','match_type','totall_p','registered_p')->get();
    $totallplayer=$match_feeget[0]->totall_p;
    $totallregplayer=$match_feeget[0]->registered_p;
    $fee= $countdata*($match_feeget[0]->Entry_Fee);
    $matchtype=$match_feeget[0]->match_type;


if($totallregplayer<$totallplayer){
    
    if($matchtype=='Paid' && $refer==1){

        if($fee<=$userbalance){
                for($i=0;$i<$countdata;$i++){
    
                    $data= [
                        'user_id'=>$userid,
                        'match_id'=>$match_id[$i],
                        'gamename'=>$gamename[$i],
                    ];
    
                    $res=gamesubscribe::insert($data);
                }

    
                $orderpay=User::where('id','=',$userid)->decrement('balance',$fee);
                $bonus=User::where('id','=',$userid)->increment('winbalance',5);

                $registercount=matches::where('id',$match_id)->increment('registered_p',$countdata);

                $makefalse=User::where('id','=',$userid)->update(['refer'=>false]);
                $refererbonus=User::where('username','=',$reference)->increment('winbalance',10);
           
                if($res==true && $orderpay==true){
                    
                    $response = [
                          'message' =>'Successfully join the game. You got 5 tk refer bonus',
                      ];
                      
                        return response($response,200);
          }else{
              return response('Failed',400);
          }                  
        }else{
            return response('Insufficient balance',200);
        }
    }elseif($matchtype=='Paid' && $refer==0 ){

        if( $fee<=$userbalance){
                for($i=0;$i<$countdata;$i++){
    
                    $data= [
                        'user_id'=>$userid,
                        'match_id'=>$match_id[$i],
                        'gamename'=>$gamename[$i],
                    ];
    
                    $res=gamesubscribe::insert($data);
                }
    
                $orderpay=User::where('id','=',$userid)->decrement('balance',$fee);
                $registercount=matches::where('id',$match_id)->increment('registered_p',$countdata);
                
                
                if($res==true && $orderpay==true){
                    
                    $response = [
                          'message' =>'Successfully join the game',
                      ];
                    
              return response($response,200);
                    }else{
                        return response('Failed',400);
                    }  

        }else{
            return response('Insufficient balance',200);
        }
    }
    else{
        for($i=0;$i<$countdata;$i++){
    
            $data= [
                'user_id'=>$userid,
                'match_id'=>$match_id[$i],
                'gamename'=>$gamename[$i],
            ];

            $res=gamesubscribe::insert($data);
        }
        $registercount=matches::where('id',$match_id)->increment('registered_p',$countdata);
   
        if($res==true){

            $response = [
                'message' =>'Successfully join the game.',
            ];

                return response($response ,200);
        }else{
            return response('Failed',400);
        }  

    }


}else{

    return response("Game full",400);
}



}




function getResults($id){
    $match_id=$id;

    $results=gamesubscribe::with('user:id,username')->where('match_id',$match_id)->get();

    return $results;

}




function getongoingmatch(){

    $userid = Auth::user()->id;
        $matches=matches::where('match_time','<=',Carbon::now())->where('resultstatus','=','open')->get();
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
            $data[$key]['reg_status']= $m->reg_status;
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
            $data[$key]['reg_status']= $m->reg_status;
            $data[$key]['joinornot']= true;    
        }
        }
        return json_encode($data);
}





// Close Match Results

function getAllCloseMatch(){


    $userid = Auth::user()->id;
        $matches=matches::where('match_time','<=',Carbon::now())->where('resultstatus','=','close')->take(15)->get();
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
            $data[$key]['reg_status']= $m->reg_status;
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
            $data[$key]['reg_status']= $m->reg_status;
            $data[$key]['joinornot']= true;    
        }
        }
        return json_encode($data);
}




}
