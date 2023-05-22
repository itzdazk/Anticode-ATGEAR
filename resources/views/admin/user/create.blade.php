@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        

        <div class="card">
        <div class="card-header">
                <h3>Add Users
                    <a href="{{ url('admin/users') }}" class="btn btn-dark btn-sm float-end">Back</a>

                </h3>

        </div>
        <div class="card-body">

            <form action="{{ url('admin/users/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Email</label>
                        <textarea name="email" class="form-control"  rows="3" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Mật khẩu</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Select Role</label> <br>
                        <select name="role_as" id="" class="form-select">
                            <option value="">Chọn Role</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>


                        </select>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <button type="submit" class="btn btn-dark float-end">Save</button>
                    </div>
                </div> 
            </form>

        </div>
    </div>
</div>
</div>
    

@endsection