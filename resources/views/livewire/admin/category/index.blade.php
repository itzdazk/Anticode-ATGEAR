
<div>

<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div class="card">
        <div class="card-header">
                <h4>Loại sản phẩm
                    <a href="{{ url('admin/category/create') }}" class="btn btn-dark btn-sm float-end">Thêm loại</a>

                </h4>

        </div>
        <div class="card-body">
                <table class="table table-dark table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Tên loại</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>    
                    <tbody>
                            @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }} </td>
                            <td>{{ $category->name }} </td>
                            <td>{{ $category->status == '1' ?'Hiện':'Ẩn' }} </td>
                            <td>
                              
                                <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-secondary">Sửa </a>
                                <a href="#" wire:click="deleteCategory({{$category->id}})" class="btn btn-dark">Xóa </a>
                            </td>
                        </tr>

                            @endforeach
                    </tbody>

                </table>
                    <div>
                        {{ $categories->links() }} 
                    </div>
        </div>
    </div>
    </div>
</div>
</div>