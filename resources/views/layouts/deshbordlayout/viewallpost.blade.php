@extends('layouts.deshbordlayout.deshbordlayout')


@section('deshbord')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            
            <span> All Post</span>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Post title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($allposts as $key=>$allpost)
                    <tr>
                        <td>{{$allposts->firstItem()+ $key}} </td>
                        <td>{{$allpost->title}} </td>
                        <td>{{$allpost->Categorie->title}}</td>
                        <td>
                            <img src="{{asset('storage/post/'.$allpost->post_img)}}" alt="post"  width="200px">
                        </td>
                        <td> <a href="{{route('post.edite',$allpost->id)}}"> <button class="btn btn-primary">Edite</button></a> 
                            <a href="#" class="btn btn-danger dlt-btn">Delete</a>
                            <form action="{{route('post.delete',$allpost->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                       
                    </tr>
                    @empty

                    <tr>
                        <td colspan="5" class="text-center">

                            <h1>No Data Found!</h1>
                        </td>

                    </tr>
                        
                    @endforelse

                   
                
                </table>

               <div>
                {{$allposts->links()}}
               </div>
           
        </div>
{{-- 
        <div class="col-lg-4">
            <div class="card my-2">
                <div class="card-header">
                   Add Category
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div> --}}

        
            
        
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
    
@endpush
    
@endsection