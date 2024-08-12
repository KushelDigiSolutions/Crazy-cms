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

    public function update(Request $request, Subscription $subscription)
    {
        // $subscription = new Subscription();
        $subscription = Subscription::find($request->id);
        $subscription->name = $request->name;
        $subscription->mrp = $request->mrp;
        $subscription->price = $request->sale_price;
        $subscription->monthly_price = $request->monthly_price;
        $subscription->status = is_array($request->status) ? $request->status[0] : $request->status;
        
        // Encode the description and status arrays as JSON
        $subscription->items = json_encode([
            'descriptions' => $request->description,
            'statuses' => $request->status
        ]);
        
        $subscription->save();
        
                return redirect()->route('admin.subscription.index')->with('success', 'Subscription added successfully');

    }


    public function edit($id)
    {
        
        $data = Subscription::where('id',decrypt($id))->first();
        $items = json_decode($data->items, true);
        return view('admin.subscription.edit',compact('data','items'));
    }

    public function destroy($id)
    {
        Subscription::where('id',decrypt($id))->delete();
        return redirect()->route('admin.subscription.index')->with('error','Subscription deleted successfully.');
    }
}
