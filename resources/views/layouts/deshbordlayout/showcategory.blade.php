@extends('layouts.deshbordlayout.deshbordlayout')


@section('deshbord')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            
            <span> All Category</span>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Category name</th>
                        <th>Categoty Image</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($showcategoris as $key=>$category)
                    <tr>
                        <td>{{$showcategoris->firstItem()+ $key}} </td>
                        <td>{{$category->title}} </td>
                        <td>
                             <img src="{{asset('storage/category/'.$category->category_img)}}" alt="Category img" width="200">
                            
                            
                        </td>

                        <td> <a href="{{route('category.edite',$category->slug)}}"> <button class="btn btn-primary">edite</button></a> 
                            <a href="#" class="btn btn-danger dlt-btn">Delete</a>
                            <form action="{{route('category.delete',$category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                       
                    </tr>
                    @empty

                    <tr>
                        <td colspan="4" class="text-center">

                            <h1>No Data Found!</h1>
                        </td>

                    </tr>
                        
                    @endforelse

                   
                
                </table>

               <div>
                {{$showcategoris->links()}}
               </div>
           
        </div>

        <div class="col-lg-4">
            <div class="card my-2">
                <div class="card-header">
                   Add Category
                </div>
                <div class="card-body">
                    <form action="{{route('category.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="title" type="text" placeholder="Add Category" class="form-control">
                        @error('title')
                            <span class="text-danger">{{$message}}</span> <br>                          
                        @enderror
                        <span>Category Image</span> <br>
                        <label for="categoryimg"><img src="https://api.dicebear.com/7.x/initials/svg?seed=POST" alt="img" class="showimg" width="250px"></label>
                        <input name="category_img" type="file" class="inputimg d-none" id="categoryimg"><br>
                        @error('category_img')
                        <span class="text-danger">{{$message}}</span> <br>
                            
                        @enderror

                      <button class="btn btn-primary my-2"> Add</button>
                    </form>
                </div>
            </div>
        </div>

        
            
        
    </div>
</div>

@push('customjs')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(document).ready(function(){
        $('.dlt-btn').click(function(e){
    e.preventDefault();

    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {

   $(this).next('form').submit();

    // Swal.fire({
    //   title: "Deleted!",
    //   text: "Your file has been deleted.",
    //   icon: "success"
    // });
  }
});



 })


    })

 
 

</script>

{{-- for select image show script --}}
<script>
    let inputImg = document.querySelector('.inputimg');
    let showimg = document.querySelector('.showimg');

    inputImg.addEventListener('change',(event)=>{
        let url = URL.createObjectURL(event.target.files[0]);
        showimg.src = url;

    })
    

</script>
    
@endpush
    
@endsection