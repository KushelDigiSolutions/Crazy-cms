<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $data = Enquiry::orderBy('id','DESC')->get();
        return view('admin.enquiry.index',compact('data'));
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
}
