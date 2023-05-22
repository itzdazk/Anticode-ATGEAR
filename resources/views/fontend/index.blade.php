@extends('layouts.app')


@section('title','Home Page')


@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach($sliders as $key => $sliderItem)
       
          <div class="carousel-item {{ $key==0 ? 'active' : ''}}">
            <a href="{{ url('/collections/'.$laptopProducts[0]->category->slug) }}">
            <img src="{{ asset("$sliderItem->image") }}" class="img-fluid d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ $sliderItem->title }}</h5>
              <p>{{ $sliderItem->description }}</p>
            </div>
          </a>
          </div>

       
          
        @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

{{-- trending product --}}
        <div class="py-4 bg-white">
            <div class="container">
              <div class="row-justify-content-center">

                <div class="col-md-12 text-center ">
                  <h3>Sản Phẩm Trending</h3>
                </div>

                @if($trendingProducts)
                <div class="col-md-12 mt-4">
                 

                  <div class="owl-carousel owl-theme trending-products">
                      @foreach ($trendingProducts as $item)

                      <div class="item">
                        <div class="col ">
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
                
                  @endforeach
                  @endif
                </div>

                </div>
              </div>
            </div>
        </div>



{{-- laptop --}}
@if($laptopProducts)
      <div class="pt-3 bg-white">
        <div class="container">
          <div class="row bg-black rounded-3">
            <div class="col">
              <h4 class="text-center m-0  p-3 ">
                <a href="{{ url('/collections/'.$laptopProducts[0]->category->slug) }}" class="text-decoration-none" >
                  <span class="p-2 px-5 bg-white text-black rounded-3">
                    {{ $laptopProducts[0]->category->name }}
                  </span>
  
                </a>
                
              </h4>
            </div>
          </div>
          
          <div class="row pt-4">
            

              @foreach ($laptopProducts as $item)
              <div class="col-6 col-md-4 col-lg-3 col-xl-2">
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
      
              @endforeach

              <div class="container">
                <div class="text-center">
                  <a href="{{ url('/collections/'.$laptopProducts[0]->category->slug) }}" class="text-decoration-none text-black">
                    <i class="fa-solid fa-eye"></i>
                    Xem tất cả >>

                  </a>
                </div>
              </div>
             
            
          </div>
        </div>
      </div>
      @endif

{{-- PC --}}
@if($pcProducts)
      <div class="pt-3 bg-white">
        <div class="container">
          <div class="row bg-black rounded-3">
            <div class="col">
              <h4 class="text-center m-0  p-3 ">
                <a href="{{ url('/collections/'.$pcProducts[0]->category->slug) }}" class="text-decoration-none" >
                  <span class="p-2 px-5 bg-white text-black rounded-3">
                    {{ $pcProducts[0]->category->name }}
                  </span>
  
                </a>
                
              </h4>
            </div>
          </div>
          
          <div class="row pt-4">
            
              
              @foreach ($pcProducts as $item)
              <div class="col-6 col-md-3 ">
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
      
              @endforeach

              <div class="container">
                <div class="text-center">
                  <a href="{{ url('/collections/'.$pcProducts[0]->category->slug) }}" class="text-decoration-none text-black">
                    <i class="fa-solid fa-eye"></i>
                    Xem tất cả >>

                  </a>
                </div>
              </div>
             
            
          </div>
        </div>
      </div>
  @endif

{{-- Man hinh --}}
@if($displayProducts)
      <div class="pt-3 bg-white">
        <div class="container">
          <div class="row bg-black rounded-3">
            <div class="col">
              <h4 class="text-center m-0  p-3 ">
                <a href="{{ url('/collections/'.$displayProducts[0]->category->slug) }}" class="text-decoration-none" >
                  <span class="p-2 px-5 bg-white text-black rounded-3">
                    {{ $displayProducts[0]->category->name }}
                  </span>
  
                </a>
                
              </h4>
            </div>
          </div>
          
          <div class="row pt-4">
            
              @foreach ($displayProducts as $item)
              <div class="col-6 col-md-3">
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
      
              @endforeach

              <div class="container">
                <div class="text-center">
                  <a href="{{ url('/collections/'.$displayProducts[0]->category->slug) }}" class="text-decoration-none text-black">
                    <i class="fa-solid fa-eye"></i>
                    Xem tất cả >>

                  </a>
                </div>
              </div>
              
            
          </div>
        </div>
      </div>
      @endif

{{-- Gaming Gear --}}
@if($gearProducts)
      <div class="pt-3 bg-white">
        <div class="container">
          <div class="row bg-black rounded-3">
            <div class="col">
              <h4 class="text-center m-0  p-3 ">
                <a href="{{ url('/collections/'.$gearProducts[0]->category->slug) }}" class="text-decoration-none" >
                  <span class="p-2 px-5 bg-white text-black rounded-3">
                    {{ $gearProducts[0]->category->name }}
                  </span>
  
                </a>
                
              </h4>
            </div>
          </div>
          
          <div class="row pt-4">
            
              @foreach ($gearProducts as $item)
              <div class="col-6 col-md-3">
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
      
              @endforeach

              <div class="container">
                <div class="text-center">
                  <a href="{{ url('/collections/'.$gearProducts[0]->category->slug) }}" class="text-decoration-none text-black">
                    <i class="fa-solid fa-eye"></i>
                    Xem tất cả >>

                  </a>
                </div>
              </div>
         
            
          </div>
        </div>
      </div>
      @endif


      


@endsection


@section('script')
<script>
$('.trending-products').owlCarousel({
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

@endsection