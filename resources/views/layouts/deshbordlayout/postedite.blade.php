@extends('layouts.deshbordlayout.deshbordlayout')


@section('deshbord')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card my-2">
                <div class="card-header">
                  Your Post
                </div>
                <div class="card-body">
                        <label for="text">Post title</label>
                    <input type="text" value="{{$editepost->title}}" class="form-control">
                    <label for="text">Post Image</label> <br><br>
                    <img src="{{asset('storage/post/'.$editepost->post_img)}}" alt="post" width="500px" class="my-3">

                   


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


        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1>Update Post</h1>

                    <div class="card-body">
                        <form action="{{ route('post.update',$editepost->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="text">Post title</label>
                            <input name="title" value="{{$editepost->title}}" type="text" placeholder="Add Category" class="form-control">
                            @error('title')
                                <span class="text-danger">{{$message}}</span> <br>                          
                            @enderror


                            <label for="update_img" > 

                                <img src="https://api.dicebear.com/7.x/big-ears/svg?seed=Felix" alt="img" class="src_img my-3" width="200px"> <br>
                            </label> <br>

                            <label for=""> Post Image</label>
                            <input name="Profile_img" type="file" class="my-2 form-control d-none  input_img" id="update_img"> <br>
                          <button class="btn btn-primary my-2"> Add</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    

    {{--    Image change script --}}
    <script>
        let postInput = document.querySelector('.input_img');
       let postImage = document.querySelector('.src_img');

       postInput.addEventListener('change',(event)=>{
          let url = URL.createObjectURL(event.target.files[0]);
          postImage.src = url;
         

      })
     
  </script>
    
    
@endsection
