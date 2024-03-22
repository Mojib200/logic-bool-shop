<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function brand_page()
    {
        $brand_infos = Brand::all();
        return view(
            'layouts.admin.product.brand',
            [
                'brand_infos' => $brand_infos,

            ]
        );
    }
    function brand_info(Request $request)
    {
        $brand = str_replace('', '-', str::lower($request->brand_name)) . '-' . rand(1000000, 99999999);
        $upload_file = $request->brand_image;
        $extension = $upload_file->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $new_name = $brand . "." . $extension;
        $img = $manager->read($upload_file);
        $img->tojpeg(200)->save(base_path('public/uploads/brand/' . $new_name));
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $new_name,
            'created_at' => now(),

        ]);
        $notification = array(
            'message' => 'Brand  Information Insert Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function edit_brand_infos($id)
    {
        $this_brand_info = Brand::find($id);
        return view(
            'layouts.admin.product.edit_brand',
            [
                'this_brand_info' => $this_brand_info,
            ]
        );
    }
    function delete_brand_infos($id)
    {
        $brand_image = Brand::find($id)->brand_image;
        $delete_for_brand_image = public_path('uploads/brand/' . $brand_image);
        unlink($delete_for_brand_image);
        Brand::find($id)->delete();

        $notification = array(
            'message' => 'Brand  Delete Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function update_brand_info(Request $request)
    {

        if ($request->brand_image != '') {
            $brand_image = Brand::find($request->id)->brand_image;

            $delete_for_brand_image = public_path('uploads/brand/' . $brand_image);
            unlink($delete_for_brand_image);

            $brand = str_replace('', '-', str::lower($request->brand_name)) . '-' . rand(1000000, 99999999);
            $upload_file = $request->brand_image;
            $extension = $upload_file->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $new_name = $brand . "." . $extension;
            $img = $manager->read($upload_file);
            $img->tojpeg(200)->save(base_path('public/uploads/brand/' . $new_name));
            Brand::find($request->id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $new_name,
                'updated_at' => now(),

            ]);
            $notification = array(
                'message' => 'Brand Information Update Done Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        else{
            Brand::find($request->id)->update([
                'brand_name' => $request->brand_name,
                'updated_at' => now(),

            ]);
            $notification = array(
                'message' => 'Brand Information Update Done Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        }
    }
}
