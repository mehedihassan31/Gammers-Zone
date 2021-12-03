<?php

namespace App\Http\Controllers\api;
use App\Models\admin\slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function getSliderData(){
        $results=slider::all();
        return $results;

    }
}
