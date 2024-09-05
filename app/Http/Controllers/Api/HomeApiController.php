<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use App\Models\Enquiry;
use phpseclib3\Net\SFTP;
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
        $surl = $this->checkUrlHasScheme($url);
      
        if($surl == false){
            return redirect()->back()->withErrors(['url' => 'Invalid URL provided.']);
        }else{
            $url = $surl;
        }     
        
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
            $folderPath = $publicPath.'/previews/'.$cleaned_url;
          
            try {
                $this->deleteDirectory($folderPath);
               // echo "Directory successfully deleted.";
            } catch (Exception $e) {
                //echo "An error occurred: " . $e->getMessage();
            }
            // Path to the Python script
            $scriptPath = $publicPath.'/web.py '.$url.' '.$folderPath;
            
            $output = shell_exec("python3 " . $scriptPath);
            // Return the output
            return response()->json(['message' => 'URL created successfully','url'=>$cleaned_url], 201);
        } catch (\Exception $e) {
            return response()->json(['message' =>  'An error occurred: ' . $e->getMessage(),'url'=>$cleaned_url], 400);
          //  return redirect()->back()->withErrors(['url' => 'An error occurred: ' . $e->getMessage()]);
        }
        
    }

    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return false;
        }
    
        if (is_file($dir)) {
            // Delete the file
            return unlink($dir);
        }
    
        // Directory case
        foreach (scandir($dir) as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }
    
            $path = $dir . DIRECTORY_SEPARATOR . $item;
            if (is_dir($path)) {
                deleteDirectory($path);
            } else {
                unlink($path);
            }
        }
    
        // Remove the now-empty directory
        return rmdir($dir);
    }
    

    public function checkAndAddScheme($url)
    {
        // Remove any existing scheme (if the URL was sent with one)
        $url = preg_replace("/^https?:\/\//", "", $url);

        // Try with HTTPS first
        $httpsUrl = "https://" . $url;
        $httpUrl = "http://" . $url;

        // Use get_headers to check for a successful response
        $headersHttps = @get_headers($httpsUrl);
        if ($headersHttps && strpos($headersHttps[0], '200') !== false) {
            return $httpsUrl;
        }

        // If HTTPS fails, check with HTTP
        $headersHttp = @get_headers($httpUrl);
        if ($headersHttp && strpos($headersHttp[0], '200') !== false) {
            return $httpUrl;
        }

        // If both fail, return null or an error message
        return false;
    }

    public function checkUrlHasScheme($url)
    {
        // Parse the URL to get its components
        $parsedUrl = parse_url($url);

        // Check if the 'scheme' is set and is either 'http' or 'https'
        if (isset($parsedUrl['scheme']) && in_array($parsedUrl['scheme'], ['http', 'https'])) {
            return $url;
        } else {
            return $this->checkAndAddScheme($url);
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

    public function analyzeFtp(Request $request)
    {

        // Validate incoming request data
        $validatedData = $request->validate([
            'host' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'directory' => 'required|string',
            'url' => 'required|string',
            'protocol' => 'required|string|in:ftp,sftp',
        ]);

        // Extract request data
        $host = $request->input('host');
        $username = $request->input('username');
        $password = $request->input('password');
        $directory = $request->input('directory');
        $url        = $request->input('url');
        $protocol = $request->input('protocol');

        // Call the function to analyze and send the data
        $response = $this->analyzeAndPostData($host, $username, $password, $directory, $protocol, '');
        if($response["analysis_result"]){
            /*  if(!empty(Auth::id())){
                dd(Auth::id());
            } */
            session(['validFtpSite' => $host]);
            session(['validFtpSiteData' => $validatedData]);
        }else{
            session(['validFtpSite' => ""]);
        }
        return response()->json($response);
    }



    function analyzeAndPostData($host, $username, $password, $directory, $protocol, $postUrl)
    {
        $connection = null;
        $indexFile = null;
        $content = null;
    
        switch (strtolower($protocol)) {
            case 'ftp':
                // Connect via FTP
                $connection = ftp_connect($host);
                if (!$connection || !ftp_login($connection, $username, $password)) {
                    return 'FTP Connection Failed!';
                }
    
                ftp_chdir($connection, $directory);
                $files = ftp_nlist($connection, ".");
                
                foreach ($files as $file) {
                    if (stripos($file, 'index.php') !== false || stripos($file, 'index.html') !== false) {
                        $indexFile = $file;
                        break;
                    }
                }
    
                if (!$indexFile) {
                    ftp_close($connection);
                    return 'Index file not found!';
                }
    
                $localFile = tempnam(sys_get_temp_dir(), 'ftp');
                ftp_get($connection, $localFile, $indexFile, FTP_BINARY);
                $content = file_get_contents($localFile);
                unlink($localFile);
    
                ftp_close($connection);
                break;
    
            case 'sftp':
                // Connect via SFTP
                $sftp = new SFTP($host);
                if (!$sftp->login($username, $password)) {
                    return 'SFTP Login Failed!';
                }
    
                $sftp->chdir($directory);
                $files = $sftp->nlist();
                foreach ($files as $file) {
                    if (stripos($file, 'index.php') !== false || stripos($file, 'index.html') !== false) {
                        $indexFile = $file;
                        break;
                    }
                }
    
                if (!$indexFile) {
                    return 'Index file not found!';
                }
    
                $content = $sftp->get($indexFile);
                break;
    
            default:
                return 'Unsupported Protocol!';
        }
    
        // Analyze content to check HTML ratio
        $htmlTags = substr_count($content, '<');
        $phpTags = substr_count($content, '<?php');
        $totalTags = $htmlTags + $phpTags;
      
        if ($totalTags == 0) {
            return 'No HTML or PHP tags found in the index file!';
        }
    
        $htmlRatio = ($htmlTags / $totalTags) * 100;
        $analysisResult = $htmlRatio > 80 ? 1 : 0;
    
        // Prepare data to POST
        $postData = [
            /* 'host' => $host,
            'directory' => $directory,
            'protocol' => $protocol, */
            'analysis_result' => $analysisResult,
        ];
        return $postData;
    }

}
