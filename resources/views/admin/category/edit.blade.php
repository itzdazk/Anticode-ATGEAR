{{-- edit cate --}}

@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
        <div class="card-header">
                <h3>Cập nhật loại sản phẩm
                    <a href="{{ url('admin/category') }}" class="btn btn-dark btn-sm float-end">Back</a>

                </h3>

        </div>
        <div class="card-body">
            <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Tên loại sản phẩm</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" required>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Mô tả</label>
                        <input type="text" name="description" value="{{ $category->description }}" class="form-control" required>
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Hình</label>
                        <input type="file" name="image" class="form-control" >
                        <img src="{{ asset("$category->image") }}"width="270px" height="auto" />
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Trạng thái</label><br/>
                        <input type="checkbox" name="status" {{ $category->status =='1' ? 'checked':'' }}>
                    
                    </div>
                    <div class="col-md-12 mb-3">
                        <h4>SEO Tags</h4>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control" required>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword"  class="form-control" rows="3" required> {{ $category->meta_keyword }}</textarea>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description"  class="form-control" rows="3" required>{{ $category->meta_description }}</textarea>
                      
                    </div>
                    <div class=" col-md-12 mb-3">
                        <button type="submit" class="btn btn-dark flex-end">Update</button>
                    </div>
                </div> 
                </form>
        </div>
    </div>
    </div>
</div>

@endsection