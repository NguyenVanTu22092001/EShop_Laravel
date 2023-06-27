<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::orderBy('id', 'DESC')->where('status', '0')->get();

        return view('admin.order.index')->with(compact('orders'));
    }
    public function view($id){
        $orders=Order::where('id', $id)->first();
        return view('admin.order.view')->with(compact('orders'));
    }
    public function update(Request $request, $id){
        $orders=Order::find($id);
        $orders->status=$request->input('status');
        $orders->update();
        return redirect('orders')->with('status', 'Status Updated Successfully');
    }
    public function orderhistory(){
        $orders=Order::orderBy('id', 'DESC')->where('status', '1')->get();

        return view('admin.order.history')->with(compact('orders'));
    }
}
