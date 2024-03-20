@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Role List</h3>
                        @if(auth()->user()->isAdmin)
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('roles.create')}}">Add Role</a></li>
                            </ol>
                        @endif
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
                                <th>Role name</th>
                                <th>User count</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($roles as $r)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->usercount>0?$r->usercount:''}}</td>
                                    <td>
                                            @if($r->id!=1)
                                            <div class="hstack gap-3">
                                                <a class="btn btn-primary btn-sm" href="{{route('role.edit',$r->id)}}"><i class="ri-pencil-line"></i> edit</a>
                                                @if($r->usercount==0)
                                                    <form action="{{route('role.delete',$r->id)}}" method="post" class="m-0 p-0"
                                                          onsubmit="return confirm('Do you want to delete this role?')">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm"><i class="ri-delete-bin-3-line"></i> delete</button>
                                                    </form>
                                                @endif
                                            @endif
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
