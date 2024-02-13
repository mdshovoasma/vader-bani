<?php

namespace App\Http\Helpers;

use Illuminate\Support\Str;

trait SlugGenerator{

    public function genarateslug($title,$model){
        $count = $model::where('slug','like','%'.str::slug($title).'%')->count();
     if( $count >=1){
        $count++;
      return $slug =Str::slug( $title). '_'. $count;
     }else{
     return $slug =Str::slug( $title);

     }
    }





    function success($status,$mgs,$data,$statuscode=200){

        return response()->json([
            'status'=>$status,
            'message'=>$mgs,
             'post'=>$data
         ],$statuscode);

    }

}