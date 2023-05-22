<div>
    <div class="py-3 py-md-5 ">
        <div class="container">

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if($product->productImages)
                        {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                         --}}
                        <div class="exzoom" id="exzoom">
                              <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                   @foreach($product->productImages as $itemImg)
                                        <li class=""><img src="{{ asset($itemImg->image) }}"/></li>
                                    @endforeach
                                </ul>
                              </div>
                              <div class="exzoom_nav"></div>
                              <p class="exzoom_btn">
                                  <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                  <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                              </p> 
                            </div>
                        @else
                        No Image Added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name text-black">
                            {{ $product->name }}
                        
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} /  {{ $product->name }}
                        </p>

                        <div>
                           Thương hiệu: {{ $product->brand }}
                        </div>

                        <div class="">
                            <span class="selling-price">{{ $product->selling_price }}</span>
                            <span class="original-price">{{ $product->original_price }}</span>
                        </div>

                        <div class="">
                            @if($product->productColors->count() >0)
                                @if($product->productColors)
                                    @foreach($product->productColors as $color)
                                        {{-- <input type="radio" name="colorSelection" value="{{ $color->id }}"> {{ $color->color->name }} --}}
                                        <label class="colorSelectionLabel black" style="background-color: {{ $color->color->name }} "
                                            wire:click="colorSelected({{ $color->id }} )"
                                            >
                                            {{ $color->color->name }}
                                        </label>
                                     @endforeach
                                @endif

                                <div class="my-2 ">
                                    @if($this->prodColorSelectedQuantity =='outOfStock')
                                        <label class="btn-sm bg-danger text-light px-2">Hết hàng</label>
                                    @elseif($this->prodColorSelectedQuantity > 0)
                                    <label class="btn-sm bg-black text-light px-2">Còn hàng</label>
                                    @endif

                                </div>

                            @else 
                                    @if($product->quantity >0)
                                        <label class="btn-sm bg-black text-light px-2">Còn hàng</label>
                                    @else
                                        <label class="btn-sm bg-danger px-2">Hết hàng</label>
                                    @endif
                            @endif
                           
                        </div>


                        <div class="mt-2 ">
                            <div class="input-group ">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input  type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                                <span class="btn btn1 " wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>


                        <div class="mt-2">

                            <button type="button" class="btn btn1" wire:click="addToCart({{$product->id}})" >
                                 <i class="fa fa-shopping-cart"></i>
                                 Add To Cart
                            </button>
                            
                            
                            {{-- <button  type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn1"> 
                            <span wire:loading.remove wire:target:="addToWishList">
                                <i class="fa fa-heart"></i>
                                 Add To Wishlist 
                                
                            </span>
                        </button>
                            <span wire:loading wire:target:="addToWishList">Adding...</span> --}}
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Mô tả sản phẩm</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Chi tiết sản phẩm</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</div>


{{-- san pham lien quan loai --}}
<div class="pt-2 bg-white">
    <div class="container">
      <div class="row bg-black rounded-3">
        <div class="col">
          <h4 class="text-center m-0  p-3 ">
            <a href="{{ url('/collections/'.$category->slug) }}" class="text-decoration-none" >
              <span class="p-2 px-5 bg-white text-black rounded-3">
                Sản phẩm liên quan
                @if($category) {{ $category->name }}
                @endif
              </span>

            </a>
            
          </h4>
        </div>
      </div>
      
      <div class="row pt-4">

        <div class="owl-carousel owl-theme related-products">

          @forelse ($category->relatedProducts->take(12) as $item)

          <div class="item">
          <div class="col  ">
              <div class="product-card rounded-3">
                  <div class="product-card-img">
                      @if($item->quantity >0)
                      <label class="stock bg-black">Còn hàng</label>
                      @else
                      <label class="stock bg-danger">Hết hàng</label>
                      @endif
  
                      <a href="{{ url('/collections/'.$item->category->slug.'/'.$item->slug) }}">
                      <img class="img-fluid" src="{{ asset($item->productImages[0]->image)  }}" alt=" {{ $item->name }}">
                      <a>
                  </div>
                  <div class="product-card-body">
                      <p class="product-brand">{{ $item->brand }}</p>
                      <h5 class="product-name">
                         <a class="text-black" href="{{ url('/collections/'.$item->category->slug.'/'.$item->slug) }}">
                          {{ $item->name }}
                         </a>
                      </h5>
                      <div>
                        <span class="original-price">{{ $item->original_price }}</span>
                          <span class="selling-price text-danger">{{ $item->selling_price }}$</span>
                         
                      </div>

                  </div>
              </div>
          </div>
          </div>
          @empty
          <div class="col-md-12 p-2">
              <h4>Không có sản phẩm liên quan</h4>
          </div>
  
          @endforelse

          </div>
        
      </div>
    
    
    </div>
</div>




{{-- san pham lien quan thuong hieu --}}
<div class="pt-2 bg-white">
    <div class="container">
      <div class="row bg-black rounded-3">
        <div class="col">
          <h4 class="text-center m-0  p-3 ">
            <a href="{{ url('/collections/'.$category->slug) }}" class="text-decoration-none" >
              <span class="p-2 px-5 bg-white text-black rounded-3">
                Sản phẩm liên quan
                @if($product) {{ $product->brand }}
                @endif
              </span>

            </a>
            
          </h4>
        </div>
      </div>
      
      <div class="row pt-4">
        <div class="owl-carousel owl-theme related-products">
          @forelse ($category->relatedProducts->take(12) as $item)
            @if($item->brand == "$product->brand")
            
            
          <div class="item">
            <div class="col  ">
                <div class="product-card rounded-3">
                    <div class="product-card-img">
                        @if($item->quantity >0)
                        <label class="stock bg-black">Còn hàng</label>
                        @else
                        <label class="stock bg-danger">Hết hàng</label>
                        @endif
    
                        <a href="{{ url('/collections/'.$item->category->slug.'/'.$item->slug) }}">
                        <img class="img-fluid" src="{{ asset($item->productImages[0]->image)  }}" alt=" {{ $item->name }}">
                        <a>
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{ $item->brand }}</p>
                        <h5 class="product-name">
                           <a class="text-black" href="{{ url('/collections/'.$item->category->slug.'/'.$item->slug) }}">
                            {{ $item->name }}
                           </a>
                        </h5>
                        <div>
                          <span class="original-price">{{ $item->original_price }}</span>
                            <span class="selling-price text-danger">{{ $item->selling_price }}$</span>
                           
                        </div>
  
                    </div>
                </div>
            </div>
            </div>
                @endif


            @empty
                <div class="col-md-12 p-2">
                    <h4>Không có sản phẩm liên quan</h4>
                </div>

          @endforelse

         </div>
        
      </div>
    
    
    </div>
</div>



@push('scripts')
<script>

$(function(){
    
     
    
    $("#exzoom").exzoom({
      "navWidth": 60,
      "navHeight": 60,
      "navItemNum": 5,
      "navItemMargin": 7,
      "navBorder": 1,
      "autoPlay":false,
      "autoPlayTimeout": 2000 
    });
  });


  $('.related-products').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})


    
</script>

    

@endpush