<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;



    // giảm sl sản phẩm trong giỏ hàng
    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->quantity > 1) {

                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Cập nhật số lượng thành công',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Số lượng sản phẩm không được dưới 1',
                    'type' => 'error',
                    'status' => 200
                ]);
            }
        } else {

            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã xảy ra lỗi!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }


    // tăng sp sản phẩm trong giỏ hàng
    public function incrementQuantity(int $cartId)
    {

        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {

                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();

                // Kiểm tra số lượng sản phẩm có màu tương ứng > số lượng sản phẩm có trong cart

                if ($productColor->quantity > $cartData->quantity) {


                    $cartData->increment('quantity');

                    $this->dispatchBrowserEvent(
                        'message',
                        [
                            'text' => 'Cập nhật số lượng thành công',
                            'type' => 'success',
                            'status' => 200
                        ]
                    );
                } else {


                    $this->dispatchBrowserEvent(
                        'message',
                        [
                            'text' => 'Chỉ còn ' . $productColor->quantity . ' sản phẩm tồn kho',
                            'type' => 'info',
                            'status' => 200
                        ]
                    );
                }
            } else {

                // Kiểm tra sản phẩm không có màu > số lượng sản phẩm trong cart


                if ($cartData->product->quantity > $cartData->quantity) {

                    $cartData->increment('quantity');

                    $this->dispatchBrowserEvent(
                        'message',
                        [
                            'text' => 'Cập nhật số lượng thành công',
                            'type' => 'success',
                            'status' => 200
                        ]
                    );
                } else {


                    $this->dispatchBrowserEvent(
                        'message',
                        [
                            'text' => 'Chỉ còn ' . $cartData->product->quantity . ' sản phẩm tồn kho',
                            'type' => 'info',
                            'status' => 200
                        ]
                    );
                }
            }
        } else {

            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Đã xảy ra lỗi!',
                    'type' => 'warning',
                    'status' => 200
                ]
            );
        }
    }

    // xóa sản phẩm trong giỏ hàng
    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if ($cartRemoveData) {
            $cartRemoveData->delete();
            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Đã xóa sản phẩm khỏi giỏ hàng',
                    'type' => 'success',
                    'status' => 200
                ]
            );
        } else {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Có lỗi xảy ra !!',
                    'type' => 'error',
                    'status' => 500
                ]
            );
        }
    }

    public function render()
    {

        $this->cart = Cart::where('user_id', auth()->user()->id)->get();

        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart,

        ]);
    }
}
