<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;

class SettingController extends Controller
{

  
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('setting.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'production_secret_key' => 'required|string|max:255',
            'production_secret_password' => 'required|string|max:255|min:6',
            'testing_secret_key' => 'required|string|max:255|min:6',
            'testing_secret_password' => 'required|string|max:255|min:6',
        ]);

        $userId = Auth::id();
        //  echo '<pre>'; print_r($userId); die;
       
    //    dd($request);
        $prsk = $request->input('production_secret_key');
        $psp = $request->input('production_secret_password');
        $tsk = $request->input('testing_secret_key');
        $tss = $request->input('testing_secret_password');
       
        $data = array(
            "production_secret_keys" => $prsk,
            "production_secret_password" => $psp,
            "testing_secret_key" => $tsk,     
            "testing_password_key"=> $tss
        );
        DB::table('settings')->insert($data);
        return Redirect::route('admin.setting.edit')->with('status', 'setting-updated');
    }

     public function store(Request $request)
    {
        $request->validate([
            'production_secret_key' => 'required|string|max:255',
            'production_secret_password' => 'required|string|max:255|min:6',
            'testing_secret_key' => 'required|string|max:255|min:6',
            'testing_secret_password' => 'required|string|max:255|min:6',
        ]);

        $userId = Auth::id();
        //  echo '<pre>'; print_r($userId); die;
       
    //    dd($request);
        $prsk = $request->input('user_protocol');
        $psp = $request->input('user_host');
        $tsk = $request->input('user_host');
        $tss = $request->input('user_name');
       
        $data = array(
            "production_secret_keys" => $prsk,
            "production_secret_password" => $psp,
            "testing_secret_key" => $tsk,     
            "testing_password_key"=> $tss
        );
        DB::table('settings')->insert($data);
        return view('frontend/pagefour')->with('success','User created successfully.');
    }

  
    
}
