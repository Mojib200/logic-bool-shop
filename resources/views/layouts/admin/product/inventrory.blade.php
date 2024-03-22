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
                                    <h3>Inventory</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('inventory_info')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for=""> Product Name*</label>
                                        <input type="hidden" name="product_id" value="{{$product->id}}" class="form-control" >
                                        <input type="text" name="" value="{{$product->product_name}}" readonly class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Color Name*</label>
                                        <select name="color_id" class="form-control">
                                            <option value="">---Select Color Name---</option>
                                            @foreach ($color_info as $color_info)
                                                <option value="{{ $color_info->id }}">
                                                    {{ $color_info->color_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for=""> Size Name*</label>
                                        <select name="size_id" class="form-control">
                                            <option value="">---Select Size Name---</option>
                                            @foreach ($size_info as $size_info)
                                                <option value="{{ $size_info->id }}">
                                                    {{ $size_info->size_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for=""> Quantity*</label>
                                        <input type="number" name="quantity" placeholder="0000000"  class="form-control">
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
                                    <h3>Inventory Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <table class="table table-dark text-center table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    {{-- <th>Category ID</th> --}}
                                    <th>ID</th>
                                    <th>Product ID</th>
                                    <th>Size ID </th>
                                    <th>Color ID</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventory_info as $inventory_info )
                                <tr>
                                    <td>{{$inventory_info->id}}</td>
                                    <td>{{$inventory_info->product_id}}</td>
                                    <td>{{$inventory_info->size_id}}</td>
                                    <td>{{$inventory_info->color_id}}</td>
                                    <td>{{$inventory_info->quantity}}</td>
                                   
                                    <td>
                                        <a href="{{route('edit_inventory_info',$inventory_info->id)}}" class=" btn-sm fa fa-edit "  title="Edit"></a>
                                        <a href="{{route('delete_inventory_info',$inventory_info->id)}}" class=" btn-sm fa fa-trash "  title="Delete"></a>
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