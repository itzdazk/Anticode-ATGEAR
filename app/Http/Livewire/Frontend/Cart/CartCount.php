<?php

namespace App\Http\Livewire\Frontend\Cart;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;

class CartCount extends Component
{
    public $cartCount;

    // count sl sản phẩm trong giỏ hàng
    protected $listeners = ['CartAddedUpdated' => 'checkCartCount'];



    public function checkCartCount()
    {

        if (Auth::check()) {
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->cartCount = 0;
        }
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.frontend.cart.cart-count', [
            'cartCount' => $this->cartCount,
        ]);
    }
}
