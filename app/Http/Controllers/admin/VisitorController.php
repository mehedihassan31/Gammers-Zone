<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin\VisitorModel;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    function VisitorIndex(){

        // $data=json_decode(VisitorModel::orderBy('id','desc')->take(500)->get());


        // return view('visitor',['Visitor_data'=>$data]);
        return view('admin.visitor');
    }
}
