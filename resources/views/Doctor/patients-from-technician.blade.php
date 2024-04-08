@extends('receptionist.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Patient List</h3>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('patient.create')}}">Add New Patient</a></li>
                        </ol>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Mobile Number</th>
                                <th>Disease</th>
                                <th>Description</th>
                                <th>Time Creation</th>
                                <th class="col-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($patients as $p)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$p->pfirstname}}</td>
                                    <td>{{$p->pmiddlename}}</td>
                                    <td>{{$p->plastname}}</td>
                                    <td>{{$p->pmobileno}}</td>
                                    <td>{{$p->adisease}}</td>
                                    <td>{{$p->adescription}}</td>
                                    <td>{{$p->created_at}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-flat">Action</button>
                                            <button type="button"
                                                    class="btn btn-success btn-flat dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{route('patient.edit',$p->id)}}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="dropdown-item" href="{{route('technician.form',$p->id)}}"><i
                                                        class="fa fa-eye"></i></a>
                                                <form action="{{ route('patient.destroy',$p->id) }}" method="post">
                                                    @csrf
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
@endsection
