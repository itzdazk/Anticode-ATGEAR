@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                    <h3>Sliders
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-dark btn-sm float-end">
                            Thêm Slider
                        </a>

                    </h3>

            </div>
            <div class="card-body">
                <table class="table table-dark table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả </th>
                        <th>Hình</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>    
                    <tbody>
                            @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }} </td>
                            <td>{{ $slider->title }} </td>
                            <td>{{ $slider->description }} </td>
                            <td>
                                <img src="{{ asset("$slider->image")  }}" class="rounded-0" alt="Slider" style="width:170px;height:auto">
                            </td>
                            <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }} </td>
                           
                            <td>
                            
                                <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-secondary">
                                    Sửa </a>
                                <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" class="btn btn-dark">
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