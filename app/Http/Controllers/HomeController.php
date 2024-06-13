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

    public function pageone(Request $request)
    {
        return view('frontend/pageone');
    }

    public function pagetwo(Request $request)
    {
        return view('frontend/pagetwo');
    }

    public function pagethree(Request $request)
    {
        return view('frontend/pagethree');
    }

    public function pagefour(Request $request)
    {
        return view('frontend/pagefour');
    }
    public function pagefive(Request $request)
    {
        return view('frontend/pagefive');
    }


}
