@extends('layouts.deshbordlayout.deshbordlayout')


@section('deshbord')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card my-2">
                <div class="card-header">
                   Add Post
                </div>
                <div class="card-body">

                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select name="category_id" id="" class="form-control">

                            <option disabled selected> No Select at all</option>

                                @forelse ($categoris as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                    
                                @empty
                                <option value="" disabled>No category Found!</option>
                                    
                                @endforelse


                            {{-- <option value="aq"> hello</option>
                            <option value="a"> hi</option> --}}
                        </select>

                        @error('category_id')

                        <span class="text-danger">{{$message}}</span>
                            
                        @enderror

                        <input name="title" type="text" class="form-control my-2" placeholder="Enter Image title">
                        @error('title')

                        <span class="text-danger">{{$message}}</span> <br>
                            
                        @enderror

                        <label for="profile_img"> <img  src="https://api.dicebear.com/7.x/avataaars-neutral/svg?seed=Felix" alt="img" class="profileImage" width="300px"> </label>
                        <input  name="Profile_img" type="file"   id="profile_img"  class="profile_pic_selector d-none"><br>


                        <button class="btn btn-primary my-2"> Add Post</button>



                    </form>


                   
                </div>
            </div>


            
        </div>
    </div>
    

    <script>

      
        let profileInput = document.querySelector('.profile_pic_selector');
         let profileImage = document.querySelector('.profileImage');

    //      function updateImage(event) {
    //     let url = URL.createObjectURL(event.target.files[0]);
    //     console.log(url);
    //     profileImage.src = url;
        
    // }
    //          profileInput.addEventListener('change', updateImage);

        profileInput.addEventListener('change',(event)=>{
            let url = URL.createObjectURL(event.target.files[0]);
            profileImage.src = url;
           

        })

    </script>
    
@endsection
