<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function ContactIndex(){
        return view('admin.Contact');
    }

    // function getContactData(){
    //     $results=json_encode( ContactModel::orderBy('id','desc')->get());
    //     return $results;
    // }

    // function ContactDelete(Request $request){
    //     $id=$request->input('id');
    //     $results=ContactModel::where('id','=',$id)->delete();
    //     if($results==true){
    //         return 1;
    //     }else{
    //         return 0;
    //     }


    // }
}
