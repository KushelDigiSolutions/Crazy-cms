<?php

namespace App\Http\Controllers;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
        public function index()
    {
        $data = Email::orderBy('id','DESC')->get();
        return view('admin.email.index',compact('data'));
    }

        public function create()
    {
        return view('admin.email.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string'
        ]);

        $email = Email::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.email.index')->with('success','Email created successfully.');
    }

    public function edit($id)
    {
        $email = Email::where('id',decrypt($id))->first();
        return view('admin.email.edit',compact('email'));
    }
    
// Author Dileep 12-10-24 

    
    public function update(Request $request, Email $email)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'description' => ['required', 'string', 'description'],
        // ]); 
        $email = Email::find($request->id);
        $email->name = $request->name;
        $email->email = $request->description;
        $email->save();
        return redirect()->route('admin.email.index')->with('success','Email updated successfully.');
    }
    public function destroy($id)
    {
        Email::where('id',decrypt($id))->delete();
        return redirect()->back()->with('success','Email deleted successfully.');
    }
}
