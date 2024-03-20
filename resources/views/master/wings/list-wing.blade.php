@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Wing List</h3>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('wing.create')}}" >Add Wing</a></li>
                            {{--                                class="btn btn-primary" data-toggle="modal" data-target="#modal-default"--}}
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
                                <th>S/N</th>
                                <th>Wing Name</th>
                                <th class="col-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                                @foreach($wings as $wing)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$wing->name}}</td>
                                        <td>
                                            <div class="btn-group hstack gap-3">
                                                <button type="button" class="btn btn-success btn-flat">Action</button>
                                                <button type="button"
                                                        class="btn btn-success btn-flat dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{route('wing.edit',$wing->id)}}"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('wing.destroy',$wing->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"><i
                                                                class="ri-lock-unlock-line fa fa-trash-alt"></i>
                                                        </button>
                                                    </form>
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
    @include('modal.wardcreate')
@endsection

