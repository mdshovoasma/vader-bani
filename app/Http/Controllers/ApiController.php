<?php

namespace App\Http\Controllers;

use App\Http\Apihelper\JasonHelper;
use App\Http\Helpers\SlugGenerator;
use App\Models\Categorie;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    use SlugGenerator; 
    function getallpostapi($id=null){

        /**
         * **GET ALL POST API
         */
     

        if(!$id){
            $post = Post::get();
            return $this->success('success','All Post Are Get',$post,200);
        }else{
            $post = Post::findOrFail($id);
          
            return $this->success('success',$id . 'number post',[$post],200);
    
        }

    }


    /**
     * ** GET ALL  CATEGORY API
     */

     function allcategory($id=null){

        if(!$id){
            $category =Categorie::get();
            return response()->json([
                    'status'=>'success',
                    'message'=>'Get all category',
                     'category'=>$category
                 ],200);
            
    
        }else{
            $category =Categorie::findOrFail($id);
            return response()->json([
                'status'=>'success',
                'message'=>$id." ".'number category' ,
                 'category'=>$category
             ],200);
    
        }


     }

}
