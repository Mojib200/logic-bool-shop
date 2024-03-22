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
                                    <h3>Edit Color</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('update_color_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Color Name*</label>
                                        <input type="text" placeholder="Color Name" name="color_name" class="form-control" value="{{$this_color_info->color_name}}">
                                        <input type="text" placeholder="color Name" name="id" class="form-control" value="{{$this_color_info->id}}" hidden>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for=""> Color Code*</label>
                                        <input type="text" placeholder="Color Code" name="color_code" class="form-control" value="{{$this_color_info->color_code}}">
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