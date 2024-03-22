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
                                 <form action="{{route('sub_category_info')}}" method="post" enctype="multipart/form-data">
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
                                        <label for=""> Sub Category Name*</label>
                                        <input type="text" placeholder="Sub Category Name" name="sub_category_name" class="form-control">
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
                        <div class="col-md-8">
                            <div class="card ">
                                <div class="card-header text-center  bg-primary">
                                    <h3>Sub Category Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                    <table class="table table-dark text-center table table-striped display" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Category ID</th>
                                                <th>Sub Category Name</th>
                                                <th>Iamge</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sub_category_info as $sub_category_info )
                                        <tr>
                                            <td>{{$sub_category_info->category_id}}</td>
                                            <td>{{$sub_category_info->sub_category_name}}</td>
                                            <td><img src="{{'uploads/sub_category'}}/{{$sub_category_info->sub_category_image}}" alt="" width="50"></td>
                                       
                                            <td>
                                                <a href="{{route('edit_sub_category_info',$sub_category_info->id)}}" class=" btn-sm fa fa-edit "  title="Edit"></a>
                                                <a href="{{route('delete_sub_category_info',$sub_category_info->id)}}" class=" btn-sm fa fa-trash "  title="Delete"></a>
                                                
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