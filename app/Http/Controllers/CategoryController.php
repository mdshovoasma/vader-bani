<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Categorie;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Helpers\SlugGenerator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    
    use SlugGenerator;

    /**
     * SHOW CATEGORY
     */
    function showcategory(){
        $showcategoris = Categorie::latest()->paginate(3);
        return view('layouts.deshbordlayout.showcategory',compact('showcategoris'));
    }

    /**
     * ADD CATEGORY
     */

    function addcategory(Request $request){
      
        $request->validate([
            'title' => 'required|string|max:15',
            'category_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ],
        
        [
            'title'=>[
                'required'=>'Category is required',
                'string'=>'Category must be string',
                
            ],

            "category_img"=>[
                'required'=>"category Image is required"
            ]
        ]);
        
        if($request->hasFile("category_img")){
            $ext =  $request->category_img->extension();
            $imgname=$this->genarateslug($request->title,Categorie::class)."_".Carbon::now()->format('d-m-y-h-m-s').".".$ext;
            $request->category_img->storeAs('category',$imgname,'public');
            $category = new Categorie();
            $category->title = $request->title;
            $category->slug= $this->genarateslug($request->title,Categorie::class);
            $category->category_img= $imgname ;
            $category->save();
            return back();

        }else{
            $category = new Categorie();
            $category->title = $request->title;
            $category->slug= $this->genarateslug($request->title,Categorie::class);
            $category->category_img=null;
            $category->save();
            return back();

        }

       

    }

    /**
     * EDITE CATEGORY
     */
    function editecategory(Request $request,$slug){
        $categoryslug = Categorie::where('slug',$slug)->latest()->first();
        return view('layouts.deshbordlayout.editecategory',compact('categoryslug'));
    }


    /**
     * CATEGORY UPDATE
     */

    function categoryupdate(Request $request ,$slug){

        $request->validate([
            'title' => 'required|string|max:15',
            'Category_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],
        
        [
            'title'=>[
                'required'=>'Category is required',
                'string'=>'Category must be string',
                
            ]

        ]);

        $categoryimg = Categorie::where('slug',$slug)->value('category_img');
        Storage::delete("public/category/".$categoryimg);
         $ext =  $request->Category_image->extension();
         $imgname=$this->genarateslug($request->title,Categorie::class)."_".Carbon::now()->format('d-m-y-h-m-s').".".$ext;
         $request->Category_image->storeAs('category',$imgname,'public');
        $updatecategory =Categorie::where('slug', $slug)->first();
        $updatecategory->title = $request->title;  
        $updatecategory->slug= $this->genarateslug($request->title,Categorie::class);
        $updatecategory->category_img=$imgname;
        $updatecategory->save();
        return redirect()->route('category.show');

    }



    /**
     * DELETE CATEGORY
     */

    function deletecategory($id){
       $categoryimg =  Categorie::find($id);
       Storage::delete("public/category/".$categoryimg->category_img);
        Categorie::find($id)->delete();
        return back();



        
      
        
    }


}




