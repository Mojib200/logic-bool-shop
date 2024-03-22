<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    function color_page(){
        $color_infos= Color::All();
        return view('layouts.admin.product.color',
    [
        'color_infos'=>$color_infos,
    ]);
    }
    function color_info(Request $request){

        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>now(),
        ]);
        $notification = array(
            'message' => 'Color Insert Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
       
}
function edit_color_infos($id)
{
    $this_color_info=Color::find($id);
return view('layouts.admin.product.edit_color',
[
    'this_color_info'=>$this_color_info,
]);

}
function delete_color_infos($id)
{
 Color::find($id)->delete();

    $notification = array(
        'message' => 'Color Delete Done Successfully',
        'alert-type' => 'success'
    );
    return back()->with($notification);

}
function update_color_info(Request $request){

    Color::find($request->id)->update([
        'color_name'=>$request->color_name,
        'color_code'=>$request->color_code,
        'updated_at'=>now(),
    ]);
    $notification = array(
        'message' => 'Color Update Done Successfully',
        'alert-type' => 'success'
    );
    return back()->with($notification);
   
}
}
