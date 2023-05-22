{{-- Tạo cate --}}

@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
        <div class="card-header">
                <h3>Thêm loại sản phẩm
                    <a href="{{ url('admin/category') }}" class="btn btn-dark btn-sm float-end">Back</a>

                </h3>

        </div>
        <div class="card-body">
            <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Tên loại</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Mô tả</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Hình</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="" >Status</label><br/>
                        <input type="checkbox" name="status" >
                        <br>
                        Check = Hiện loại , Uncheck = Ẩn loại
                    </div>
                    <div class="col-md-12 mb-3">
                        <h4>SEO Tags</h4>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" required>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3" required></textarea>
                      
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