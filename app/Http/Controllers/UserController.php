<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use DB;

class UserController extends Controller
{
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
        return view('addmysites');
    }

    // public function storeAdd(Request $request)
    // {
    //     $request->validate([
    //         'user_protocol' => 'required|string|max:255',
    //         'user_host' => 'required|string|max:255|min:6',
    //         'user_port' => 'required|string|max:255|min:6',
    //         'user_name' => 'required|email',
    //         'user_password' => 'required|string|max:255|min:6',
    //         'url_path' => 'required|url',
    //     ]);
    //     $userId = Auth::id();
    //     $protocol = $request->input('user_protocol');
    //     $host = $request->input('user_host');
    //     $port = $request->input('user_host');
    //     $user = $request->input('user_name');
    //     $password = $request->input('user_password');
    //     $url = $request->input('url_path');
    //     $data = array(
    //         "protocol" => $protocol,
    //         "host" => $host,
    //         "port" => $port,     
    //         "user"=> $user,
    //         "password"=> bcrypt($password),
    //         "url" => $url,
    //         "user_id" => $userId,
    //         "updated_at" => now() 
    //     );
    //     DB::table('my_sites')->insert($data);
    //     return view('admin.addmysites')->with('success', 'User created successfully.');
    // }

    public function mySite()
    {
        $userId = Auth::id();
        $results = DB::table('my_sites')
            ->join('users', 'my_sites.user_id', '=', 'users.id')
            ->select('my_sites.*', 'users.name') 
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
            'password' => 'required|string|min:8',
            'plan' => 'required|integer|exists:subscriptions,id',
        ]);
        dd($validator);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        // Check if user already exists
        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            if ($user->payment_done) {
                return response()->json(['success' => false, 'exists' => true]);
            }

            // Get the plan price and id
            $subscription = Subscription::find($request->input('plan'));

            // Return the plan price and user id for PayPal
            return response()->json([
                'success' => true,
                'paypal_url' => $this->getPayPalUrl($subscription->price, $user->id),
                'price' => $subscription->price,
                'user_id' => $user->id,
                'user_type' => 3
            ]);
        }

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Get the plan price
        $subscription = Subscription::find($request->input('plan'));

        // Return the plan price and user id for PayPal
        return response()->json([
            'success' => true,
            'paypal_url' => $this->getPayPalUrl($subscription->price, $user->id),
            'price' => $subscription->price,
            'user_id' => $user->id
        ]);
    }

    private function getPayPalUrl($price, $userId)
    {
        // Generate the PayPal payment URL with the price and userId
        // You will need to implement this based on your PayPal integration
        // For example:
        return 'https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=YOUR_PAYPAL_EMAIL&amount=' . $price . '&currency_code=USD&item_name=Subscription&custom=' . $userId;
    }
}