<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{
    // xóa sản phẩm khỏi wishlist
    public function removeWishlistItem(int $wishlistId)
    {
        // dd($wishlistId);

        // cập nhật số lượng wishlist khi remove 1 item
        $this->emit('wishlistAddedUpdated');

        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();
        $this->dispatchBrowserEvent(
            'message',
            [
                'text' => 'Xóa sản phẩm khỏi danh sách thành công',
                'type' => 'success',
                'status' => 200
            ]
        );
    }



    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist

        ]);
    }
}
