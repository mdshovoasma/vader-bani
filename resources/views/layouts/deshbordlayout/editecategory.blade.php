@extends('layouts.deshbordlayout.deshbordlayout')


@section('deshbord')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card my-2">
                <div class="card-header">
                   Edite Category
                </div>
                <div class="card-body">

                    <form action="{{route('category.update',$categoryslug->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input name="title" value="{{$categoryslug->title}}" type="text" placeholder="Add Category" class="form-control">
                        @error('title')
                            <span class="text-danger">{{$message}}</span> <br>                          
                        @enderror

                        <span>Category Img</span> <br>
                        <label for="Category_image"> <img  src="https://api.dicebear.com/7.x/avataaars-neutral/svg?seed=Felix" alt="img" class="profileImage" width="300px"> </label>
                        <input  name="Category_image" type="file"   id="Category_image"  class="profile_pic_selector d-none"><br>
                        @error('Category_image')
                        <span class="text-danger">{{$message}} </span> <br>                         
                        @enderror

                      <button class="btn btn-primary my-2"> Add</button>
                    </form>
                    {{-- <form action="{{ route('category.update',$categoryslug->slug)}}" method="post" >
                        @csrf
                        @method('PUT')
                        <input value="{{$categoryslug->title}}" class="form-control" type="text" name="title" id="" placeholder="category name">
                        @error('title')
                        <span class="text-danger"> {{$message}} </span> <br>
                            
                        @enderror   
                        <button class="btn btn-primary my-2">Update</button>
                    </form> --}}
                </div>
            </div>


            
        </div>
    </div>
    
    <script>

      
        let profileInput = document.querySelector('.profile_pic_selector');
         let profileImage = document.querySelector('.profileImage');


        profileInput.addEventListener('change',(event)=>{
            let url = URL.createObjectURL(event.target.files[0]);
            profileImage.src = url;
           

        })

    </script>
    
@endsection

