<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\transection;
use Illuminate\Http\Request;

class transectionController extends Controller
{
    function transectionsIndex(){

        return view("admin.transection");

    }

    function getTransectionData(){
        
         $results=json_encode(transection::orderBy('id','desc')->get());
        return $results;

    }

}
