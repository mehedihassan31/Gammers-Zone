<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\admin\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    function getInformationData(){

        $userbannedcheck=Auth::user()->banned;
        $results=Information::get();

        $response=[
            "infromation"=>$results,
            "banned"=>$userbannedcheck


        ];

        return response($response,200);
    }
}
