@extends('dashboard.layouts.master')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Example Form</div>
        <div class="card-body card-block">
            <form action="{{route('user.store')}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" id="name" name="name"  placeholder="Name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" id="name" name="email"  placeholder="Email" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="password" id="name" name="password"  placeholder="Password" class="form-control">
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

    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>User Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        @if($user->usertype == 1)
                        <td>Admin</td>
                         @else 
                        <td>User</td>
                        @endif
                        <td><a href="{{route('user.edit',['id'=>$user->id])}}"><i class="far fa-edit"></i></a></td>
                        <td><a href="{{route('user.destroy',['id'=>$user->id])}}"><i class="cursor-pointer fas fa-trash text-secondary"></i></a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
@endsection
