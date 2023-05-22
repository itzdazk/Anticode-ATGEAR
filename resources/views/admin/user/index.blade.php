@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
        <div class="card-header">
                <h3>Users
                    <a href="{{ url('admin/users/create') }}" class="btn btn-dark btn-sm float-end">Add User</a>

                </h3>

        </div>
        <div class="card-body">
            <table class="table table-dark table-bordered table-striped">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>    
                <tbody>
                        @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>
                            @if($user->role_as =='0')
                                <label class="bg-black py-1 px-2 rounded-2">User</label>
                            @elseif($user->role_as='1')
                                <label class="bg-black py-1 px-2 rounded-2">Admin</label>
                            @else
                                <label class="bg-black py-1 px-2 rounded-2">None</label>
                            @endif
                           
                        </th>
                       


                        <td>
                        
                            <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-secondary">Sửa </a>
                            <a href="{{ url('admin/users/'.$user->id.'/delete') }}" class="btn btn-dark">
                                Xóa 
                            </a>
                        </td>
                  
                    </tr>

                        @endforeach
                </tbody>

            </table>
                <div>
                    {{ $users->links() }} 
                </div>
            </div>
        </div>
    </div>
</div>
        

@endsection