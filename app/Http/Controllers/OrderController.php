<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::orderBy('id','DESC')->get();
        return view('admin.order.index',compact('data'));
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:orders|max:255',
        ]);
        Order::updateOrCreate(
            [
                'id'=>$request->id
            ],[
                'name'=>$request->name,
            ]
        );
        if($request->id){
            $msg = 'Order updated successfully.';
        }else{
            $msg = 'Order created successfully.';
        }
        return redirect()->route('admin.order.index')->with('success',$msg);
    }

    public function edit($id)
    {
        $data = Order::where('id',decrypt($id))->first();
        return view('admin.order.edit',compact('data'));
    }

    public function destroy($id)
    {
        Order::where('id',decrypt($id))->delete();
        return redirect()->route('admin.order.index')->with('error','Order deleted successfully.');
    }
}
