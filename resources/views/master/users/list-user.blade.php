@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                            <h3 class="card-title">User List</h3>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('user.create')}}">Add User</a></li>
                            </ol>

                    </div>
                    <!-- /.card-header -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Date Birth</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($users as $u)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$u->username}}</td>
                                    <td>{{$u->fullname}}</td>
                                    <td>{{$u->gender}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->mobileno}}</td>
                                    <td>{{$u->dob}}</td>
                                    <td>{{$u->rolename}}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-flat">Action</button>
                                            <button type="button"
                                                    class="btn btn-success btn-flat dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{route('user.edit',$u->id)}}">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
