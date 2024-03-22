@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12 mt-5 mb-5">
            <div class="">
                <div class="container">
                    <div class="row ">
                     
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center bg-primary">
                                    <h3>Category</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('category_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Category Name*</label>
                                        <input type="text" placeholder="Category Name" name="category_name" class="form-control">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Addedby" name="addedby" class="form-control" value="{{Auth::user()->id}}" hidden>
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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center  bg-primary">
                                    <h3>Category Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                    <table class="table table-dark text-center" id="myTable">
                                       <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Iamge</th>
                                            <th>Addedby</th>
                                            <th>Action</th>
                                        </tr>
                                       </thead>
                                       <tbody>
                                        @foreach ($category_info as $category_info )
                                        <tr>
                                            <td>{{$category_info->category_name}}</td>
                                            <td><img src="{{'uploads/category'}}/{{$category_info->category_image}}" alt="" width="50"></td>
                                            <td>{{$category_info->addedby}}</td>
                                            <td>
                                                <a href="{{route('edit_category_info',$category_info->id)}}" class=" btn-sm fa fa-edit "  title="Edit"></a>
                                                <a href="{{route('delete_category_info',$category_info->id)}}" class=" btn-sm fa fa-trash "  title="Delete"></a>
                                                
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                       </tbody>
                                      

                                    </table>
                                
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
@section('footer_script')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection