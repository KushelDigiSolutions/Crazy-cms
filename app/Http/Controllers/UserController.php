<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
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
}