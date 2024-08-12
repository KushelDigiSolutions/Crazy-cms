<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use DB;
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
    public function pagesix(Request $request)
    {
        return view('frontend/pagesix');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        //  echo '<pre>'; print_r($userId); die;
       
    //    dd($request);
        $protocol = $request->input('user_protocol');
        $host = $request->input('user_host');
        $port = $request->input('user_port');
        $user = $request->input('user_name');
        $password = $request->input('user_password');
        $url = $request->input('url_path');
        $data = array(
            "protocol" => $protocol,
            "host" => $host,
            "port" => $port,     
            "user"=> $user,
            "password"=> bcrypt($password),
            "url" => $url,
            "user_id" => $userId,
            "updated_at" => now()
            
        );
        DB::table('my_sites')->insert($data);
        return view('frontend/pagefour')->with('success','User created successfully.');
    }
    


}
