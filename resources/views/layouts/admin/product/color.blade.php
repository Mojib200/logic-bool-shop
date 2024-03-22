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
                                    <h3>Color</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('color_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Color Name*</label>
                                        <input type="text" placeholder="color Name" name="color_name" class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Color Code*</label>
                                        <input type="color" placeholder="" name="color_code" class="form-control">
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
                                    <h3>Color Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <table class="table table-dark text-center table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    {{-- <th>Category ID</th> --}}
                                    <th>ID</th>
                                    <th>Color Name</th>
                                    <th>Color Code </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($color_infos as $color_infos )
                                <tr>
                                    <td>{{$color_infos->id}}</td>
                                    <td >{{$color_infos->color_name}}</td>
                                    <td style="color: {{$color_infos->color_code}}">{{$color_infos->color_code}}</td>
                                    <td>
                                        <a href="{{route('edit_color_infos',$color_infos->id)}}" class=" btn-sm fa fa-edit "  title="Edit"></a>
                                        <a href="{{route('delete_color_infos',$color_infos->id)}}" class=" btn-sm fa fa-trash "  title="Delete"></a>
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