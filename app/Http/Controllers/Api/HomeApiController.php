<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Storage;
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
        $url = $request->all()["url"];
        
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            return redirect()->back()->withErrors(['url' => 'Invalid URL provided.']);
        }
        $name = $this->__getWebsiteName($url);
        // Replace all occurrences of the substrings with an empty string
        $cleaned_url = preg_replace('/www|https:\/\/|http:\/\/|\\/|\./', '', $url);
      
        // Check if the URL exists in the enquiries table
        $exists = Enquiry::where('url', $url)->exists();

        // Return the result
        if (!$exists) {

             // Create a new enquiry record
             $enquiry = new Enquiry();
             $enquiry->url = $url;
             $enquiry->name = $name;
             $enquiry->location = $cleaned_url;
             // Set other fields as needed
             $enquiry->save();
        }    

        try {
            $publicPath = public_path();
            // Path to the Python script
            $scriptPath = $publicPath.'/web.py '.$url.' '.$publicPath.'/previews/'.$cleaned_url;

            // Execute the Python script
            $output = shell_exec("python3 " . $scriptPath);
            //dd($scriptPath );
            // Return the output
            return response()->json(['message' => 'URL created successfully','url'=>$cleaned_url], 201);
        } catch (\Exception $e) {
            return response()->json(['message' =>  'An error occurred: ' . $e->getMessage(),'url'=>$cleaned_url], 400);
          //  return redirect()->back()->withErrors(['url' => 'An error occurred: ' . $e->getMessage()]);
        }
        
    }
    
    private function __getWebsiteName($url) {
        
        $url = str_replace("www.","",$url);
         // Parse the URL to get the host
        $host = parse_url($url, PHP_URL_HOST);

        // Remove the subdomain (if any) and top-level domain (TLD)
        $parts = explode('.', $host);

        // Join the parts excluding the TLD
        $name = $parts[0];

        // Return the extracted name
        return $name;
    }


function checkHtmlContentInIndex($ftpHost, $ftpUser, $ftpPassword, $directory)
{
    // Establish FTP connection
    $connection = ftp_connect($ftpHost);
    $login = ftp_login($connection, $ftpUser, $ftpPassword);

    if (!$connection || !$login) {
        return 'Connection failed!';
    }

    // Navigate to the directory
    ftp_chdir($connection, $directory);

    // Get the list of files in the directory
    $files = ftp_nlist($connection, ".");
    $indexFile = '';

    // Identify the index file
    foreach ($files as $file) {
        if (stripos($file, 'index.php') !== false || stripos($file, 'index.html') !== false) {
            $indexFile = $file;
            break;
        }
    }

    if (!$indexFile) {
        return 'Index file not found!';
    }

    // Get the content of the index file
    $localFile = storage_path("app/{$indexFile}");
    ftp_get($connection, $localFile, $indexFile, FTP_BINARY);

    $content = file_get_contents($localFile);

    // Analyze content to check HTML ratio
    $htmlTags = substr_count($content, '<');
    $phpTags = substr_count($content, '<?php');

    $totalTags = $htmlTags + $phpTags;

    if ($totalTags == 0) {
        return 'No HTML or PHP tags found in the index file!';
    }

    $htmlRatio = ($htmlTags / $totalTags) * 100;

    ftp_close($connection);

    return $htmlRatio > 80 ? 'More than 80% HTML' : 'Less than 80% HTML';
}

}
