<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;


use App\Models\admin\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    
    function sliderIndex(){

        return view('admin.slider');
    }

    function getSliderData(){

        $results=json_encode(slider::orderBy('id','desc')->get());
        return $results;

    }

    function sliderAdd(Request $req){

        $name=$req->input('title');
        $link=$req->input('link');
        $photopath= $req->file('photo')->store('public');
        $photoName=(explode('/',$photopath))[1];

        $host=$_SERVER['HTTP_HOST'];

        $location="http://".$host."/storage/".$photoName;

       $results=slider::insert(['photo'=>$location,'link'=>$link,'title'=>$name]);
       if($results==true){
        return 1 ;
    }else{
    
        return 0;
    }
    
    }

    function SliderDelete(Request $request){
        $id=$request->input('id');
        $oldurl=$request->input('oldphotourl');
        $oldphotourlarray=explode("/",$oldurl);
        $oldphotoname=end($oldphotourlarray);
        $deletephotofile=Storage::delete('public/'.$oldphotoname);
        $results=slider::where('id','=',$id)->delete();
            if($results==true){
                return 1 ;
            }else{
                return 0;
            }
                        
   }




}
