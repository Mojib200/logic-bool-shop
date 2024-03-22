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
                                    <h3>Edit Brand</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('update_brand_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Barnd Name*</label>
                                        <input type="text" placeholder="Brand Name" name="brand_name" class="form-control" value="{{$this_brand_info->brand_name}}">
                                        <input type="text" placeholder="Brand Name" name="id" class="form-control" value="{{$this_brand_info->id}}" hidden>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <img src="{{'uploads/brand'}}/{{$this_brand_info->brand_image}}" alt="" width="100">
                                    </div>
                                 
                                    <div class="mb-3 mt-3">
                                        <label for=""> Brand Image*</label>
                                        <input type="file" placeholder="Color Code" name="brand_image" class="form-control" >
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