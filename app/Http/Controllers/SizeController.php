<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    function size_page()
    {
        $size_infos = Size::all();
        return view(
            'layouts.admin.product.size',
            [
                'size_infos' => $size_infos,
            ]
        );
    }
    function size_info(Request $request)
    {
        Size::insert([
            'size_name' => $request->size_name,
            'created_at' => now(),
        ]);
        $notification = array(
            'message' => 'Size Insert Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function edit_size_infos($id)
    {
        $this_size_info = Size::find($id);
        return view(
            'layouts.admin.product.edit_size',
            [
                'this_size_info' => $this_size_info,
            ]
        );
    }
    function delete_size_infos($id)
    {
        Size::find($id)->delete();

        $notification = array(
            'message' => 'Size Delete Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function update_size_info(Request $request)
    {

        Size::find($request->id)->update([
            'size_name' => $request->size_name,
            'updated_at' => now(),
        ]);
        $notification = array(
            'message' => 'Size Update Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
