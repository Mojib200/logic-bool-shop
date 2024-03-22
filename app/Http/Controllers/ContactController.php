<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   function contact_info(){
    $contact_info=Contact::all()->first();
    return view('layouts\admin\contact',['contact_info'=>$contact_info]);
   }
   function c_information(Request $request){
    if(Contact::all()=='[]'){
        Contact::insert([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'facebook'=>$request->facebook,
            'youtube'=>$request->youtube,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'created_at'=>now(),


        ]);
        $notification = array(
            'message' => 'Contact Information Insert Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    else{
        Contact::all()->first()->update([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'facebook'=>$request->facebook,
            'youtube'=>$request->youtube,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'updated_at'=>now(),

        ]);
        $notification = array(
            'message' => 'Contact Information Update Done Successfully ',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }
   

   
   }
}
