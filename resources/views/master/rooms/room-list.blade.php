@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Room List</h3>
                        @if(auth()->user()->isAdmin)
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('room.create')}}">Add Room</a></li>
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
                                <th>Room Name</th>
                                <th>Ward Name</th>
                                <th class="col-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($rooms as $w)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$w->name}}</td>
                                    <td>{{$w->ward_name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-flat">Action</button>
                                            <button type="button"
                                                    class="btn btn-success btn-flat dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            @if(auth()->user()->isAdmin)
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{route('room.edit',$w->id)}}"><i class="fa fa-edit"></i></a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-trash-alt"></i></a>
                                            </div>
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
