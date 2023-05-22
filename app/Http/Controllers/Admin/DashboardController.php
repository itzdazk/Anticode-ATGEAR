<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Category;
use App\Models\Color;
use App\Models\User;
use App\Models\Product;


class DashboardController extends Controller
{
    public function index()
    {

        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalBrands = Brand::count();

        $totalColors = Color::count();

        $allUser = User::where('role_as', '0')->count();

        $allAdmin = User::where('role_as', '1')->count();

        $totalOrder = Order::count();
        $pendingOrder = Order::where('status_message', 'Chưa giải quyết')->count();
        $todayOrder = Order::whereDate('created_at', Carbon::now()->format('d-m-Y'))->count();
        $monthOrder = Order::whereMonth('created_at', Carbon::now()->format('m'))->count();


        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalBrands',
            'totalColors',
            'allUser',
            'allAdmin',
            'totalOrder',
            'todayOrder',
            'pendingOrder',
            'monthOrder'
        ));
    }
}
