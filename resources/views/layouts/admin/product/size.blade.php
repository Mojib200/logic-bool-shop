
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
                                    <h3>Size</h3>
                                </div>
                                <div class="card-body bg-info">
                                    <form action="{{ route('size_info') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Size Name*</label>
                                        <input type="text" placeholder="Size Name" name="size_name"
                                            class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-danger">Click Me</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center  bg-primary">
                                    <h3>Size Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <table class="table table-dark text-center table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Size Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($size_infos as $size_infos)
                                <tr>
                                    <td>{{ $size_infos->id }}</td>
                                    <td>{{ $size_infos->size_name }}</td>
                                    <td>
                    <a href="{{route('edit_size_infos',$size_infos->id)}}" class=" btn-sm fa fa-edit "  title="Edit"></a>
                    <a href="{{route('delete_size_infos',$size_infos->id)}}" class=" btn-sm fa fa-trash "  title="Delete"></a>
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






