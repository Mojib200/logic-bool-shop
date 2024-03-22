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
                                    <h3>Edit Size</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('update_size_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Size Name*</label>
                                        <input type="text" placeholder="Color Name" name="size_name" class="form-control" value="{{$this_size_info->size_name}}">
                                        <input type="text" placeholder="color Name" name="id" class="form-control" value="{{$this_size_info->id}}" hidden>
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