<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\matches;
use Illuminate\Http\Request;

class matchesController extends Controller
{

    function getAllMatches(){

        $matches=matches::select("id",
        "name",
        "Device",
        "Type",
        "version",
        "map",
        "match_type",
        "totall_p",
        "Entry_Fee",
        "match_time",
        "winning_price",
        "runnerup_one",
        "runnerup_two",
        "per_kill",
        "total_price",
        "registered_p",
        "game_link",
        "category",
        "game_name",
        "game_type_by_date")->get();
        return $matches;
    }

    


}
