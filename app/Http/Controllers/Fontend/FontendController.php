<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();

        $trendingProducts = Product::where('trending', '1')->take(15)->get();
        $laptopProducts = Product::where('category_id', '1')->latest()->take(12)->get();

        $pcProducts = Product::where('category_id', '2')->latest()->take(8)->get();

        $displayProducts = Product::where('category_id', '3')->latest()->take(8)->get();

        $gearProducts = Product::where('category_id', '4')->latest()->take(8)->get();

        return view('fontend.index', compact(
            'sliders',
            'laptopProducts',
            'trendingProducts',
            'pcProducts',
            'displayProducts',
            'gearProducts'
        ));
    }

    // hiển thị tất cả loại sản phẩm có status =1 => được hiển thị
    public function categories()
    {
        $categories = Category::where('status', '1')->get();
        return view('fontend.collections.category.index', compact('categories'));
    }

    // tương tự cate
    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            $products = $category->products()->get();
            return view('fontend.collections.products.index', compact('products', 'category'));
        } else {
            return redirect()->back();
        }
    }

    // xem chi tiết sản phẩm
    public function productView(string $category_Slug, string $product_slug)
    {
        $category = Category::where('slug', $category_Slug)->first();

        if ($category) {

            $product = $category->products()
                ->where('slug', $product_slug)
                ->where('status', '0')
                ->first();

            if ($product) {

                return view('fontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function thanks()
    {
        return view('fontend.thanks');
    }


    public function searchProducts(Request $request)
    {

        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(16);
            $searchItem = $request->search;
            return view('fontend.pages.search', compact('searchProducts', 'searchItem'));
        } else {

            return redirect()->back()->with('message', 'Không tìm thấy sản phẩm');
        }
    }

    public function aboutus()
    {
        return view('fontend.pages.aboutus');
    }

    public function recruitment()
    {
        return view('fontend.pages.recruitment');
    }
}
