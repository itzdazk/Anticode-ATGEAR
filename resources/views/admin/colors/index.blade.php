@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                    <h3>Màu
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-dark btn-sm float-end">Thêm màu</a>

                    </h3>

            </div>
            <div class="card-body">
                <table class="table table-dark table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Tên màu</th>
                        <th>Mã màu </th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>    
                    <tbody>
                            @foreach ($colors as $color)
                        <tr>
                            <td>{{ $color->id }} </td>
                            <td>{{ $color->name }} </td>
                            <td>{{ $color->code }} </td>
                            <td>{{ $color->status == '1' ? 'Ẩn' : 'Hiện' }} </td>
                           
                            <td>
                            
                                <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="btn btn-secondary">
                                    Sửa </a>
                                <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" class="btn btn-dark">
                                    Xóa 
                                </a>
                            </td>
                      
                        </tr>
    
                            @endforeach
                    </tbody>
    
                </table>




            </div>


        </div>
    </div>
</div>
@endsection