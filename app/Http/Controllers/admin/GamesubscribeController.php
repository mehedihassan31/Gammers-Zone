<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\gamesubscribe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamesubscribeController extends Controller
{
    function ResultIndex($id){

        return view('admin.results',[
            'match_id'=>$id,
        ]);
    }
}
