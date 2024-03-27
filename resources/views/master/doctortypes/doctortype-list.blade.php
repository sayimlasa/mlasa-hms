@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if(auth()->user()->isAdmin)
                            <h3 class="card-title">DoctorType List</h3>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('doctor.type.create')}}">Add Doctor Type</a></li>
                            </ol>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message.closelog() }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>DoctorType Name</th>
                                <th class="col-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                                @foreach($doctor as $d)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-flat">Action</button>
                                                <button type="button"
                                                        class="btn btn-success btn-flat dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{route('doctor.type.edit',$d->id)}}"><i class="fa fa-edit"></i></a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-trash"></i></a>
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
