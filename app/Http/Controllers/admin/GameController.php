<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    function GameIndex(){
        return view('admin.game');
    }


    function getGamesData(){

        $results=json_encode(Game::orderBy('id','desc')->get());
        return $results;

    }



function gameStatusConfirm(Request $request){
        
    $id=$request->input('id');
    $status=$request->input('status');
    $statusupadte=Game::where('id','=',$id)->update(['resultstatus'=>$status]);

    if($statusupadte)
    {
        return 1;

    }else{
        return 0;
    }

}
function gameStatusReg(Request $request){
        
    $id=$request->input('id');
    $status=$request->input('regstatus');
    $statusupadte=Game::where('id','=',$id)->update(['reg_status'=>$status]);

    if($statusupadte)
    {
        return 1;

    }else{
        return 0;
    }

}


    function GameDelete(Request $request){
        $id=$request->input('id');
        $results=Game::where('id','=',$id)->delete();
            if($results==true){
                return 1 ;
            }else{
                return 0;
            }
                        
   }



   function getGamedetails(Request $req){

    $id=$req->input('id');
    $results=json_encode(Game::where('id','=',$id)->get());
    return $results;
 }


   function GameUpdate(Request $req){
    $id=$req->input('id');
    $matchNameId=$req->input('matchNameId'); 
    $gameDeviceId=$req->input('gameDeviceId'); 
    $TypeId=$req->input('TypeId'); 
    $Version=$req->input('Version');
    $MapId=$req->input('MapId'); 
    $roomId=$req->input('roomId');
    $roompasswordId=$req->input('roompasswordId');
    $totallpeople=$req->input('totallpeople');
    $entryFee=$req->input('entryFee');
    $matchtime=$req->input('matchtime');
    $winningprice=$req->input('winningprice');
    $runnersFirstUp=$req->input('runnersFirstUp');
    $runnersSecondUp=$req->input('runnersSecondUp');
    $perKill=$req->input('perKill');
    $totallprice=$req->input('totallprice');
    $gamelink=$req->input('gamelink');
    $GameName=$req->input('GameName');

    $default_coin=$req->input('dcoin');
    $cskill=$req->input('cskill');
    $limited_ammo=$req->input('limitammo');
    $round=$req->input('round');

   $results=Game::where('id','=',$id)->update([
    'name'=>$matchNameId,
    'Device'=>$gameDeviceId,
    'Type'=>$TypeId,
    'version'=>$Version,
    'map'=>$MapId,
    'room_id'=>$roomId,
    'room_password'=>$roompasswordId,
    'totall_p'=>$totallpeople,
    'Entry_Fee'=>$entryFee,
    'winning_price'=>$winningprice,
    'runnerup_one'=>$runnersFirstUp,
    'runnerup_two'=>$runnersSecondUp,
    'per_kill'=>$perKill,
    'total_price'=>$totallprice,
    'game_link'=>$gamelink,
    'game_name'=>$GameName,
    'default_coin'=>$default_coin,
    'cskill'=>$cskill,
    'limited_ammo'=>$limited_ammo,
    'round'=>$round
   ]);
   if($results==true){
    return 1 ;
}else{
    return 0;
}
}



function GameAdd(Request $req){
    $matchNameId=$req->input('matchNameId'); 
    $gameDeviceId=$req->input('gameDeviceId'); 
    $TypeId=$req->input('TypeId'); 
    $Version=$req->input('Version');
    $MapId=$req->input('MapId'); 
    $matchTypeId=$req->input('matchTypeId');
    $roomId=$req->input('roomId');
    $roompasswordId=$req->input('roompasswordId');
    $totallpeople=$req->input('totallpeople');
    $entryFee=$req->input('entryFee');
    $matchtime=$req->input('matchtime');
    $winningprice=$req->input('winningprice');
    $runnersFirstUp=$req->input('runnersFirstUp');
    $runnersSecondUp=$req->input('runnersSecondUp');
    $perKill=$req->input('perKill');
    $totallprice=$req->input('totallprice');
    $gamelink=$req->input('gamelink');
    $GameName=$req->input('GameName');
    $gametypebyday=$req->input('gametypebyday');

    $default_coin=$req->input('dcoin');
    $cskill=$req->input('chskill');
    $limited_ammo=$req->input('limitammo');
    $round=$req->input('round');

    $results=Game::insert([
        'name'=>$matchNameId,
        'Device'=>$gameDeviceId,
        'Type'=>$TypeId,
        'version'=>$Version,
        'map'=>$MapId,
        'match_type'=>$matchTypeId,
        'room_id'=>$roomId,
        'room_password'=>$roompasswordId,
        'totall_p'=>$totallpeople,
        'Entry_Fee'=>$entryFee,
        'match_time'=>$matchtime,
        'winning_price'=>$winningprice,
        'runnerup_one'=>$runnersFirstUp,
        'runnerup_two'=>$runnersSecondUp,
        'per_kill'=>$perKill,
        'total_price'=>$totallprice,
        'game_link'=>$gamelink,
        'game_name'=>$GameName,
        'game_type_by_date'=>$gametypebyday,
        'default_coin'=>$default_coin,
        'cskill'=>$cskill,
        'limited_ammo'=>$limited_ammo,
        'round'=>$round
       ]);
   if($results==true){
    return 1 ;
}else{
    return 0;
}

}
}
