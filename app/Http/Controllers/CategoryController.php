<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function category_page()
    {
        $category_info = Category::All();
        return view('layouts\admin\category', ['category_info' => $category_info]);
    }
    function category_info(Request $request)
    {
        $category = str_replace('', '-', str::lower($request->category_name)) . '-' . rand(1000000, 99999999);
        $upload_file = $request->category_image;
        $extension = $upload_file->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $new_name = $request->addedby . $category . "." . $extension;
        $img = $manager->read($upload_file);
        $img->tojpeg(200)->save(base_path('public/uploads/category/' . $new_name));
        Category::insert([
            'category_name' => $request->category_name,
            'category_image' => $new_name,
            'addedby' => $request->addedby,
            'created_at' => now(),

        ]);
        $notification = array(
            'message' => 'Category Information Insert Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    function edit_category_info($id)
    {
        $this_category_info = Category::find($id);
        return view('layouts\admin\edit_category', ['this_category_info' => $this_category_info]);
    }
    function update_category_info(Request $request)
    {

        if ($request->category_image != '') {
            $category_image = Category::find($request->id)->category_image;

            $delete_for_category_image = public_path('uploads/category/' . $category_image);
            unlink($delete_for_category_image);

            $category = str_replace('', '-', str::lower($request->category_name)) . '-' . rand(1000000, 99999999);
            $upload_file = $request->category_image;
            $extension = $upload_file->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $new_name = $request->addedby . $category . "." . $extension;
            $img = $manager->read($upload_file);
            $img->tojpeg(200)->save(base_path('public/uploads/category/' . $new_name));
            Category::find($request->id)->update([
                'category_name' => $request->category_name,
                'category_image' => $new_name,
                'addedby' => $request->addedby,
                'updated_at' => now(),

            ]);
            $notification = array(
                'message' => 'Category Information Update Done Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        else{
            Category::find($request->id)->update([
                'category_name' => $request->category_name,
                'addedby' => $request->addedby,
                'updated_at' => now(),

            ]);
            $notification = array(
                'message' => 'Category Information Update Done Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        }
    }
    function delete_category_info($id){
        $category_image = Category::find($id)->category_image;
        $delete_for_category_image = public_path('uploads/category/' . $category_image);
        unlink($delete_for_category_image);
        Category::find($id)->delete();
        $notification = array(
            'message' => 'Category Information Delete Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
