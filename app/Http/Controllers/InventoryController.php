<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function inventory_product_infos($id)
    {
        $product=Product::find($id);
        $color_info= Color::All();
        $size_info= Size::All();
        $inventory_info= Inventory::where('product_id',$id)->get();
        
      return view('layouts.admin.product.inventrory',
      [
        'product'=>$product,
        'size_info'=>$size_info,
        'color_info'=>$color_info,
        'inventory_info'=>$inventory_info,
      ]
    );
    }
    function inventory_info(Request $request)
    {
        if(Inventory::where('product_id', $request->product_id)->where( 'color_id', $request->color_id)->where(  'size_id', $request->size_id)->exists()){
            Inventory::where(  'product_id', $request->product_id)->where(  'color_id', $request->color_id)->where(  'size_id', $request->size_id)->increment('quantity', $request->quantity);
            $notification = array(
                'message' => 'WOW finally Product Quantity Increment  done !',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        }
        else {
            Inventory::insert([
                'product_id'=>$request->product_id,
                'size_id'=>$request->size_id,
                'color_id'=>$request->color_id,
                'quantity'=>$request->quantity,
                'created_at'=>now(),
    
            ]);
            $notification = array(
                'message' => 'Inventory Information Insert Done Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
         
        }
      
    }
    function delete_inventory_info($id)
    {
        Inventory::find($id)->delete();

        $notification = array(
            'message' => 'Delete Inventory done !',
            'alert-type' => 'success'
        );
        return back()->with($notification);
        
    }
    function edit_inventory_info($id)
    {
        $color_info= Color::All();
        $size_info= Size::All();
        $inventory_infos=Inventory::find($id);
        return view('layouts.admin.product.edit_inventory',
        [
            'color_info'=>$color_info,
            'size_info'=>$size_info,
            'inventory_infos'=>$inventory_infos,

        ]);

    }
    function edit_inventory(Request $request)
    {
        if(Inventory::where('product_id', $request->product_id)->where( 'color_id', $request->color_id)->where(  'size_id', $request->size_id)->exists()){
            Inventory::where(  'product_id', $request->product_id)->where(  'color_id', $request->color_id)->where(  'size_id', $request->size_id)->increment('quantity', $request->quantity);
            $notification = array(
                'message' => 'WOW finally Product Quantity Increment  done !',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        }
        else {
            Inventory::find($request->id)->update([
                'product_id'=>$request->product_id,
                'size_id'=>$request->size_id,
                'color_id'=>$request->color_id,
                'quantity'=>$request->quantity,
                'updated_at'=>now(),
    
            ]);
            $notification = array(
                'message' => 'Inventory Information Update Done Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
         
        }
      
    }
}
