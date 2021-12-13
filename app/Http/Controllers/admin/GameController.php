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


//     function getCoursedetails(Request $req){

//        $id=$req->input('id');
//        $results=json_encode(CourseModel::where('id','=',$id)->get());
//        return $results;
//     }


//     function courseDelete(Request $request){
//         $id=$request->input('id');
//         $results=CourseModel::where('id','=',$id)->delete();
//             if($results==true){
//                 return 1 ;
//             }else{
//                 return 0;
//             }
                        
//    }


//    function courseUpdate(Request $req){
//     $id=$req->input('id');
//     $course_name=$req->input('course_name');
//     $course_des=$req->input('course_des');
//     $course_fee=$req->input('course_fee');
//     $course_totalenroll=$req->input('course_totalenroll');
//     $course_totalclass=$req->input('course_totalclass');
//     $course_link=$req->input('course_link');
//     $course_img= $req->input('course_img');
//    $results=CourseModel::where('id','=',$id)->update([
//     'course_name'=>$course_name,
//    'course_des'=>$course_des,
//    'course_fee'=>$course_fee,
//    'course_totalenroll'=>$course_totalenroll,
//    'course_totalclass'=>$course_totalclass,
//    'course_link'=>$course_link,
//    'course_img'=>$course_img
//    ]);
//    if($results==true){
//     return 1 ;
// }else{
//     return 0;
// }
// }



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
       ]);
   if($results==true){
    return 1 ;
}else{
    return 0;
}

}
}
