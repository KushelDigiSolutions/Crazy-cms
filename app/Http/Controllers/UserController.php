<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MySite;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\Services\FTPService;
use Illuminate\Support\Facades\Http;
use DB;

class UserController extends Controller
{
    protected $ftpService;
    public function __construct()
    {
        $roles = Role::all();
        view()->share('roles',$roles);
    }
    public function index()
    {
        $data = User::orderBy('id','DESC')->get();
        return view('admin.user.index', compact('data'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:'.User::class,
            'password' => 'required|max:255|min:6',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect()->route('admin.user.index')->with('success','User created successfully.');
    }
    public function edit($id)
    {
        $user = User::where('id',decrypt($id))->first();
        return view('admin.user.edit',compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'string']
        ]); 
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->assignRole($request->role);
        return redirect()->route('admin.user.index')->with('success','User updated successfully.');
    }
    public function destroy($id)
    {
        User::where('id',decrypt($id))->delete();
        return redirect()->back()->with('success','User deleted successfully.');
    }

    public function customer(){
        $data = User::where('user_type',3)->get();
       
       return view('admin.enquiry.customer',compact('data')); 
   }

    public function loginAsUser($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME); // or any route you want to redirect to
    }

    public function userLogin(Request $request)
    {
        try {
            if (auth()->id() != 1) {
                return redirect(route('dashboard'));
            }
            Auth::logout();
            Session::flush();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::loginUsingId($request->user_id);
            return redirect()->route('admin.user.dashboard');
        } catch (\Throwable $e) {
            return back();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logs the user out

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate the session to avoid session fixation attacks
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect the user to the home page or login page
    }

    public function addMySite()
    {
        // return view('addmysites');
        // return view('page1');
        return view('frontend/pageone');
    }

    public function editsite(Request $request,$variable)
    {

        $data = MySite::where('user_id',Auth::id())->where('name',$variable)->first();
        
        if(empty($data)){
            return response()->json([
                'error' => 'Website not available'
            ], 404);
            exit;
        }
        
        $this->ftpService = new FTPService(
            $data->protocol,
            $data->port,
            $data->host,
            $data->user,
            $data->password,
            $data->location
        );
        $files = $this->ftpService->listFiles();
        
        if (!empty($files)) {
            // Get the content of the file
            //dd($files);
            $page = !empty($request->query('page')) ? $request->query('page') : $files[0];
            $htmlContent = $this->ftpService->getFileContent($page,$data->url);
//dd($htmlContent);
             // Pass the content to the view
             return view('admin.user.editsite', ['htmlContent' => $htmlContent["html_content"],'seo'=>$htmlContent["meta_data"],'files'=>$files,'filename'=>$files[0],'variable'=>$variable,'subs_id'=>$data->subscription_id]);
        } else {
            return response()->json([
                'error' => 'Website not downloaded'
            ], 404);
        }
    }

    public function storeAdd(Request $request)
    {
        $request->validate([
            'user_protocol' => 'required|string|max:255',
            'user_host' => 'required|string|max:255|min:6',
            'user_port' => 'required',
            'user_name' => 'required|email',
            'user_password' => 'required|string|max:255|min:6',
            'url_path' => 'required',
        ]);
        $userId = Auth::id();
        // echo $userId; die; 
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
        return view('addmysites')->with('success', 'User created successfully.');
    }
    
    
        public function addSite(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'user_url' => 'required'
        ]);
        $userId = Auth::id();
        $projectname = $request->input('project_name');
        $url = $request->input('user_url');
        $data = array(
            "name" => $projectname,
            "url" => $url,
            "user_id" => $userId,
            "updated_at" => now() 
        );
        DB::table('my_sites')->insert($data);
        $lastId = DB::table('my_sites')->latest('id')->value('id');
        // dd($lastId);
        session(['my_sites_lastid' => $lastId]);
        return redirect()->route('check.ftp');
        // return view('admin.mysites')->with('success', 'Sites created successfully.');

    }

    public function mySite()
    {
        $userId = Auth::id();
        $results = DB::table('my_sites')
            ->join('users', 'my_sites.user_id', '=', 'users.id')
            ->select('my_sites.*', 'users.name as uname') 
            ->where('my_sites.user_id', $userId)
            ->get();
        // return redirect()->route('admin.user.mysites',compact('results'));
        return view('mysites', compact('results'));
    }

    
    public function customerRegister(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|string|min:8',
            'password' => 'min:8|required_with:confirmPassword|same:confirmPassword',
            'plan' => 'required|integer|exists:subscriptions,id',
        ]);
          
        if ($validator->fails()) {

            $errors = $validator->errors();

            $errorMessages = [];

            foreach ($errors->messages() as $field => $messages) {
                foreach ($messages as $message) {
                    $errorMessages[] = $message;
                }
            }

            $commonErrorString = "Sorry, " . implode(', and also ', $errorMessages);


            return response()->json(['success' => false, 'errors' => $commonErrorString]);
        }

        // Check if user already exists
        $user = User::where('email', $request->input('email'))->first();
    
       
    
        /* if ($user) {
            dd($user);
            if (!$user->payment_done) {
                return response()->json(['success' => false, 'exists' => true]);
            }

            // Get the plan price and id
            $subscription = Subscription::find($request->input('plan'));
            dd($subscription);
            // Return the plan price and user id for PayPal
            return response()->json([
                'success' => true,
                'paypal_url' => $this->getPayPalUrl($subscription->price, $user->id),
                'price' => $subscription->price,
                'user_id' => $user->id,
                'user_type' => 3
            ]);
        } */

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

  
        $validFtpSiteData = session('validFtpSiteData');

        // Return the plan price and user id for PayPal
        /* return response()->json([
            'success' => true,
            'price' => $subscription->price,
            'user_id' => $user->id
        ]); */
        // Extract request data
        $host = $validFtpSiteData['host'];
        $username = $validFtpSiteData['username'];
        $password = $validFtpSiteData['password'];
        $directory = $validFtpSiteData['directory'];
        $url = $validFtpSiteData['url'];
        $protocol = $validFtpSiteData['protocol'];
       
        $mysite = MySite::create([
            'name' => $this->__getWebsiteName($url), // Assuming the host is used as the name
            'protocol' => $protocol,
            'host' => $host,
            'url' => $url,
            'user' => $username,
            'password' => $password,
            'location' => $directory,
            'status' => 0, // or any default status you want
            'user_id' => $user->id,
            'subscription_id' => $request->input('plan'),
        ]);
        session(['validUserCreate' => ['id'=>$user->id,'plan'=>$request->input('plan'),'my_site'=>$mysite->id]]);
        return response()->json(['success' => true, 'message' => "congratulations"]);
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
}