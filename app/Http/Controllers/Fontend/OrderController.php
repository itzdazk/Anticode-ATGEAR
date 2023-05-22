<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller


{



    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('fontend.orders.index', compact('orders'));
    }

    public function view($orderId)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $orderId)->first();

        if ($order) {

            return view('fontend.orders.view', compact('order'));
        } else {
            return redirect()->back()->with('message', 'Không tìm thấy');
        }
    }
}
