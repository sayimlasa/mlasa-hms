@extends('receptionist.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Patient Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <form action="{{route('assessment.save')}}" method="post">
                                @csrf
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
                                        <input id="name" type="text" name="patient[nation]" class="form-control"
                                               required
                                               placeholder="first name"
                                               value=" {{$patient->nation}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">suggestion disease</label>
                                        <input id="name" type="text" name="disease" class="form-control"
                                               required
                                               placeholder="Describe information from patient"
                                               value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Description</label>
                                        <textarea id="name" type="text" name="description" class="form-control"
                                                  required
                                                  placeholder="Describe information from patient"
                                                  value="">
                                            </textarea>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mt-5 pb-3">
                                    <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{'Save'}}</span>
                                </span>
                                    </button>
                                </div>
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
