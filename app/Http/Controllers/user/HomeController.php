<?php

namespace App\Http\Controllers\user;


use App\Models\admin\slider;
use App\Models\matches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider=slider::all();
        $product=product::all();
        $game=matches::all();
        $games=matches::all();
        
        return view('home',[
            'slider'=>$slider,
            'products'=>$product,
            'games'=>$games,
            'game'=>$game,
        ]);
    }
}
