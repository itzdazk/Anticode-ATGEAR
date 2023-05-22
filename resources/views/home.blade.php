@extends('layouts.app')

@section('content')
<div class="container pt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thành công') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bạn đã đăng nhập') }}
                    <br>
                    <a href="/" class="btn btn-dark mt-3 w-50">Mua hàng ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
