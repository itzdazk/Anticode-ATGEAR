<?php

namespace App\Http\Livewire\Frontend\CheckOut;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount;

    public $fullname, $email, $phone, $pincode, $address, $paymen_mode = NULL, $payment_id = NULL;


    public function rules()
    {
        // check input 
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|string|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|integer|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    // tạo order 
    public function palceOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'AT-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'Chưa giải quyết',
            'payment_mode' => $this->paymen_mode,
            'payment_id' => $this->payment_id,


        ]);

        // tạo order detail
        foreach ($this->carts as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,

            ]);

            if ($cartItem->product_color_id != NULL) {


                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }

        return $order;
    }

    // phương thức cod
    public function codOrder()
    {

        $this->paymen_mode = 'COD';
        $codOrder = $this->palceOrder();
        if ($codOrder) {

            Cart::where('user_id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Đặt hàng thành công',
                    'type' => 'success',
                    'status' => 200
                ]
            );
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Đặt hàng thất bại, vui lòng kiểm tra lại',
                    'type' => 'error',
                    'status' => 200
                ]
            );
        }
    }

    // tính tổng số tiền
    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }

        return $this->totalProductAmount;
    }


    public function render()
    {
        // truyền về fullname và email vào input
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;


        $this->totalProductAmount = $this->totalProductAmount();

        return view('livewire.frontend.check-out.checkout-show', [
            'totalProductAmout' => $this->totalProductAmount,
        ]);
    }
}
