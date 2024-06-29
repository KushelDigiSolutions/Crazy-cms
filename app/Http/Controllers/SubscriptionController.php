<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $data = Subscription::orderBy('id','DESC')->get();
        return view('admin.subscription.index',compact('data'));
    }

    public function create()
    {
        return view('admin.subscription.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subscriptions|max:255',
        ]);
        Subscription::updateOrCreate(
            [
                'id'=>$request->id
            ],[
                'name'=>$request->name,
            ]
        );
        if($request->id){
            $msg = 'Subscription updated successfully.';
        }else{
            $msg = 'Subscription created successfully.';
        }
        return redirect()->route('admin.subscription.index')->with('success',$msg);
    }

    public function edit($id)
    {
        $data = Subscription::where('id',decrypt($id))->first();
        return view('admin.subscription.edit',compact('data'));
    }

    public function destroy($id)
    {
        Subscription::where('id',decrypt($id))->delete();
        return redirect()->route('admin.subscription.index')->with('error','Subscription deleted successfully.');
    }
}
