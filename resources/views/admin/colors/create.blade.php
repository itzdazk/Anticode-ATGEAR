{{-- create color --}}
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                    <h3>Thêm màu sản phẩm
                        <a href="{{ url('admin/colors') }}" class="btn btn-dark btn-sm float-end">
                            Back
                        </a>
                        
                    </h3>

            </div>
            <div class="card-body">
                <form action="{{ url('admin/colors/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Tên màu</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class=" col-md-6 mb-3">
                            <label for="">Mã màu (ex:black)</label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class=" col-md-12 mb-3">
                            <label for="">Trạng thái</label> <br>
                            <input type="checkbox" name="status" style="width:50px;height:50px"> Checked = Hidden, UnChecked = Visible
                        </div>
                        <div class=" col-md-12 mb-3">
                            <button type="submit" class="btn btn-dark flex-end">Save</button>
                        </div>
                    </div> 
                    </form>
            </div>


        </div>
    </div>
</div>
@endsection