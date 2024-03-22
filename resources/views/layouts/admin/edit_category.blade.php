@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12 mt-5 mb-5">
            <div class="">
                <div class="container">
                    <div class="row ">
                     
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center bg-primary">
                                    <h3>Edit Category</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('update_category_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Category Name*</label>
                                        <input type="text" placeholder="Category Name" name="category_name" class="form-control" value="{{$this_category_info->category_name}}">
                                        <input type="text" placeholder="Category Name" name="id" class="form-control" value="{{$this_category_info->id}}" hidden>
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Addedby" name="addedby" class="form-control" value="{{Auth::user()->id}}" hidden>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <img src="{{'uploads/category'}}/{{$this_category_info->category_image}}" alt="" width="100">
                                    </div>
                                    <div>
                                        <label for=""> Category Image*</label>
                                        <input type="file" placeholder="" name="category_image" class="form-control">
                                    </div>
                                  
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-danger" >Click Me</button>
                                       </div>
                                 </form>
                              
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection