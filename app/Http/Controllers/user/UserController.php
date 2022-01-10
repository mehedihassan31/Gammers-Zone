<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function IndexProfile(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.profile',[
            'userdata'=>$userdata
        ]);
    }

    

    function IndexDashboard(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.dashboard',[
            'userdata'=>$userdata
        ]);

    }
}
