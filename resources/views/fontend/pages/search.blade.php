
@extends('layouts.app')


@section('title','Sản phẩm tìm kiếm')

@section('content')
<div>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Kết quả tìm kiếm</h4>
                    </div>
                </div>


                <div class="row">

                    @forelse ($searchProducts as $item)
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
                        <div class="col-md-12 text-center mt-5 py-5">
                            <div class="mt-5 py-5">
                                
                                    <h6>Không có sản phẩm tìm kiếm: <span class="fw-bold h5">{{ $searchItem }}</span>  </h6> 
                                 
                                         <a href="{{ url('/') }}" class="btn btn-dark btn-sm mt-4 py-2 px-3 fw-bold" >Quay về trang chính</a>
                                 

                                
                            </div>

                            
                        </div>
            
                    @endforelse


                    <div>
                        {{ $searchProducts->appends(request()->input())->links() }}
                    </div>
            
                </div>



            </div>
        </div>   





</div>
@endsection