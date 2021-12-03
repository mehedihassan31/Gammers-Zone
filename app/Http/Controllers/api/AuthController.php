<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request){
        $fields=$request->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'username'=>'required|string|unique:users,username',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

        $user=User::create([
            'fname'=>$fields['fname'],
            'lname'=>$fields['lname'],
            'username'=>$fields['username'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password'])
        ]);
        $token=$user->createToken('myToken')->plainTextToken;
        $response= [
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);


    }
}
