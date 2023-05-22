@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <h2 class="alert alert-success">{{ session('message') }}</h2>
      @endif


     
          <div class="me-md-3 me-xl-5">
            <h2>Dashboard<h2>
            
          </div>



          <div class="row ">
   
            <hr>

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">User</label>
                  <h1 class="mt-2">{{ $allUser }}</h1>
                </a>
              </div>

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">Admin</label>
                  <h1 class="mt-2">{{ $allAdmin }}</h1>
                </a>
              </div>
          </div>

         
          <div class="row ">
       
            <hr>

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">Tổng Order</label>
                  <h1 class="mt-2">{{ $totalOrder }}</h1>
                </a>
              </div>

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for=""> Chưa Được Xử Lý</label>
                  <h1 class="mt-2">{{ $pendingOrder }}</h1>
                </a>
              </div>

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">Orders Trong Ngày</label>
                  <h1 class="mt-2">{{ $todayOrder }}</h1>
                </a>
              </div>

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">Orders Trong Tháng</label>
                  <h1 class="mt-2">{{ $monthOrder }}</h1>
                </a>
              </div>


         



          </div>


          <div class="row ">
     
            <hr>
              

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">Sản Phẩm</label>
                  <h1 class="mt-2">{{ $totalProducts }}</h1>
                </a>
              </div>

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">Loại Sản Phẩm</label>
                  <h1 class="mt-2">{{ $totalCategories }}</h1>
                </a>
              </div>

              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">Thương Hiệu</label>
                  <h1 class="mt-2">{{ $totalBrands }}</h1>
                </a>
              </div>


              <div class="col-md-3 ">
                <a href="" class="card card-body bg-dark rounded-3 text-center text-decoration-none text-white mb-3">
                  <label for="">Màu</label>
                  <h1 class="mt-2">{{ $totalColors }}</h1>
                </a>
              </div>



          </div>



        </div>

      </div>

@endsection