<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Helpers\SlugGenerator;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

   use SlugGenerator;
   /**
    * POST ADD
    */
     public function postadd(){
        $categoris = Categorie::select('id','title')->latest()->get();
        return view('layouts.deshbordlayout.addpost', compact('categoris') );
     }

     function storepost(Request $request){
      $request->validate([
         'title' => 'required|string|max:15',
         'category_id'=>'required',

      ],
      [
         'title'=>[
            'required'=>'title is required',
            'string'=>'title must be string',
            
         ],

         'category_id'=>[
            'required'=>'Category is required',

         ]


      ]
   );

   // dd($request->category_id);

   $category_name = Categorie::where('id',$request->category_id)->value('title');
   // dd($category_name);

      if($request->hasFile('Profile_img')){
         $ext =  $request->Profile_img->extension();
         $imgname=$this->genarateslug($request->title,Post::class)."_".Carbon::now()->format('d-m-y-h-m-s').".".$ext;
         $request->Profile_img->storeAs('post',$imgname,'public');

      }

      $addpost = new Post();
      $addpost->title = $request->title;
      $addpost->slug = $this->genarateslug($request->title,Post::class);
      $addpost->User_id = auth()->user()->id;
      $addpost->Categorie_id = $request->category_id;
      $addpost->post_img = $imgname;
      $addpost->categoryname=$category_name;
      $addpost->save();
      return back();

   }


   
     /**
      * SHOW POST
      */

function showpost(){

   $allposts = Post::with('Categorie')->latest()->paginate(2);
   return view('layouts.deshbordlayout.viewallpost',compact('allposts'));
}

/**EDITE POST */
function editepost($id){
   $editepost = Post::find($id);
   return view('layouts.deshbordlayout.postedite',compact('editepost'));
}

/**
 * POST UPDATE
 */
function postupdate(Request $request,$id){
   $postupdate = Post::where('id',$id)->first();
   if($request->hasFile('Profile_img')){
      Storage::delete("public/post/".$postupdate->post_img);
      $ext =  $request->Profile_img->extension();
      $imgname=$this->genarateslug($request->title,Post::class)."_".Carbon::now()->format('d-m-y-h-m-s').".".$ext;
      $request->Profile_img->storeAs('post',$imgname,'public');
      $postupdate->title= $request->title;
      $postupdate->slug = $this->genarateslug($request->title,Post::class);
      $postupdate->post_img = $imgname;
      $postupdate->save();
      return back();

   }else{
      $postupdate->title= $request->title;
      $postupdate->slug = $this->genarateslug($request->title,Post::class);
      $postupdate->post_img = null;
      $postupdate->save();
   
      return back();

   }

   

}

/**
 * DELETE POST
 */
function postdelete($id){
  $post= Post::find($id);
   Storage::delete("public/post/".$post->post_img);
   $post->delete();
   return back();
}



}
