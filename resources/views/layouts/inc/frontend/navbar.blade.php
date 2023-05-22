

<div class="main-navbar shadow-sm sticky-top ">
    <div class="top-navbar bg-black text-light pt-3">
        <div class="container-fluid pt-2">
            <div class="row d-flex justify-content-center">
                <div class="col-md-2 col-lg-2 my-auto d-none d-md-none d-lg-block">
                    
                  
                    <h3 class="brand-name text-center">
                        <a href="{{ url('/') }}" class="text-center text-light text-decoration-none">
                            AT Gear
                        </a>
                       </h3>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-7  my-auto">
                    <form action="{{ url('search') }}" method="GET"  role="search">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Tìm kiếm..." class="form-control rounded-0" />
                            <button class="btn bg-white rounded-0 border " type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-lg-4 col-xl-3 my-auto">
                    <ul class="nav justify-content-center justify-content-lg-end">
                        
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ url('/cart') }}">
                                <i class="fa fa-shopping-cart"></i> (<livewire:frontend.cart.cart-count/>)
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link  text-light"  href="{{ url('/wishlist') }}">
                                <i class="fa fa-heart"></i> (<livewire:frontend.wishlist-count/>)
                            </a>
                        </li> --}}

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link text-light" href="{{ route('login') }}">
                                        {{ __('Đăng nhập') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle  text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>  {{ Auth::user()->name }} 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/orders"><i class="fa fa-list"></i> Đơn hàng</a></li>
                            <li>
                            
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out"></i> {{ __('Đăng xuất') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </li>
                            </ul>
                        </li>
                            
                        @endguest


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar container-fluid navbar-expand-lg  bg-black pt-lg-3">
        <div class="container-fluid rounded-2 py-1 bg-light">
           
            <button class="navbar-toggler bg-light " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-sharp fa-solid fa-bars"></i>
            </button>
            <a class="navbar-brand d-block d-sm-block d-block-none text-black d-lg-none fw-bolder" href="{{ url('/') }}">
                AT Gear
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav container w-100 d-lg-flex justify-content-lg-evenly mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ url('/collections') }}">Loại sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ url('/collections/-lap-top') }}">Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ url('/collections/-pc-lug-') }}">PC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ url('/collections/-manhinh-slug') }}">Màn Hình</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ url('/collections/-gaminggear-slug') }}">Gaming Gear</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ url('/collections/-linhkien-slug') }}">Linh Kiện</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ url('/collections/phu-kien-slug') }}">Phụ Kiện</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="/aboutus">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="/recruitment">Tuyển Dụng</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</div>