<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\gamesubscribe;
use Illuminate\Http\Request;

class gamesubscribeController extends Controller
{
    function getAllMatcheswithroomid(){

        $matches=gamesubscribe::with('match')->get();

            return $matches;

        
    
    }

}
