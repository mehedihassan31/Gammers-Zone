<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\ProductsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    function ProductsIndex(){


        return view('admin.Products');
    }

    function getProductsData(){

        $results=json_encode(ProductsModel::orderBy('id','desc')->get());
        return $results;

    }




    function productDelete(Request $request){
        $id=$request->input('id');
        $results=ProductsModel::where('id','=',$id)->delete();

            if($results==true){

                return 1 ;
            }else{

                return 0;
            }


                        
   }

function getProductDetails(Request $req){

    $id=$req->input('id');
   $results= (ProductsModel::where('id','=',$id)->get());

   return $results;




}
function productUpdate(Request $req){

    $id=$req->input('id');
    $diamond=$req->input('diamond');
    $price=$req->input('price');
    $saleprice=$req->input('saleprice');
   $results=ProductsModel::where('id','=',$id)->update(['diamond'=>$diamond,'price'=>$price,'sale_price'=>$saleprice]);

  
   if($results==true){

    return 1 ;
}else{

    return 0;
}
}


function productAdd(Request $req){


    $diamond=$req->input('diamond');
    $price=$req->input('price');
    $saleprice=$req->input('saleprice');
   $results=ProductsModel::insert(['diamond'=>$diamond,'price'=>$price,'sale_price'=>$saleprice]);
   if($results==true){
    return 1 ;
}else{

    return 0;
}

}
 
}
