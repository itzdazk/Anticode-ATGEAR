@extends('layouts.admin')


@section('title','Order')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
        <div class="card-header">
                <h3>Orders 
                  

                </h3>
                    </div>
                    <div class="card-body">

                 
                            <div class="table-responsive">
                                <table class="table table-dark table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Tài khoản</th>
                                            <th>PTTT</th>
                                            <th>Ngày đặt</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->payment_mode }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td> <span class="bg-white text-black px-2 py-2 rounded-2">
                                                {{ $item->status_message }}
                                                </span> 
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/orders/'.$item->id) }}" class="btn btn-dark btn-sm">Chi tiết</a>
                                            </td>

                                        </tr>


                                        @empty
                                            <tr>
                                                <td colspan="7">
                                                    Không có đơn hàng nào
                                                </td>
                                            </tr>
                                    

                                        @endforelse

                                    </tbody>


                                </table>
                                <div>
                                    {{ $orders->links() }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        

@endsection