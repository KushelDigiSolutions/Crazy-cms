<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function preview(Request $request)
    {
        return view('frontend/preview');
    }
    public function editor(Request $request)
    {
        return view('frontend/editor');
    }
}
