<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\matches;
use Illuminate\Http\Request;

class matchesController extends Controller
{
    function getAllMatches(){

        $matches=matches::all();

        return $matches;
    }
}
