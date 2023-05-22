@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
        <div class="card-header">
                <h3>Sửa sản phẩm
                    <a href="{{ url('admin/products/') }}" class="btn btn-dark btn-sm float-end">
                        Back</a>
                </h3>

        </div>

            <div class="card-body">

                @if(session('message'))
                    <h4 class="alert alert-success mb-2">
                        {{ session('message') }}
                    </h4>
                @endif
         

                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    
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
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                    Màu sản phẩm</button>
                            </li>
         
                      
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                
                                
                                <div class="mb-3">
                                    <label for="">Loại</label>
                                    <select name="category_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                    <option 
                                    value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' :"" }}>
                                    {{ $category->name }} 
                                    </option>
                                    @endforeach
                                 </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for=""> Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $product->slug }}" required>
                                </div>


                                <div class="mb-3">
                                    <label for="">Chọn thương hiệu</label>
                                    <select name="brand" class="form-control" required>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' : "" }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                     </select>
                                   
                                </div>



                                <div class="mb-3">
                                    <label for="">Mô tả ngắn(500 từ)</label>
                                    <textarea name="small_description" class="form-control"  rows="4" required>{{ $product->small_description }} </textarea>
                                   
                                </div>

                                <div class="mb-3">
                                    <label for="">Mô tả chi tiết</label>
                                    <textarea name="description" class="form-control"  rows="4" required>{{ $product->description }} </textarea>
                                
                                </div>

                            </div>
                            <div class="tab-pane fade mt-4" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                


                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" required value="{{ $product->meta_title }}">
                                </div>


                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" class="form-control"  rows="4" required>{{ $product->meta_description }} </textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="">Meta Keyword </label>
                                    <input type="text" name="meta_keyword" class="form-control" required value="{{ $product->meta_keyword }}">
                                </div>





                            </div>
                            <div class="tab-pane fade mt-4" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Giá gốc </label>
                                            <input type="text" name="original_price" class="form-control" required value="{{ $product->original_price }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Giá bán </label>
                                            <input type="text" name="selling_price" class="form-control" required  value="{{ $product->selling_price }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Số lượng</label>
                                            <input type="number" name="quantity" class="form-control" required value="{{ $product->quantity }}"> 
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" value="{{ $product->trending =='1' ? 'checked' :'' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trạng thái</label>
                                            <input type="checkbox" name="status" value="{{ $product->status =='1' ? 'checked' :'' }}">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade mt-4" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Upload Product Image</label><br>
                                    <input type="file" name="image[]" multiple class="f-control" >
                                    
                               
                                </div>
                                <div>
                                    @if($product->productImages)
                                    <div class="row">
                                        @foreach($product->productImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{ asset($image->image) }}" alt="" style="width: 80px; height:80px"
                                            class="me-4 border"/>
                                            <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">REMOVE</a>
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <h5>No Image Added</h5>
                                    @endif
                                </div>
                            
                            </div>

                            <div class="tab-pane fade mt-4" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <div class="row">
                                    <h4>Add Product Color</h4>
                                    <label for="">Select Color</label><br>
                                    <hr>
                                        @forelse($colors as $color)
                                        <div class="col-6 col-md-3">
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

                                <div class="table-responsive">
                                    <table class="table table-sm table-stripped table-dark table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $prodColor)

                                            <tr class="prod-color-tr">
                                                
                                                <td>
                                                    @if($prodColor->color)
                                                    {{ $prodColor->color->name }}
                                                    @else
                                                    No Color Found
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="input-group mb-3" style="width: 150px">  
                                                        <input type="text" value="{{ $prodColor->quantity }}" class="productColorQuantity form-control form-control-sm">
                                                        <button type="button" value="{{ $prodColor->id }}"  class="updateProductColorBtn btn btn-secondary btn-sm text-white">Update</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" value="{{ $prodColor->id }}" class="deleteProductColorBtn btn btn-dark btn-sm text-white">Delete</button>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                </div>


                            </div>

                        <div >
                            <button type="submit" class="btn btn-dark float-end">Update</button>

                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
        });


        $(document).on('click','.updateProductColorBtn',function(){

            var product_id="{{ $product->id }}"
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();

            if(qty <=0)
            {
                alert('Quantity is required');
                return false;
            }


            var data =
                {
                    'product_id':product_id,
                    'qty':qty
                };

            console.log(data);

            $.ajax({
                type:"POST",
                url:"/admin/product-color/"+prod_color_id,
                data: data,
                success: function (response){
                    alert(response.message)
                }
        });


        });

        $(document).on('click','.deleteProductColorBtn',function(){

                   
                    var prod_color_id = $(this).val();
                    var thisClick = $(this)
        
                    
                    $.ajax({
                        type:"GET",
                        url:"/admin/product-color/"+prod_color_id+"/delete",
                        success: function (response){
                            thisClick.closest('.prod-color-tr').remove();
                            alert(response.message);
                        }
                    });


});


    });
</script>

@endsection