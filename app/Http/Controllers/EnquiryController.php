<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $data = Enquiry::orderBy('id','DESC')->get();

        $user = Enquiry::with('user')->get();
       
        return view('admin.enquiry.index',compact('data','user'));
    }

    public function create()
    {
        return view('admin.enquiry.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:enquirys|max:255',
        ]);
        Enquiry::updateOrCreate(
            [
                'id'=>$request->id
            ],[
                'name'=>$request->name,
            ]
        );
        if($request->id){
            $msg = 'Enquiry updated successfully.';
        }else{
            $msg = 'Enquiry created successfully.';
        }
        return redirect()->route('admin.enquiry.index')->with('success',$msg);
    }

    public function edit($id)
    {
        $data = Enquiry::where('id',decrypt($id))->first();
        return view('admin.enquiry.edit',compact('data'));
    }

    public function destroy($id)
    {
        Enquiry::where('id',decrypt($id))->delete();
        return redirect()->route('admin.enquiry.index')->with('error','Enquiry deleted successfully.');
    }

    // public function filter(Request $request)
    // {
        
    //     $status = $request->status;
    //     echo '<pre>'; print_r($status); die;
    //     $enquiry = Enquiry::query();
    //      echo '<pre>'; print_r($enquiry); die;
    //     if($status != null){
    //         $enquiry->where('status', $status);
    //     }
    //     $data = $enquiry->get();
    //     echo '<pre>'; print_r($data); die;

    // return view('admin.enquiry.partials.table', compact('data'))->render();
    // }

    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return view('enquiries.show', compact('enquiry'));
    }

    public function filter(Request $request)
    {
        $status = $request->status;
        if ($status !== '0' && $status !== '1') {
            return response()->json(['error' => 'Invalid status value'], 400);
        }
        $data = Enquiry::where('status', $status)->get();        
        return response()->json($data);
   
    }

    public function customer(){
         $data = Enquiry::where('user_id',3)->get();
         $user = Enquiry::with('user')->get();
        // $data = Enquiry::orderBy('id','DESC')->get();
        //dd($data);
        return view('admin.enquiry.customer',compact('data','user')); 
    }
}
