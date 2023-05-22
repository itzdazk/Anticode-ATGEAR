<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $orders = Order::orderBy('created_at', 'desc')->paginate(10);


        return view('admin.orders.index', compact('orders'));
    }

    public function view($order_id)
    {

        $order = Order::where('id', $order_id)->first();
        if ($order) {
            return view('admin.orders.view', compact('order'));
        } else {
            return redirect('admin/orders')->with('message', 'Không tìm thấy chi tiết đơn hàng');
        }
    }

    public function updateOrderStatus($orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->oreder_status,

            ]);
            return redirect('admin/orders/' . $orderId)->with('message', 'Cập nhật trạng thái đơn hàng thành công');
        } else {
            return redirect('admin/orders/' . $orderId)->with('message', 'Không tìm thấy chi tiết đơn hàng');
        }
    }
}
