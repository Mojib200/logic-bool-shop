@extends('layouts.dashboardmaster')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12 mt-5 mb-5">
                <div class="">
                    <div class="container">
                        <div class="row ">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header text-center bg-primary">
                                        <h3>Product</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                        <form action="{{ route('product_info') }}" method="post"
                                            enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for=""class="form-label">Category Name </label>
                                                    <select name="category_id" class="form-control" id="category_id">
                                                        <option value="">---Select Category Name---</option>
                                                        @foreach ($category_infos as $category_infos)
                                                            <option value="{{ $category_infos->id }}">
                                                                {{ $category_infos->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for=""class="form-label">Sub Category Name </label>
                                                    <select name="subcategory_id" class="form-control "
                                                        id="subcategory_name">
                                                        <option value="">---Select Sub Category Name---</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mb-3">
                                                <div>
                                                    <label for=""> Product Name*</label>
                                                    <input type="text" placeholder="Product Name" name="product_name"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div>
                                                    <label for=""> Brand Name*</label>
                                                    <select name="brand_id" class="form-control">
                                                        <option value="">---Select Brand Name---</option>
                                                        @foreach ($brand_infos as $brand_infos)
                                                            <option value="{{ $brand_infos->id }}">
                                                                {{ $brand_infos->brand_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div>
                                                    <label for=""> Product Slug*</label>
                                                    <input type="text" placeholder="Product Slug" name="product_slug"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div>
                                                    <label for=""> Product Price*</label>
                                                    <input type="number" placeholder="Product Price" name="product_price"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div>
                                                    <label for=""> Product Discount %*</label>
                                                    <input type="number" placeholder="Product Discount"
                                                        name="product_discount" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div>
                                                    <label for=""> Discount Price*</label>
                                                    <input type="number" placeholder="After Discount Discount"
                                                        name="after_product_discount" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for=""class="form-label">Short Description</label>
                                                    <textarea type="text" class="form-control " name="short_description"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for=""class="form-label">Long Description</label>
                                                    <textarea type="text" class="form-control "  name="long_description"></textarea>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for=""class="form-label">Product Image</label>
                                                    <input type="file" placeholder="Product Image"
                                                    name="product_image" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for=""class="form-label">Product Gallery</label>
                                                    <input type="file" placeholder="Product Gallery"
                                                    name="product_gallery[]" class="form-control" multiple>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-danger">Click Me</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                            <div class="card">
                                <div class="card-header text-center  bg-primary">
                                    <h3>Product Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                    <table class="table table-dark text-center">
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Product Name</th>
                                            <th>Product Slug</th>
                                            <th>Product Price</th>
                                            <th>Discount</th>
                                            <th>Discount Price</th>
                                            <th>Product Image </th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($product_infos as $product_infos)
                                        <tr>
                                            <td>{{$product_infos->category_id}}</td>
                                            <td>{{$product_infos->subcategory_id}}</td>
                                            <td>{{$product_infos->product_name}}</td>
                                            <td>{{$product_infos->product_slug}}</td>
                                            <td>{{$product_infos->product_price}}</td>
                                            <td>{{$product_infos->product_discount}}</td>
                                            <td>{{$product_infos->after_product_discount}}</td>
                                            <td><img src="{{'uploads/product'}}/{{$product_infos->product_image}}" alt="" width="50"></td>
                                            <td>
                                                <a href="{{route('inventory_product_infos',$product_infos->id)}}" class=" btn-sm fa fa-institution "  title="Inventory"></a>
                                                <a href="{{route('edit_product_infos',$product_infos->id)}}" class=" btn-sm fa fa-edit "  title="Edit"></a>
                                                <a href="{{route('delete_product_infos',$product_infos->id)}}" class=" btn-sm fa fa-trash "  title="Delete"></a>
                                                
                                            </td>
                                        </tr>
                                            
                                        @endforeach 

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
        $('#category_id').change(function() {
            var category_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/product_sub_category',
                data: {
                    'category_id': category_id
                },
                success: function(data) {
                    $('#subcategory_name').html(data);
                }
            });
        })
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
