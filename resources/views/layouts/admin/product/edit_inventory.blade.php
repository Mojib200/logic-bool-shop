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
                                        <h3>Inventory</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                        <form action="{{ route('edit_inventory') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div>
                                                <label for=""> Product Name*</label>
                                                <input type="hidden" name="product_id" value="{{ $inventory_infos->product_id }}"
                                                    class="form-control">
                                                <input type="hidden" name="id" value="{{ $inventory_infos->id }}"
                                                    class="form-control">
                                                <input type="text" name="" value="{{ $inventory_infos->relation_to_product->product_name }}"
                                                    readonly class="form-control">
                                            </div>
                                            <div>
                                                <label for=""> Color Name : {{ $inventory_infos->color_id }}*</label>
                                             
                                                <select name="color_id" class="form-control">
                                                    <option value="">---Select Color Name---</option>
                                                    @foreach ($color_info as $color_info)
                                                        <option value="{{ $color_info->id }}">
                                                            {{ $color_info->color_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label for=""> Size Name : {{ $inventory_infos->size_id }}*</label>
                                                <select name="size_id" class="form-control">
                                                    <option value="">---Select Size Name---</option>
                                                    @foreach ($size_info as $size_info)
                                                        <option value="{{ $size_info->id }}">
                                                            {{ $size_info->size_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label for=""> Quantity : {{ $inventory_infos->quantity }}*</label>
                                                <input type="number" name="quantity" placeholder="0000000"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-danger">Click Me</button>
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
@section('footer_script')

