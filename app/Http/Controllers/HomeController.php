<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function preview($variable)
    {
        // Define the path to your HTML file in the public folder
        $filePath = public_path('previews/'.$variable.'/index.html');
        // Check if the file exists
        if (file_exists($filePath)) {
            // Get the content of the file
            $htmlContent = file_get_contents($filePath);

             // Pass the content to the view
             return view('frontend/preview', ['htmlContent' => $htmlContent]);
        } else {
            return response()->json([
                'error' => 'File not found.'
            ], 404);
        }
    }
    public function editor(Request $request)
    {
        return view('frontend/editor');
    }
    public function editor1(Request $request)
    {
        return view('frontend/editor1');
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
