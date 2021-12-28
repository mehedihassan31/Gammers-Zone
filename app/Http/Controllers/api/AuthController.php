<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\gamesubscribe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function register(Request $request){
        
        $fields=$request->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'username'=>'required|string|unique:users,username',
            'email'=>'required|string|unique:users,email',
            'phone'=>'required|string|unique:users,phone',
            'reference'=>'nullable|string',
            'password'=>'required|string|confirmed'

        ]);

        if($fields['reference']!=NULL){
            $checkref=User::where('username',$fields['reference'])->count();
            if($checkref==true){                
                            $user=User::create([
                                'fname'=>$fields['fname'],
                                'lname'=>$fields['lname'],
                                'username'=>$fields['username'],
                                'email'=>$fields['email'],
                                'phone'=>$fields['phone'],
                                'refer'=>true,
                                'reference'=>$fields['reference'],
                                'password'=>bcrypt($fields['password']),
                                
                            ]);
                            
                            $token=$user->createToken('myToken')->plainTextToken;
                            $response= [
                                'user'=>$user,
                                'token'=>$token
                            ];

                            return response($response,201);
               

            }else{

                return response('Invalid refer code',200);

            }

        }else{

            $user=User::create([
                'fname'=>$fields['fname'],
                'lname'=>$fields['lname'],
                'username'=>$fields['username'],
                'email'=>$fields['email'],
                'phone'=>$fields['phone'],
                'refer'=>false,
                'reference'=>$fields['reference'],
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

    function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }




    function userPassUpdata(Request $request){

        $fields = $request->validate([
            'id' => 'required',
            'email' => 'required|string',
            'passwordold' => 'required|string',
            'password'=>'required|string|confirmed'
        ]);

        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['passwordold'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $user=User::where('id',$fields['id'])->update([
            'password'=>bcrypt($fields['password'])
        ]);


  
        if($user==true){
            return [
                'message'=>"update successful"
            ];

        }else{

            return [
                'message'=>" Update failed"
            ];
        }

    }


    function logout(Request $request){

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    function userDataUpdata(Request $request){
        $fields=$request->validate([
            'id'=>'required',
            'fname'=>'required|string',
            'lname'=>'required|string',
            'phone'=>'required|string|unique:users,phone'
        ]);

        $user=User::where('id',$fields['id'])->update([
            'fname'=>$fields['fname'],
            'lname'=>$fields['lname'],
            'phone'=>$fields['phone']
        ]);

        if($user==true){
            return [
                'message'=>"update successful"
            ];

        }else{

            return [
                'message'=>" Update failed"
            ];
        }
    }



    function getUserData($id){
        $user=User::findOrFail($id);
        $results=gamesubscribe::with('match')->where('user_id',$id)->get();
        $totall=count($results);
        $response=[
            "user"=>$user,
            'Total_join'=>$totall
        ];
        return response($response, 200);
    }


}
