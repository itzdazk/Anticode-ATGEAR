@extends('layouts.admin')


@section('title','Order Details')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">

        @if(session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                    <h3>Orders 
                        <a href="{{ url('admin/orders') }}" class="btn btn-dark btn-sm float-end">Back</a>

                    </h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="fw-bold">Chi tiết đơn hàng</h5>
                                        <hr>
                                        <h6>Order ID: {{ $order->id }}</h6>
                                        <h6>Mã đơn hàng: {{ $order->tracking_no }}</h6>
                                        <h6>Ngày đặt: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                        <h6>PTTT: {{ $order->payment_mode }}</h6>
                                        <h6 class="">
                                        Trạng thái đơn hàng: <span class="text-uppercase border p-2 text-dark">{{ $order->status_message }}</span>
                                        </h6>
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="fw-bold">Thông tin giao hàng</h5>
                                        <hr>
                                        <h6>Họ và tên: {{ $order->fullname }}</h6>
                                        <h6>Email: {{ $order->email }}</h6>
                                        <h6>Số điện thoại: {{ $order->phone }}</h6>
                                        <h6>Zip code: {{ $order->pincode }}</h6>
                                        <h6>Địa chỉ: {{ $order->address }}</h6>
                                    </div>


                            


                                </div>

                                <br>
                            
                                    <h5 class="fw-bold">Sản phẩm</h5>
                                    <hr>

                                    <div class="table-responsive">
                                        <table class="table table-dark table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Item ID</th>
                                                    <th>Hình</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Tổng</th>
                                                </tr>
                                            </thead>
        
                                            <tbody>

                                                @php    
                                                    $totalPrice=0;
                                                @endphp
                                                @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td width="10%">{{ $item->id }}</td>
                                                    <td>
                                                            @if($item->product->productImages)

                                                                <img src="{{ asset($item ->product->productImages[0]->image) }}" style="width: 150px; height: auto" alt="">
                                                            
                                                            @else
                                                                <img src="" style="width: 150px; height: auto" alt="">
                                                            
                                                            @endif
                                                    </td>

                                                    <td>

                                                        {{ $item->product->name }}
                                                                
                                                        @if($item->productColor)
                                                        
                                                                @if($item->productColor->color)

                                                                    <span>
                                                                    - Màu: {{$item->productColor->color->name  }}
                                                                    </span>

                                                                @endif
                                                        @endif
                                                        <td width="10%">{{ $item->price }}</td>
                                                        <td width="10%">{{ $item->quantity }}</td>
                                                        <td width="10%" class="fw-bold">{{ $item->price *$item->quantity }}</td>
                                                    @php    
                                                        $totalPrice+=$item->price *$item->quantity;
                                                    @endphp
                                                    
                                                    </td>
                                                </tr>           
                                                @endforeach
                                                <tr>
                                                    <td colspan="5">Tổng giá</td>
                                                    <td>{{  $totalPrice }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                
        
                                    </div>





                                
                            </div>
                    </div>


                    <div class="card mt-4 ">
                        <div class="card-body">
                            <h4>Quy trình đặt hàng (Cập nhật trạng thái đơn hàng)</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <label for="" class="form-label">Cập nhật trạng thái đơn hàng</label>
                                        <div class="input-group mt-3">
                                            <select name="oreder_status" class="form-select" id="">
                                                <option >-- Chọn --</option>
                                                <option value="Chưa giải quyết" {{ Request::get('status') == 'Chưa giải quyết' ? 'selected':'' }}>Chưa giải quyết</option>
                                                <option value="Đang xử lý" {{ Request::get('status') == 'Đang xử lý' ? 'selected':'' }}>Đang xử lý</option>
                                                <option value="Đang giao hàng" {{ Request::get('status') == 'Đang giao hàng' ? 'selected':'' }}>Đang giao hàng</option>
                                                <option value="Hoàn tất" {{ Request::get('status') == 'Hoàn tất' ? 'selected':'' }}>Hoàn tất</option> 
                                                <option value="Hủy bỏ" {{ Request::get('status') == 'Hủy bỏ' ? 'selected':'' }}>Hủy bỏ</option>
       
                                            </select>

                                            <button type="submit" class="btn btn-dark ">Update</button>
                                        </div>

                                    </form>
                                </div>
                                <br>
                                <div class="col-md-7">
                                    
                                    <h4 class="mt-3">
                                        Trạng thái đơn hàng: <span class="text-uppercase">{{$order->status_message}}</span>
                                    </h4>
                                </div>
                            </div>




                        </div>
                    </div>

     
     
     
    </div>
</div>
      

@endsection