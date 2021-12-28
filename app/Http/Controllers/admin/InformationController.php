<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    function InformationIndex(){

        return view('admin.info');
    }

    function getInformationData(){
        $results=Information::all();
        return $results;
    }



    function InformationUpdate(Request $req){

        $id=$req->input('id');
        $addmoneyvlink=$req->input('addmoneyvlink');
        $collectroomvlink=$req->input('collectroomvlink');
        $joinmatchvlink=$req->input('joinmatchvlink');
        $termspolicy= $req->input('termspolicy');

        $bkash=$req->input('bkash');
        $nagad=$req->input('nagad');
        $roket= $req->input('roket');
        
        $results=Information::where('id','=',$id)->update([
            'addmoneyvlink'=>$addmoneyvlink,
            'collectroomvlink'=>$collectroomvlink,
            'joinmatchvlink'=>$joinmatchvlink,
            'termspolicy'=>$termspolicy ,
            'bkash'=>$bkash,
            'nagad'=>$nagad,
            'roket'=>$roket
           ]);
           if($results==true){
            return 1 ;
        }else{
            return 0;
        }

    }


    function getInformationdetails(Request $req){

        $id=$req->input('id');
        $results=json_encode(Information::where('id','=',$id)->get());
        return $results;
     }

     
}
