<div>
    
    

      
            
                <div class="row">
            
                    @forelse ($products as $item)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card">
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
                                    <span class="selling-price">{{ $item->selling_price }}</span>
                                    <span class="original-price">{{ $item->original_price }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
            
                    @empty
                        <div class="col-md-12">
                            <div class="p-2">
                                Không có sản phẩm danh mục {{ $category->name }}
                            </div>
                        </div>
            
                    @endforelse
            
                </div>




</div>
