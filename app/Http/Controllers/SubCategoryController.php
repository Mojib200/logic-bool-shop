<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function sub_category_page()
    {
        $category_info=Category::all();
        $sub_category_info=SubCategory::all();
        return view('layouts\admin\sub_category',[
            'category_info'=>$category_info,
            'sub_category_info'=>$sub_category_info,
    ]);
    }
    function sub_category_info(Request $request)
    {
        $sub_category = str_replace('', '-', str::lower($request->sub_category_name)) . '-' . rand(1000000, 99999999);
        $upload_file = $request->sub_category_image;
        $extension = $upload_file->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $new_name = $sub_category . "." . $extension;
        $img = $manager->read($upload_file);
        $img->tojpeg(200)->save(base_path('public/uploads/sub_category/' . $new_name));
        SubCategory::insert([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_image' => $new_name,
            'created_at' => now(),

        ]);
        $notification = array(
            'message' => 'Sub Category Information Insert Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
       
    }
    function delete_sub_category_info($id)
    {
        $sub_category_image = SubCategory::find($id)->sub_category_image;
        $delete_for_sub_category_image = public_path('uploads/sub_category/' . $sub_category_image);
        unlink($delete_for_sub_category_image);
        SubCategory::find($id)->delete();
        $notification = array(
            'message' => 'Sub Category Information Delete Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function edit_sub_category_info($id)
    {
        $category_info=Category::all();
        $this_sub_category_info = SubCategory::find($id);
        return view('layouts\admin\edit_sub_category', [
            'category_info' => $category_info,
            'this_sub_category_info' => $this_sub_category_info,
        ]);
    }
 function sub_update_category_info(Request $request)
    {

        if ($request->sub_category_image != '') {
            $sub_category_image = SubCategory::find($request->id)->sub_category_image;

            $delete_for_sub_category_image = public_path('uploads/sub_category/' . $sub_category_image);
            unlink($delete_for_sub_category_image);

            $sub_category = str_replace('', '-', str::lower($request->sub_category_name)) . '-' . rand(1000000, 99999999);
            $upload_file = $request->sub_category_image;
            $extension = $upload_file->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $new_name =$sub_category . "." . $extension;
            $img = $manager->read($upload_file);
            $img->tojpeg(200)->save(base_path('public/uploads/sub_category/' . $new_name));
            SubCategory::find($request->id)->update([
                'category_id'=>$request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'sub_category_image' => $new_name,
                'updated_at' => now(),

            ]);
            $notification = array(
                'message' => 'Sub_Category Information Update Done Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        else{
            SubCategory::find($request->id)->update([
                'category_id'=>$request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'updated_at' => now(),

            ]);
            $notification = array(
                'message' => 'Sub Category Information Update Done Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        }
    }
    }

