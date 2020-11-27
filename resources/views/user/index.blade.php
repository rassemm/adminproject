@extends('admin.dashboard')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Users Managment</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width: 280px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $index=>$user)
                   <tr>
                       <td>{{ $index +1 }}</td>
                       <td>{{ $user->name}}</td>
                        <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                <label class="badge badge-success">{{ $role->display_name }}</label>
                                    
                                @endforeach
                            </td>
                                <td>
                                    <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-sm"> Edit</a>
                                </td>
                   </tr>
                    
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
    
@endsection