@extends('layouts.app')


@section('title','Thank You')


@section('content')
{{-- sau khi checkout --}}
    <div class="mt-5 py-5">
        <div class="row py-5 shadow-lg">
            <div class="col text-center">
                <h1>Cảm ơn bạn đã mua hàng ở AT Gear</h1>
                <h4>Đơn hàng sẽ nhanh chóng được xử lý vào giao đến bạn</h4>
                <h5>Vui lòng chuẩn bị đủ số tiền thanh toán</h5>
                <h4>Bạn có thể theo dõi đơn hàng tại <a href="/orders">đây</a></h4>
                <a href="{{ url('/') }}" class="py-2 px-3 btn-dark btn">Tiếp tục mua hàng</a>
            </div>
        </div>
    </div>
 

@endsection