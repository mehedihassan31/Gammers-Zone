<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin\ContactModel;
use App\Models\admin\users;
use App\Models\admin\order;
use App\Models\admin\ProductsModel;
use App\Models\admin\ProjectsModel;
use App\Models\admin\ReviewModel;
use App\Models\admin\ServicesModel;
use App\Models\admin\VisitorModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function HomeIndex(){

       $totalproduct =ProductsModel::count();
       $totalorder=order::count();
       $totalusers=users::count();

        return view('admin.home',[
            'totalproduct'=>$totalproduct,
            'totalorder'=>$totalorder,
            'totalusers'=>$totalusers,
        ]);



    }
}
