@extends('receptionist.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Patient List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Patient Id</label>
                                    <input id="name" type="text" name="patientId" class="form-control"
                                           required placeholder="first name"
                                           value=" {{$patient->patientId}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">First Name</label>
                                    <input id="name" type="text" name="first_name" class="form-control"
                                           required placeholder="first name"
                                           value=" {{$patient->first_name}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Middle Name</label>
                                    <input id="name" type="text" name="middle_name" class="form-control"
                                           required placeholder="first name"
                                           value=" {{$patient->middle_name}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Last Name</label>
                                    <input id="name" type="text" name="last_name" class="form-control" required
                                           placeholder="first name"
                                           value=" {{$patient->last_name}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Mobile No</label>
                                    <input id="name" type="text" name="mobileno" class="form-control" required
                                           placeholder="first name"
                                           value=" {{$patient->mobileno}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Date of Birth</label>
                                    <input id="name" type="text" name="dob" class="form-control" required
                                           placeholder="first name"
                                           value=" {{$patient->dob}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Nationality</label>
                                    <input id="name" type="text" name="patient[nation]" class="form-control" required
                                           placeholder="first name"
                                           value=" {{$patient->nation}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-2">
                            <h5>Consultation</h5>
                            <div class="col-sm-6">
                                <!-- radio -->
                                <form action="{{route('radio')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="selection" value="consultation">
                                        <label class="form-check-label">Consultation</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="selection" value="non consultation">
                                        <label class="form-check-label">Non Consultation</label>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
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
