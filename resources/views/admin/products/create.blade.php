@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif



        <div class="card">
        <div class="card-header">
                <h3>Thêm sản phẩm
                    <a href="{{ url('admin/products/') }}" class="btn btn-dark btn-sm float-end">
                        Back</a>
                </h3>

        </div>

            <div class="card-body">


                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Chi tiết</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Hình sản phẩm</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Màu sản phẩm</button>
                            </li>
                      
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                
                                
                                <div class="mb-3">
                                    <label for="">Loại</label>
                                    <select name="category_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                 </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control " required>
                                </div>

                                <div class="mb-3">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="form-control" required>
                                </div>


                                <div class="mb-3">
                                    <label for="">Chọn thương hiệu</label>
                                    <select name="brand" class="form-control" required>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                     </select>
                                   
                                </div>



                                <div class="mb-3">
                                    <label for="">Mô tả ngắn(500 từ)</label>
                                    <input type="text" name="small_description" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="">Mô tả chi tiết</label>
                                    <input type="text" name="description" class="form-control" required>
                                </div>

                            </div>
                            <div class="tab-pane fade mt-4" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                


                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" required>
                                </div>


                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="">Meta Keyword </label>
                                    <input type="text" name="meta_keyword" class="form-control" required>
                                </div>





                            </div>
                            <div class="tab-pane fade mt-4" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Giá gốc </label>
                                            <input type="text" name="original_price" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Giá bán </label>
                                            <input type="text" name="selling_price" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Số lượng</label>
                                            <input type="number" name="quantity" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trạng thái</label>
                                            <input type="checkbox" name="status" >
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade mt-4" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Upload Product Image</label><br>
                                    <input type="file" name="image[]" multiple class="form-control" required>
                                </div>
                                
                            
                            </div>

                            <div class="tab-pane fade mt-4" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <div class="row">
                                    <label for="">Select Color</label><br>
                                    <hr>
                                        @forelse($colors as $color)
                                        <div class="col-md-3">
                                            <div class="p-2 border">
                                                Color: <input type="checkbox" name="colors[{{ $color->id }}]" value="{{ $color->id }}" >
                                                <span class="ms-2">
                                                    {{ $color->name }}
                                                </span>
                                                <br/>
                                                Quantity <input type="number" name="colorquantity[{{ $color->id }}]" style="width: 60px;height:30px; border:1px solid">
                                            </div>

                                        </div>
                                        @empty
                                        <div class="col-md-12">
                                            <h1>No colors found</h1>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        <div >
                            <button type="submit" class="btn btn-dark">Submit</button>

                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection