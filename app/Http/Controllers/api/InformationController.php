<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\admin\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    function getInformationData(){
        $results=Information::get();
        return $results;
    }
}
