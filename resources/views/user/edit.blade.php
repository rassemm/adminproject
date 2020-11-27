@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Edit User {{ $user->name }}</h1>
            <form action="{{ route('user.update',$user->id) }}" method="POST">
                @csrf
    @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name"  class="form-control" value="{{ $user->name }}">

                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" disabled class="form-control" value="{{ $user->email }}">

                </div>
                <div class="form-group">
                    <label>Roles</label>
                    <div class="checkbox">
                        <label >
                            <input type="checkbox"  name="roles[]" value="super_admin" {{ $user->hasRole('super_admin') ? 'checked' :''}}> super admin
                        </label>
                    </div>
                    <div class="checkbox">
                        <label >
                            <input type="checkbox" name="roles[]" value="user" {{ $user->hasRole('user') ?'checked' :''}}> User
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" class="submit">update</button>

                </div>
            </form>
  
        </div>
    </div>
</div>
    
@endsection