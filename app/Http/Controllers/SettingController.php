<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use DB;

class SettingController extends Controller
{

  
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $paypalsandboxclientid = env('PAYPAL_SANDBOX_CLIENT_ID');
        $paypalsandboxclientsecret = env('PAYPAL_SANDBOX_CLIENT_SECRET');
        $paypalliveclientid = env('PAYPAL_LIVE_CLIENT_ID');
        $paypalliveclientsecret = env('PAYPAL_LIVE_CLIENT_SECRET');
        $paypalappid  = env('PAYPAL_LIVE_APP_ID');
        $paypalmode   = env('PAYPAL_MODE');
        // return view('setting.edit', ['user' => $request->user(),]);
        return view('setting.edit', compact('paypalsandboxclientid', 'paypalsandboxclientsecret', 'paypalliveclientid','paypalliveclientsecret','paypalappid','paypalmode'));
    }
    
    
    // Dileep Singh code here 24-08-2024
    
    public function update(Request $request)
    {
        $request->validate([
            'production_secret_key' => 'required|string|max:255',
            'production_secret_password' => 'required|string|max:255|min:6',
            'testing_secret_key' => 'required|string|max:255',
            'testing_secret_password' => 'required|string|max:255|min:6', 
            'paypal_live_app_id'      => 'required|string|max:255|min:6',               
            'status'  => 'required',
        ]);

        $this->setEnv([
            'PAYPAL_SANDBOX_CLIENT_ID' => $request->production_secret_key,
            'PAYPAL_SANDBOX_CLIENT_SECRET' => $request->production_secret_password,
            'PAYPAL_LIVE_CLIENT_ID' => $request->testing_secret_key,
            'PAYPAL_LIVE_CLIENT_SECRET' => $request->testing_secret_password,
            'PAYPAL_LIVE_APP_ID' => $request->paypal_live_app_id,
            'PAYPAL_MODE' => $request->status,
        ]);

        return Redirect::route('admin.setting.edit')->with('status', 'setting-updated');
    }

    public function wedit17122024(Request $request): View
    {
        // Retrieve the environment variable
        $whiteBoard = env('WHITE_BOARD');
    
        // Remove any enclosing double quotes from the value
        if ($whiteBoard !== null && strlen($whiteBoard) > 1 && $whiteBoard[0] === '"' && $whiteBoard[strlen($whiteBoard) - 1] === '"') {
            $whiteBoard = substr($whiteBoard, 1, -1);
        }
    
        return view('setting.whiteboard', compact('whiteBoard'));
    }

    public function wedit(Request $request): View
    {
    $filePath = public_path('whiteBoard/whiteboard.txt');
    $whiteBoard = '';
    if (file_exists($filePath)) {
        $whiteBoard = file_get_contents($filePath);
    }

    return view('setting.whiteboard', compact('whiteBoard'));
    }

    public function wupdate(Request $request)
    {
    $request->validate([
        'white_board' => 'required|string'
    ]);
    $whiteBoardValue = trim($request->white_board);
    $filePath = public_path('whiteBoard/whiteboard.txt');
    if (!is_dir(dirname($filePath))) {
        mkdir(dirname($filePath), 0755, true);
    }
    file_put_contents($filePath, $whiteBoardValue);

    return Redirect::route('admin.whiteboard.edit')->with('status', 'whiteboard-updated');
    }

    public function wupdate17122024(Request $request)
    {
        $request->validate([
            'white_board' => 'required|string'
        ]);
           // Trim leading and trailing whitespace
        $whiteBoardValue = trim($request->white_board);
    
        // Set environment variable with quotes to handle spaces
        $this->setEnv([
            'WHITE_BOARD' => '"$whiteBoardValue"'
        ]);
        return Redirect::route('admin.whiteboard.edit')->with('status', 'whiteboard-updated');
    }

    protected function setEnv(array $data)
    {
        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);
    
        foreach ($data as $key => $value) {
            $value = trim($value); 
            $escapedValue = addslashes($value); 
    
            if (preg_match("/^{$key}=.*/m", $envContent)) {
                $envContent = preg_replace(
                    "/^{$key}=.*/m",
                    "{$key}={$escapedValue}",
                    $envContent
                );
            } else {
                $envContent .= "\n{$key}={$escapedValue}";
            }
        }
        file_put_contents($envPath, $envContent);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'production_secret_key' => 'required|string|max:255',
    //         'production_secret_password' => 'required|string|max:255|min:6',
    //         'testing_secret_key' => 'required|string|max:255|min:6',
    //         'testing_secret_password' => 'required|string|max:255|min:6',
    //     ]);

    //     $userId = Auth::id();
    //     $prsk = $request->input('production_secret_key');
    //     $psp = $request->input('production_secret_password');
    //     $tsk = $request->input('testing_secret_key');
    //     $tss = $request->input('testing_secret_password');
       
    //     $data = array(
    //         "production_secret_keys" => $prsk,
    //         "production_secret_password" => $psp,
    //         "testing_secret_key" => $tsk,     
    //         "testing_password_key"=> $tss
    //     );
    //     DB::table('settings')->insert($data);
    //     return Redirect::route('admin.setting.edit')->with('status', 'setting-updated');
    // }

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
