<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin\ContactModel;
use App\Models\admin\CourseModel;
use App\Models\admin\ProjectsModel;
use App\Models\admin\ReviewModel;
use App\Models\admin\ServicesModel;
use App\Models\admin\VisitorModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function HomeIndex(){

    //    $totalcontact =ContactModel::count();
    //    $totalcourse=CourseModel::count();
    //    $totalproject=ProjectsModel::count();
    //    $totalreview=ReviewModel::count();
    //    $totalservice=ServicesModel::count();
    //    $totalvisitor=VisitorModel::count();
    //     return view('admin.home',[
    //         'totalcontact'=>$totalcontact,
    //         'totalcourse'=>$totalcourse,
    //         'totalproject'=>$totalproject,
    //         'totalreview'=>$totalreview,
    //         'totalservice'=>$totalservice,
    //         'totalvisitor'=>$totalvisitor
    //     ]);

    return view('admin.home');

    }
}
