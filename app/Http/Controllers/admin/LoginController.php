<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\admin\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function loginIndex(){

        return view('admin.login');
    }

    function onLogin(Request $request){

        $user=$request->input('user');
        $password=$request->input('password');
        $countvalue=AdminModel::where('username','=',$user)->where('password','=',$password)->count();

        if($countvalue==1){
            $request->session()->put('admin',$user);
            return 1;

        }else{
            return 0;
        }

    }

    function onlogout(Request $request){
        $request->session()->flush();
        return redirect('/login');

    }

    function IndexPass(){

        return view('admin.passupdateadmin');


    }
    function updatePass(Request $request){

        


        $fields = $request->validate([
            'id'=>'required',
            'username'=>'admin',
            'passwordold' =>'required|string',
            'password'=>'required|string'
        ]);

        $admin =AdminModel::where('username',$fields['username'])->first();

        // Check password
        if($admin) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }
        $userad=AdminModel::where('id',$fields['id'])->update([
            'password'=>$fields['password']
        ]);

        if($userad==true){

            return 1;

        }else{
            return 0;
        }
        


    }
}
