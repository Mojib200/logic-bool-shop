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
                                    <h3>Brand</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('brand_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Brand Name*</label>
                                        <input type="text" placeholder="Brand Name" name="brand_name" class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Brand Image*</label>
                                        <input type="file" placeholder="" name="brand_image" class="form-control">
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
                                    <h3>Brand Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <table class="table table-dark text-center table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    {{-- <th>Category ID</th> --}}
                                    <th>ID</th>
                                    <th>Brand Name</th>
                                    <th>Brand Image </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brand_infos as $brand_infos )
                                <tr>
                                    <td>{{$brand_infos->id}}</td>
                                    <td>{{$brand_infos->brand_name}}</td>
                                    <td><img src="{{'uploads/brand'}}/{{$brand_infos->brand_image}}" alt="" width="50"></td>
                                    <td>
                                        <a href="{{route('edit_brand_infos',$brand_infos->id)}}" class=" btn-sm fa fa-edit "  title="Edit"></a>
                                        <a href="{{route('delete_brand_infos',$brand_infos->id)}}" class=" btn-sm fa fa-trash "  title="Delete"></a>
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