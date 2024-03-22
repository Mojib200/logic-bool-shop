<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function frontend_page()
    {
        return view('layouts\frontend\frontend');
    }
}
