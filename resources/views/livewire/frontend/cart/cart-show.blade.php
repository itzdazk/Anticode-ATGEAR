<div>
  
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
                <h3>Cart</h3>
                <hr>


            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Sản phẩm</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Giá</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Số lượng</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Tổng</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Xóa</h4>
                                </div>
                            </div>
                        </div>


                        @forelse($cart as $cartItem)

                            @if($cartItem->product)


                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a class="text-black" href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                                <label class="product-name">

                                                    @if($cartItem->product->productImages)

                                                        <img src="{{ asset($cartItem ->product->productImages[0]->image) }}" style="width: 150px; height: auto" alt="">
                                                    
                                                    @else
                                                        <img src="" style="width: 150px; height: auto" alt="">
                                                    
                                                    @endif


                                                    {{ $cartItem->product->name }}
                                                    
                                                  @if($cartItem->productColor)
                                                   
                                                        @if($cartItem->productColor->color)

                                                            <span>
                                                               - Màu: {{$cartItem->productColor->color->name  }}
                                                            </span>

                                                        @endif
                                                  @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">${{ $cartItem->product->selling_price }} </label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">


                                                    <button class="btn btn1" wire:loading.attr="disabled" wire:click="decrementQuantity({{ $cartItem->id }})">
                                                        <i class="fa fa-minus"></i>
                                                    </button>

                                                    <input type="text" value="{{ $cartItem->quantity }}" class="input-quantity" />
                                                    
                                                    <button class="btn btn1" wire:loading.attr="disabled" wire:click="incrementQuantity({{ $cartItem->id }})">
                                                        <i class="fa fa-plus"></i>
                                                    </button>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">${{ $cartItem->product->selling_price * $cartItem->quantity }} </label>

                                                @php $totalPrice +=$cartItem->product->selling_price * $cartItem->quantity;
                                                @endphp
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button href="" wire:loading.attr="disabled" wire:click="removeCartItem({{ $cartItem->id }})"  class="btn btn-dark btn-sm">
                                                    <span wire:loading.remove wire:target="removeCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> 

                                                    </span>
                                                    <span wire:loading wire:target="removeCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> 

                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        @empty
                        <div class="row py-5 bg-white shadowl">
                            <div class="col">
                                <div class="h4">Không có sản phẩm trong giỏ hàng</div>
                            </div>
                        </div>
                           
                        @endforelse

                     
                                
                    </div>
                </div>
            </div>

            
            <div class="row mt-5">
                <div class="col-md-8">
                    <h4>
                        Tiếp tục  <a class="text-black text-decoration-none fw-bold tex-decoration-none" href="{{ url('/collections') }}">mua hàng</a>
                    </h4>
                </div>


                <div class="col-md-4">
                    <div class="shadow-sm bg-white p-3">
                        <h4>
                            Total:
                            <span class="float-end">${{ $totalPrice }}</span>
                        </h4>

                        <a href="/checkout" class="btn  btn-dark w-100">
                          <h5>Thanh Toán</h5>  
                        </a>
                    </div>
                </div>


            </div>



        </div>
    </div>


</div>
