<?php

namespace App\Http\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $category,
        $product,
        $prodColorSelectedQuantity,
        $quantityCount = 1,
        $productColorId;

    // kiểm tra sl màu sản phẩm được chọn

    public function colorSelected($proColorId)
    {
        // dd($proColorId);
        $this->productColorId = $proColorId;

        $productColor = $this->product->productColors()->where('id', $proColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    // thêm vào wishlist
    public function addToWishList($productId)
    {
        // dd($productId);
        if (Auth::check()) {

            if (Wishlist::where('user_id', auth()->user()->id)
                ->where('product_id', $productId)->exists()
            ) {
                // session()->flash('message', 'Sản phẩm đã có trong danh sách');
                $this->dispatchBrowserEvent(
                    'message',
                    [
                        'text' => 'Sản phẩm đã có trong danh sách',
                        'type' => 'warning',
                        'status' => 409
                    ]
                );
                return false;
            } else {

                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);

                $this->emit('wishlistAddedUpdated');
                // session()->flash('message', 'Thêm vào danh sách thành công');
                $this->dispatchBrowserEvent(
                    'message',
                    [
                        'text' => 'Thêm vào danh sách thành công',
                        'type' => 'success',
                        'status' => 200
                    ]
                );
            }
        } else {
            // session()->flash('message', 'Vui lòng đăng nhập để tiếp tục');
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Vui lòng đăng nhập để tiếp tục',
                    'type' => 'info',
                    'status' => 401
                ]
            );
            return false;
        }
    }




    // tăng sl sản phẩm
    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    // giảm
    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        // Kiem tra dang nhap
        if (Auth::check()) {
            // dd($productId);
            // Kiem tra san pham co ton tai
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                // dd('am product');
                //kiểm tra số lượng màu sản phẩm 

                if ($this->product->productColors()->count() > 1) {

                    if ($this->prodColorSelectedQuantity != NULL) {

                        // kiem tra san pham da o trong gio hang

                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {

                            $this->dispatchBrowserEvent(
                                'message',
                                [
                                    'text' => 'Sản phẩm đã tồn tại trong giỏ hàng',
                                    'type' => 'info',
                                    'status' => 200
                                ]
                            );
                        } else {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();

                            if ($productColor->quantity > 0) {

                                if ($productColor->quantity >= $this->quantityCount) {


                                    // Insert sản phẩm 
                                    // dd('hang cung voi mau');
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount,
                                    ]);


                                    // count so luong san pham trong gio hang
                                    $this->emit('CartAddedUpdated');


                                    $this->dispatchBrowserEvent(
                                        'message',
                                        [
                                            'text' => 'Đã thêm sản phẩm vào giỏ hàng',
                                            'type' => 'success',
                                            'status' => 200
                                        ]
                                    );
                                } else {
                                    $this->dispatchBrowserEvent(
                                        'message',
                                        [
                                            'text' => 'Số lượng tồn kho chỉ còn ' . $productColor->quantity . '!!',
                                            'type' => 'warning',
                                            'status' => 409
                                        ]
                                    );
                                }
                            } else {


                                $this->dispatchBrowserEvent(
                                    'message',
                                    [
                                        'text' => 'Màu bạn chọn đã hết hàng',
                                        'type' => 'warning',
                                        'status' => 409
                                    ]
                                );
                            }
                        }
                    } else {

                        $this->dispatchBrowserEvent(
                            'message',
                            [
                                'text' => 'Vui lòng chọn màu',
                                'type' => 'info',
                                'status' => 409
                            ]
                        );
                    }
                } else {



                    // Kiem tra san pham cung loai da duoc them vao
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {



                        $this->dispatchBrowserEvent(
                            'message',
                            [
                                'text' => 'Sản phẩm đã tồn tại trong giỏ hàng',
                                'type' => 'info',
                                'status' => 200
                            ]
                        );
                    } else {

                        // Kiem tra so luong san pham
                        if ($this->product->quantity > 0) {
                            // Kiem tra so luong san pham so voi so luong nhap
                            if ($this->product->quantity >= $this->quantityCount) {


                                // Insert product to cart 
                                // dd('hang khong mau');
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);

                                $this->emit('CartAddedUpdated');

                                $this->dispatchBrowserEvent(
                                    'message',
                                    [
                                        'text' => 'Đã thêm sản phẩm vào giỏ hàng',
                                        'type' => 'success',
                                        'status' => 200
                                    ]
                                );
                            } else {
                                $this->dispatchBrowserEvent(
                                    'message',
                                    [
                                        'text' => 'Số lượng tồn kho chỉ còn ' . $this->product->quantity . '!!',
                                        'type' => 'warning',
                                        'status' => 409
                                    ]
                                );
                            }
                        } else {
                            $this->dispatchBrowserEvent(
                                'message',
                                [
                                    'text' => 'Hết hàng rồi bạn ơi!!',
                                    'type' => 'warning',
                                    'status' => 409
                                ]
                            );
                        }
                    }
                }
            } else {

                $this->dispatchBrowserEvent(
                    'message',
                    [
                        'text' => 'Sản phẩm không tồn tại',
                        'type' => 'warning',
                        'status' => 409
                    ]
                );
            }
        } else {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng',
                    'type' => 'info',
                    'status' => 409
                ]
            );
        }
    }


    // mounting 

    public function mount($category, $product)
    {

        $this->category = $category;
        $this->product = $product;
    }




    public function render()
    {
        return view('livewire.frontend.product.view', [
            'product' => $this->product,
            'category' => $this->category,
        ]);
    }
}
