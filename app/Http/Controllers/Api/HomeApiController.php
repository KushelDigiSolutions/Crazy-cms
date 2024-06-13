<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use Illuminate\Support\Facades\Validator;

class HomeApiController extends Controller
{
    /**
     * Update the user's password.
     */
    public function setWebUrl(Request $request)
    {
        // Validate the request data manually to capture errors
        $validator = Validator::make($request->all(), [
            'url' => 'required|url'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Store the URL in the session with the name 'webUrlHome'
        $validatedData = $validator->validated();
  
        session(['webUrlHome' => $validatedData['url']]);

        Session()->put('progress', '5%');

        return response()->json(['message' => 'URL set successfully', 'url' => session('webUrlHome')], 200);
    
    }

    public function downloadWeb(Request $request)
    {
        $url = "https://kusheldigi.com/";
       
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            return redirect()->back()->withErrors(['url' => 'Invalid URL provided.']);
        }

        try {
            $response = Http::get($url);

            if ($response->successful()) {
                $htmlContent = $response->body();
                echo $htmlContent;exit;
                $filename = 'website.html';

                return response($htmlContent)
                    ->header('Content-Type', 'text/html')
                    ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
            } else {
                return redirect()->back()->withErrors(['url' => 'Failed to retrieve the website content.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['url' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
