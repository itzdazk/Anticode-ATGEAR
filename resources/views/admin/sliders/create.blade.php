@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                    <h3>Thêm slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-dark btn-sm float-end">
                            Back
                        </a>
                        
                    </h3>

            </div>
            <div class="card-body">
                <form action="{{ url('admin/sliders/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class=" col-md-12 mb-3">
                            <label for="">Mô tả</label>
                            <textarea name="description" class="form-control"  rows="3" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Hình</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class=" col-md-12 mb-3">
                            <label for="">Trạng thái</label> <br>
                            <input type="checkbox" name="status" style="width:30px;height:30px">
                             Checked = Hidden, UnChecked = Visible
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