<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Enquiry;
use App\Models\Subscription;
use Session;
use DB;
class HomeController extends Controller
{
    public function preview($variable)
    {

        // Define the path to your HTML file in the public folder
        $filePath = public_path('previews/'.$variable.'/index.html');
        $url = url('previews/'.$variable.'/index.html');
        // Check if the file exists
        if (file_exists($filePath)) {
            // Get the content of the file
            $htmlContent = file_get_contents($filePath);

             // Pass the content to the view
             return view('frontend/preview', ['htmlContent' => $htmlContent,'variable'=>$variable,'webUrl'=>$url]);
        } else {
            return response()->json([
                'error' => 'File not found.'
            ], 404);
        }
    }

   

    public function error(Request $request)
    {

        return view('frontend/error');
    }

    
    public function checkFtp(Request $request)
    {
        $sitename = $request->query('site');
        $site = Enquiry::where('name', $sitename)->first('url');
        $siteurl = "";
        if(!empty($site->url)){
        $siteurl = $site->url;}else{
            if(!empty(session('my_sites_create')['url'])){
                $siteurl = session('my_sites_create')['url'];
            }
        }
        return view('frontend.check-ftp',compact('siteurl'));
    }


    public function signup(Request $request)
    {
        if(session('validFtpSite') == ""){
            dd("redirecting 404");
        }
        $subscriptions = Subscription::orderBy('id','ASC')->get();
        return view('frontend/signup',compact('subscriptions'));
    }

    public function editor(Request $request)
    {
        return view('frontend/editor');
    }
    public function editor1(Request $request)
    {
        return view('frontend/editor1');
    }

    // public function pageone(Request $request)
    // {
    //     return view('frontend/pageone');
    // }

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
 
    public function pagesix(Request $request)
    {
        return view('frontend/pagesix');
    }

    public function pageseven(Request $request)
    {
        return view('frontend/pageseven');
    }
    public function pageeight(Request $request)
    {
        return view('frontend/pageeight');
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_protocol' => 'required|string|max:255',
            'user_host' => 'required|string|max:255|min:6',
            'user_port' => 'required|string',
            'user_name' => 'required|string',
            'user_password' => 'required|string|max:255|min:6',
            'url_path' => 'required|string',
        ]);

        $userId = Auth::id();
        //  echo '<pre>'; print_r($userId); die;
       
    //    dd($request);
        $protocol = $request->input('user_protocol');
        $host = $request->input('user_host');
        $port = $request->input('user_host');
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
            "updated_at" => now(),
            "user_type" => 3 
        );
        DB::table('my_sites')->insert($data);
        return view('frontend/pagefour')->with('success','User created successfully.');
    }

    public function storeAdd(Request $request)
    {
       
        $request->validate([
            'user_protocol' => 'required|string|max:255',
            'user_host' => 'required|string|max:255|min:6',
            'user_port' => 'required|string',
            'user_name' => 'required|email',
            'user_password' => 'required|string|max:255|min:6',
            'url_path' => 'required',
        ]);


        $userId = Auth::id();
        echo $userId; die;
        $protocol = $request->input('user_protocol');
        $host = $request->input('user_host');
        $port = $request->input('user_host');
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
        return view('admin/addmysites')->with('success','User created successfully.');
    }

      public function successPage()
    {
        return view('success');
    }

    public function failurePage()
    {
        return view('failure');
    }
    public function knowledgeBase(Request $request)
    {
        // Retrieve optional GET parameters with default values
        $searchText = $request->query('search', '');
        $limit = $request->query('limit', null);
        $offset = $request->query('offset', null);
        $categoryId = $request->query('category_id', null);

        // Default query for blogs
        $blogs = Blog::query();

        // Apply filters only when parameters are provided
        if ($searchText) {
            $blogs->where('name', 'LIKE', "%$searchText%")->orWhere('description', 'LIKE', "%$searchText%");
        }

        if ($categoryId) {
            $blogs->where('category_id', $categoryId);
        }

        // Apply pagination if limit and offset are provided
        if ($offset) {
            $blogs->skip($offset);
        }

        if ($limit) {
            $blogs->take($limit);
        }

        // Execute the query and get results
        $blogs = $blogs->orderBy('id', 'ASC')->get();

        // Always fetch blog categories
        $blogCategory = BlogCategory::orderBy('id', 'ASC')->get();
        
        // Return the view
        return view('frontend/knowledge_base', compact('blogs', 'blogCategory'));
    }
    public function knowledgeBaseDetail(Request $request,$id)
    {
        $blog = Blog::findOrFail($id);
        $recents =  Blog::orderBy('id','ASC')->limit(5)->get();
        return view('frontend/knowledge-base-details',compact('blog','recents'));
    }
}
