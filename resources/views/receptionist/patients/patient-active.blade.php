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
                                <th>Last Name</th>
                                <th>Mobile Number</th>
                                <th>Date Birth</th>
                                <th>Nationality</th>
                                <th>Doctor Name</th>
                                <th>Doctor Type</th>
                                <th>Consultation Fee</th>
                                <th>Status</th>
                                <th class="col-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($patient as $p)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$p->pfname}}</td>
                                    <td>{{$p->plname}}</td>
                                    <td>{{$p->pmobileno}}</td>
                                    <td>{{$p->pdob}}</td>
                                    <td>{{$p->pnation}}</td>
                                    <td>{{$p->dfname}} {{$p->dfname}}</td>
                                    <td>{{$p->doctor_type_name}}</td>
                                    <td>{{$p->consultation_fee}}</td>
                                    <td>{{$p->status}}</td>
                                    <td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->roleid==2)
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
                                                    <a class="dropdown-item" href="{{route('doctor.form',$p->id)}}"><i
                                                            class="fa fa-eye"></i></a>
                                                    <form action="{{ route('patient.destroy',$p->id) }}" method="post">
                                                        @csrf
                                                        <button class="dropdown-item"><i
                                                                class="ri-lock-unlock-line fa fa-trash-alt"></i>
                                                        </button>
                                                    </form>

                                            </div>
                                        </div>
                                        @endif


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
