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
                                        <form action="{{ route('update_product_info') }}" method="post"
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
                                                        value="{{$product_info->product_name}}" class="form-control">
                                                        <input type="text" placeholder="Product Name" name="id"
                                                        value="{{$product_info->id}}" class="form-control" hidden>
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
                                                        value="{{$product_info->product_slug}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label for=""> Product Price*</label>
                                                        <input type="number" placeholder="Product Price"
                                                            name="product_price" value="{{$product_info->product_price}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label for=""> Product Discount %*</label>
                                                        <input type="number" placeholder="Product Discount"
                                                            name="product_discount" value="{{$product_info->product_discount}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label for=""> Discount Price*</label>
                                                        <input type="number" placeholder="After Discount Discount"
                                                            name="after_product_discount" value="{{$product_info->after_product_discount}}" class="form-control">
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
                                                        <textarea type="text" class="form-control " name="long_description"></textarea>
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
                                                  
                                                        <img src="{{'uploads/product'}}/{{$product_info->product_image}}" alt="" width="100">
                                                   
                                                     </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div>
                                                        <label for=""class="form-label">Product Gallery</label>
                                                        <input type="file" placeholder="Product Gallery"
                                                            name="product_gallery[]" class="form-control" multiple>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div>
                                                       @foreach ($product_gallerys as $product_gallerys)
                                                       <img src="{{'uploads/gallery'}}/{{$product_gallerys->product_gallery}}" alt="" width="100">
                                                       @endforeach
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
