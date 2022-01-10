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

    function IndexWallet(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.wallet',[
            'userdata'=>$userdata
        ]);

    }
    function IndexWithdraw(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.withdraw',[
            'userdata'=>$userdata
        ]);

    }

    function IndexTransection(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.transection',[
            'userdata'=>$userdata
        ]);

    }
    function IndexMystatistics(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.mystatistics',[
            'userdata'=>$userdata
        ]);

    }

    function IndexMyorder(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.myorder',[
            'userdata'=>$userdata
        ]);

    }
    function IndexDeposits(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.deposits',[
            'userdata'=>$userdata
        ]);

    }
    function IndexRefer(){
        $id=Auth::user()->id;
        $userdata=users::find($id);

        return view('user.refer',[
            'userdata'=>$userdata
        ]);

    }








}
