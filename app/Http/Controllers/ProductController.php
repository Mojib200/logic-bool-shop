<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\SubCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  function product_page()
  {
    $category_infos = Category::All();
    $sub_categorys = SubCategory::All();
    $brand_infos = Brand::All();
    $product_infos = Product::All();
    return view(
      'layouts\admin\product\product',
      [
        'sub_categorys' => $sub_categorys,
        'category_infos' => $category_infos,
        'brand_infos' => $brand_infos,
        'product_infos' => $product_infos,
      ]
    );
  }
  function product_sub_category(Request $request)
  {
    $subcategories = SubCategory::where('category_id', $request->category_id)->get();
    $str_to_send = '<option>-- Select subcategory --</option>';
    foreach ($subcategories as $subcategory) {
      $str_to_send .= '<option value="' . $subcategory->id . '">' . $subcategory->sub_category_name . '</option>';
    }
    echo $str_to_send;
  }
  function product_info(Request $request)
  {
    $product = str_replace('', '-', str::lower($request->product_name)) . '-' . rand(1000000, 99999999);
    $upload_file = $request->product_image;
    $extension = $upload_file->getClientOriginalExtension();
    $manager = new ImageManager(new Driver());
    $new_name = $request->category_id . '-' . $product . "." . $extension;
    $img = $manager->read($upload_file);
    $img->tojpeg(200)->save(base_path('public/uploads/product/' . $new_name));
    $product_id = Product::insertGetId([
      'category_id' => $request->category_id,
      'subcategory_id' => $request->subcategory_id,
      'product_name' => $request->product_name,
      'product_slug' => str_replace('', '-', Str::lower($request->product_name)) . '-' . rand(1000000, 99999999),
      'brand_id' => $request->brand_id,
      'product_price' => $request->product_price,
      'product_discount' => $request->product_discount,
      'after_product_discount' => ($request->product_price - ($request->product_price * $request->product_discount) / 100),
      'short_description' => $request->short_description,
      'long_description' => $request->long_description,
      'product_image' => $new_name,
      'created_at' => now(),

    ]);
    $product_gallerys = $request->product_gallery;
    foreach ($product_gallerys as $product_gallerys) {
      $products = str_replace('', '-', str::lower($request->product_name)) . '-' . rand(1000000, 99999999);
      $upload_files = $product_gallerys;
      $extension = $upload_files->getClientOriginalExtension();
      $manager = new ImageManager(new Driver());
      $new_names = $request->category_id . '-' . $products . "." . $extension;
      $imgs = $manager->read($upload_files);
      $imgs->tojpeg(200)->save(base_path('public/uploads/gallery/' . $new_names));
      ProductGallery::insert([
        'product_id' => $product_id,
        'product_gallery' => $new_names,
        'created_at' => now(),

      ]);
    }
    $notification = array(
      'message' => 'Product Information Insert Done Successfully',
      'alert-type' => 'success'
    );
    return back()->with($notification);
  }

  function edit_product_infos($id)
  {
    $product_info = Product::find($id);
    $product_gallerys = ProductGallery::where('product_id', $id)->get();
    $brand_infos = Brand::All();
    $category_infos = Category::All();
    $sub_categorys = SubCategory::All();
    return view('layouts.admin.product.edit_product', [
      'product_info' => $product_info,
      'product_gallerys' => $product_gallerys,
      'category_infos' => $category_infos,
      'sub_categorys' => $sub_categorys,
      'brand_infos' => $brand_infos,

    ]);
  }
  function delete_product_infos($id)
  {
    $product_image = Product::find($id)->product_image;
    $product_gallerys = ProductGallery::where('product_id', $id)->get();
    // echo $product_gallerys;
    // die();
    foreach ($product_gallerys as $product_gallerys) {
      $product_gallery = $product_gallerys->product_gallery;
      $ids = $product_gallerys->id;
      $delete_for_product_gallery = public_path('uploads/gallery/' . $product_gallery);
      unlink($delete_for_product_gallery);
      ProductGallery::find($ids)->delete();
    }
    $delete_for_product_image = public_path('uploads/product/' . $product_image);
    unlink($delete_for_product_image);
    Product::find($id)->delete();


    $notification = array(
      'message' => 'Product Information Delete Done Successfully',
      'alert-type' => 'success'
    );
    return back()->with($notification);
  }





  function update_product_info(Request $request)
  {
    if ($request->product_gallery != '') {
      if ($request->product_image != '') {
        $ids = $request->id;

        $product_images = Product::find($request->id)->product_image;
        $delete_for_product_image = public_path('uploads/product/' . $product_images);
        unlink($delete_for_product_image);
        $product = str_replace('', '-', str::lower($request->product_name)) . '-' . rand(1000000, 99999999);
        $upload_file = $request->product_image;
        $extension = $upload_file->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $new_name = $request->category_id.'-' . $product . "." . $extension;
        $img = $manager->read($upload_file);
        $img->tojpeg(200)->save(base_path('public/uploads/product/' . $new_name));
        Product::find($request->id)->update([
              'category_id' => $request->category_id,
              'subcategory_id' => $request->subcategory_id,
              'product_name' => $request->product_name,
              'product_slug' => str_replace('', '-', Str::lower($request->product_name)) . '-' . rand(1000000, 99999999),
              'brand_id' => $request->brand_id,
              'product_price' => $request->product_price,
              'product_discount' => $request->product_discount,
              'after_product_discount' => ($request->product_price - ($request->product_price * $request->product_discount) / 100),
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,
              'product_image' => $new_name,
              'updated_at' => now(),

        ]);

        $product_gallerys_this = $request->product_gallery;

        $product_gallerys = ProductGallery::where('product_id',$request->id)->get();

        foreach($product_gallerys as $product_gallerys){
          $product_for_gallerys=$product_gallerys->product_gallery;
          $delete_for_product_gallery = public_path('uploads/gallery/' . $product_for_gallerys);
          unlink($delete_for_product_gallery);
        }   
        // $ok=ProductGallery::where('product_id',$ids)->get();
        // echo $ok;
        ProductGallery::where('product_id',$ids)->delete();
          
         foreach($product_gallerys_this as $product_gallerys_this){
          $products = str_replace('', '-', str::lower($request->product_name)) . '-' . rand(1000000, 99999999);
          $upload_files = $product_gallerys_this;
          $extension = $upload_files->getClientOriginalExtension();
          $manager = new ImageManager(new Driver());
          $new_names = $request->category_id . '-' . $products . "." . $extension;
          $imgs = $manager->read($upload_files);
          $imgs->tojpeg(200)->save(base_path('public/uploads/gallery/' . $new_names));
          ProductGallery::insert([
            'product_id' => $ids,
            'product_gallery' => $new_names,
            'updated_at'=>now(),
          ]);
        
        }
        $notification = array(
          'message' => 'Product Information Update Done Successfully',
          'alert-type' => 'success'
        );
        return back()->with($notification);
      } 
      




      else {
        $ids = $request->id;
        Product::find($request->id)->update([
              'category_id' => $request->category_id,
              'subcategory_id' => $request->subcategory_id,
              'product_name' => $request->product_name,
              'product_slug' => str_replace('', '-', Str::lower($request->product_name)) . '-' . rand(1000000, 99999999),
              'brand_id' => $request->brand_id,
              'product_price' => $request->product_price,
              'product_discount' => $request->product_discount,
              'after_product_discount' => ($request->product_price - ($request->product_price * $request->product_discount) / 100),
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,
              'updated_at' => now(),

        ]);

        $product_gallerys_this = $request->product_gallery;

        $product_gallerys = ProductGallery::where('product_id',$request->id)->get();

        foreach($product_gallerys as $product_gallerys){
          $product_for_gallerys=$product_gallerys->product_gallery;
          $delete_for_product_gallery = public_path('uploads/gallery/' . $product_for_gallerys);
          unlink($delete_for_product_gallery);
        }   
        // $ok=ProductGallery::where('product_id',$ids)->get();
        // echo $ok;
        ProductGallery::where('product_id',$ids)->delete();
          
         foreach($product_gallerys_this as $product_gallerys_this){
          $products = str_replace('', '-', str::lower($request->product_name)) . '-' . rand(1000000, 99999999);
          $upload_files = $product_gallerys_this;
          $extension = $upload_files->getClientOriginalExtension();
          $manager = new ImageManager(new Driver());
          $new_names = $request->category_id . '-' . $products . "." . $extension;
          $imgs = $manager->read($upload_files);
          $imgs->tojpeg(200)->save(base_path('public/uploads/gallery/' . $new_names));
          ProductGallery::insert([
            'product_id' => $ids,
            'product_gallery' => $new_names,
            'updated_at'=>now(),
          ]);
        
        }
        $notification = array(
          'message' => 'Product Information Update Done Successfully',
          'alert-type' => 'success'
        );
        return back()->with($notification);
      }
    }





    else{

      if ($request->product_image!='') {
        $product_images = Product::find($request->id)->product_image;
        $delete_for_product_image = public_path('uploads/product/' . $product_images);
        unlink($delete_for_product_image);
        $product = str_replace('', '-', str::lower($request->product_name)) . '-' . rand(1000000, 99999999);
        $upload_file = $request->product_image;
        $extension = $upload_file->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $new_name = $request->category_id.'-' . $product . "." . $extension;
        $img = $manager->read($upload_file);
        $img->tojpeg(200)->save(base_path('public/uploads/product/' . $new_name));
        Product::find($request->id)->update([
              'category_id' => $request->category_id,
              'subcategory_id' => $request->subcategory_id,
              'product_name' => $request->product_name,
              'product_slug' => str_replace('', '-', Str::lower($request->product_name)) . '-' . rand(1000000, 99999999),
              'brand_id' => $request->brand_id,
              'product_price' => $request->product_price,
              'product_discount' => $request->product_discount,
              'after_product_discount' => ($request->product_price - ($request->product_price * $request->product_discount) / 100),
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,
              'product_image' => $new_name,
              'updated_at' => now(),

        ]);

       
        $notification = array(
          'message' => 'Product Information Update Done Successfully',
          'alert-type' => 'success'
        );
        return back()->with($notification);

      }
      else{
        Product::find($request->id)->update([
          'category_id' => $request->category_id,
          'subcategory_id' => $request->subcategory_id,
          'product_name' => $request->product_name,
          'product_slug' => str_replace('', '-', Str::lower($request->product_name)) . '-' . rand(1000000, 99999999),
          'brand_id' => $request->brand_id,
          'product_price' => $request->product_price,
          'product_discount' => $request->product_discount,
          'after_product_discount' => ($request->product_price - ($request->product_price * $request->product_discount) / 100),
          'short_description' => $request->short_description,
          'long_description' => $request->long_description,
          'updated_at' => now(),

    ]);
    $notification = array(
      'message' => 'Product Information Update Done Successfully',
      'alert-type' => 'success'
    );
    return back()->with($notification);

      }
    }

  }
}
