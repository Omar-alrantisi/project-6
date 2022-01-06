@extends('dashboard.layouts.master')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Example Form</div>
        <div class="card-body card-block">
            <form action="{{route('user.update',['id'=>$user->id])}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" id="name" name="name" value="{{$user->name}}" placeholder="Admin Name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" id="name" name="email" value="{{$user->email}}" placeholder="Admin Email" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="password" id="name" name="password" value="{{$user->password}}" placeholder="Password" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <select name="usertype" id="inputState" class="form-control">
                      <option selected>Choose UserType</option>
                      <option value="1">Admin</option>
                      <option value="0">User</option>
                    </select>

                 </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
