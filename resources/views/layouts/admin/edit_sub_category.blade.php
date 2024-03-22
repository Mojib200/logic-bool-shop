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
                                 <form action="{{route('sub_update_category_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for=""class="form-label">Category Name </label>
                                        <select name="category_id" class="form-label">
                                            <option value="">-- Select Category ---</option>
                                            @foreach ($category_info as $category_info)
                                                <option value="{{ $category_info->id }}">{{ $category_info->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Sub Category Name*</label>
                                        <input type="text" placeholder="Category Name" name="sub_category_name" class="form-control" value="{{$this_sub_category_info->sub_category_name}}">
                                        <input type="text" placeholder="Category Name" name="id" class="form-control" value="{{$this_sub_category_info->id}}" hidden>
                                    </div>
                                
                                    <div class="mb-3 mt-3">
                                        <img src="{{'uploads/sub_category'}}/{{$this_sub_category_info->sub_category_image}}" alt="" width="100">
                                    </div>
                                    <div>
                                        <label for="">Sub Category Image*</label>
                                        <input type="file" placeholder="" name="sub_category_image" class="form-control">
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