@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
        <div class="card-header">
                <h3>Sản phẩm
                    <a href="{{ url('admin/products/create') }}" class="btn btn-dark btn-sm float-end">Thêm sản phẩm</a>

                </h3>

        </div>
        <div class="card-body">
            <table class="table table-dark table-bordered table-striped">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Loại</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>    
                <tbody>
                        @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }} </td>
                        <td>
                            @if($product->category)
                            {{ $product->category->name }} 
                            @else
                                Không
                            @endif
                        </td>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->selling_price }} </td>
                        <td>{{ $product->quantity }} </td>
                        <td>{{ $product->status == '1' ? 'Ẩn' : 'Hiện' }} </td>
                       
                        <td>
                        
                            <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-secondary">Sửa </a>
                            <a href="{{ url('admin/products/'.$product->id.'/delete') }}" class="btn btn-dark">
                                Xóa 
                            </a>
                        </td>
                  
                    </tr>

                        @endforeach
                </tbody>

            </table>
                <div>
                    {{ $products->links() }} 
                </div>
    </div>
        </div>
    </div>
</div>
        

@endsection