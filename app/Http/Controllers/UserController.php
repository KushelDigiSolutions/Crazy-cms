<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MySite;
use App\Models\History;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\Services\FTPService;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
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
    
// Author Dileep 31-09-24

    public function block($encryptedId)
    {
        $id = decrypt($encryptedId);
    
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => DB::raw('IF(status = 0, 1, 0)')]);
    
        return redirect()->route('admin.user.index')->with('success', 'User status updated successfully.');
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

//     public function customer(){
//         $data = User::where('user_type',3)->get();
       
//       return view('admin.enquiry.customer',compact('data')); 
//   }

    public function customer()
    {
        
        $data = DB::table('my_sites')
            ->join('users', 'my_sites.user_id', '=', 'users.id')
            ->select(
                'my_sites.*',           
                'users.name as user_name',
                'users.email as user_email', 
                'my_sites.id',          
                'my_sites.protocol',    
                'my_sites.host',        
                'my_sites.port',        
                'my_sites.url'          
            )
            ->where('my_sites.payment_id', '!=', 'NULL')
            ->orWhere('my_sites.user_id', '=', 3)
            ->get();
            // echo '<pre>'; print_r($data); die;
        return view('admin.enquiry.customer',compact('data'));
    }
   
       public function delete($id)
    {
        $decryptedId = decrypt($id);
        $deleted = MySite::where('id', $decryptedId)->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the user.');
        }
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

    public function editsite(Request $request,$variable,$id)
    {
        $data = MySite::where('id',$id)->where('user_id',Auth::id())->first();
        
        
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
            if(!empty($request->query('history_id'))){
                $lastHistory = History::where('id',$request->query('history_id'))
                              ->where('my_site_id', $id)
                              ->where('user_id', Auth::id())
                              ->latest('created_at')
                              ->first();
              
                $htmlContent = json_decode($lastHistory->content,true);
           
            }else{
                
                $htmlContent = $this->ftpService->getFileContent($page,$data->url);
            }
            $saveData["mysite_id"] =$id;
            $saveData["user_id"] =Auth::id();
            $saveData["pagename"] =$page;
            $saveData["content"] =json_encode($htmlContent);
            $saved = $this->saveHistory($saveData);
            $histories = $this->getHistory($id,Auth::id(),$page);
        
             // Pass the content to the view
             return view('admin.user.editsite', ['htmlContent' => $htmlContent["html_content"],'seo'=>$htmlContent["meta_data"],'files'=>$files,'filename'=>$files[0],'variable'=>$variable,'subs_id'=>$data->subscription_id,'pagename'=>$page,'histories'=>$histories,'site_id'=>$id]);
        } else {
            return response()->json([
                'error' => 'Website not downloaded'
            ], 404);
        }
    }


    public function saveHistory($request)
    {
        $mysiteId = $request["mysite_id"];
        $userId = $request["user_id"];
        $pagename = $request["pagename"];
        $content = $request["content"];
        
        // Get the last created history record for the same my_site_id and user_id
        $lastHistory = History::where('my_site_id', $mysiteId)
                              ->where('user_id', $userId)
                              ->latest('created_at')
                              ->first();
        
        $canSave = true;
        
        // Check if the last history record was created within the last 10 seconds
        if ($lastHistory) {
            $createdAt = $lastHistory->created_at;
            $canSave = Carbon::now()->diffInSeconds($createdAt) > 10;
        }
        
        if ($canSave) {
            // Insert new history record
            History::create([
                'my_site_id' => $mysiteId,
                'user_id' => $userId,
                'pagename' => $pagename,
                'content' => $content,
            ]);
        
            // Limit history records to 10
            $historyCount = History::where('my_site_id', $mysiteId)
                                   ->where('user_id', $userId)
                                   ->count();
        
            if ($historyCount > 10) {
                $oldestHistory = History::where('my_site_id', $mysiteId)
                                        ->where('user_id', $userId)
                                        ->oldest()
                                        ->first();
        
                $oldestHistory->delete();
            }
        
            return response()->json(['message' => 'History saved successfully']);
        }
        
        return response()->json(['message' => 'History was not saved due to recent activity'], 429);        
    }

    public function getHistory($mysiteId, $userId, $pagename)
    {
        $history = History::where('my_site_id', $mysiteId)
                        ->where('user_id', $userId)
                        ->where('pagename', $pagename)
                        ->get();
    
        return $history->map(function ($record) {
            // Format created_at as 'Y-m-d H:i:s'
            $formattedDate = Carbon::parse($record->created_at)->format('Y-m-d-H:i');
    
            return [
                'id' => $record->id,
                'name' => $record->pagename . '-' . $formattedDate, // pagename-created_date_with_time
            ];
        });
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

    public function createWebsite(Request $request){
        $request->validate([
            'project_name' => 'required|string|max:255',
            'user_url' => 'required'
        ]);
        $projectname = $request->input('project_name');
        $url = $request->input('user_url');
        session(['my_sites_create' => ["projectname"=>$projectname,"url"=>$url]]);
        return redirect()->route('check.ftp');
    }

    public function mySite()
    {
        $oneYearAgo = now()->subYear();
        $userId = Auth::id();
        $results = DB::table('my_sites')
            ->join('users', 'my_sites.user_id', '=', 'users.id')
            ->select(
                'my_sites.*',           
                'users.name as user_name', 
                'my_sites.id',          
                'my_sites.protocol',    
                'my_sites.host',        
                'my_sites.port',        
                'my_sites.url'          
            )
            ->where(function($query) use ($userId) {
                $query->whereNotNull('my_sites.user_id')
                      ->orWhere('my_sites.user_id', '=', $userId);
            })

            ->get();
     $data = DB::table('my_sites')
     ->join('users', 'my_sites.user_id', '=', 'users.id')
     ->select(
         'my_sites.*',           
         'users.name as user_name', 
         'my_sites.id',          
         'my_sites.protocol',    
         'my_sites.host',        
         'my_sites.port',        
         'my_sites.url', 
         'my_sites.created_at'         
     )
    // ->where('user_id', $userId)

    ->where(function($query) use ($userId) {
        $query->whereNotNull('my_sites.user_id')
              ->where('my_sites.user_id', '=', $userId);
    })
    ->whereNull('my_sites.deleted_at') // Correctly filter out soft-deleted records

    ->get();
    //  echo '<pre>'; print_r($data); die;
        return view('mysites', compact('results','data'));
    }

public function mySite270824()
    {
        $userId = Auth::id();
        $results = DB::table('my_sites')
            ->join('users', 'my_sites.user_id', '=', 'users.id')
            ->select(
                'my_sites.*',           
                'users.name as user_name', 
                'my_sites.id',          
                'my_sites.protocol',    
                'my_sites.host',        
                'my_sites.port',        
                'my_sites.url'          
            )
            ->where(function($query) use ($userId) {
                $query->whereNotNull('my_sites.user_id')
                      ->orWhere('my_sites.user_id', '=', $userId);
            })
            ->get();
     $data = DB::table('my_sites')
     ->join('users', 'my_sites.user_id', '=', 'users.id')
     ->select(
         'my_sites.*',           
         'users.name as user_name', 
         'my_sites.id',          
         'my_sites.protocol',    
         'my_sites.host',        
         'my_sites.port',        
         'my_sites.url'          
     )
    ->where('user_id', $userId)

    ->get();
    
        return view('mysites', compact('results','data'));
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
    
       
        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

  
        $validFtpSiteData = session('validFtpSiteData');

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
    
    public function customerSiteRegister(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'plan' => 'required|integer|exists:subscriptions,id',
        ]);
          
        $projectName = session('my_sites_create')['projectname'];

  
        $validFtpSiteData = session('validFtpSiteData');

        $host = $validFtpSiteData['host'];
        $username = $validFtpSiteData['username'];
        $password = $validFtpSiteData['password'];
        $directory = $validFtpSiteData['directory'];
        $url = $validFtpSiteData['url'];
        $protocol = $validFtpSiteData['protocol'];
       
        $mysite = MySite::create([
            'name' => $projectName, // Assuming the host is used as the name
            'protocol' => $protocol,
            'host' => $host,
            'url' => $url,
            'user' => $username,
            'password' => $password,
            'location' => $directory,
            'status' => 0, // or any default status you want
            'user_id' => Auth::id(),
            'subscription_id' => $request->input('plan'),
        ]);
        session(['validUserCreate' => ['id'=>Auth::id(),'plan'=>$request->input('plan'),'my_site'=>$mysite->id]]);
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