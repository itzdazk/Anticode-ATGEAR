@extends('layouts.app')


@section('title','Order')


@section('content')

        <div class="py-3 py-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="mb-4">
                                Quản lý đơn hàng
                            </h4>
                            <hr>

                            <div class="table-responsive">
                                <table class="table table-dark table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Tracking code</th>
                                            <th>Username</th>
                                            <th>PTTT</th>
                                            <th>Ngày đặt</th>
                                            <th>Trạng thái</th>
                                            <th>Action</th>
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
                                            <td> <span class="bg-white py-1 px-2 rounded-2 text-black">
                                                {{ $item->status_message }}
                                                </span> </td>
                                            <td>
                                                <a href="{{ url('orders/'.$item->id) }}" class="btn btn-dark btn-sm">View</a>
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
        </div>

@endsection