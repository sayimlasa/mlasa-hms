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
                        <form action="{{route('technician.save')}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Patient Id</label>
                                        <input id="name" type="text" name="patientId" class="form-control"
                                               required placeholder="first name"
                                               value=" {{$patient->pfirstname}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Middle Name</label>
                                        <input id="name" type="text" name="middle_name" class="form-control"
                                               required placeholder="first name"
                                               value=" {{$patient->pmiddlename}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Last Name</label>
                                        <input id="name" type="text" name="last_name" class="form-control" required
                                               placeholder="first name"
                                               value=" {{$patient->plastname}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Mobile No</label>
                                        <input id="name" type="text" name="mobileno" class="form-control" required
                                               placeholder="first name"
                                               value=" {{$patient->pmobileno}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">suggestion disease</label>
                                        <input id="name" type="text" name="disease" class="form-control"
                                               required
                                               placeholder="Describe information from patient"
                                               value="{{$patient->disease}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Description</label>
                                        <textarea id="name" type="text" name="description" class="form-control"
                                                  required
                                                  placeholder="Describe information from patient"
                                                  value="{{$patient->description}}" readonly>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Technician assessment</label>
                                        <textarea id="name" type="text" name="description" class="form-control"
                                                  required
                                                  placeholder="Describe information from patient">
                                            </textarea>
                                    </div>
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
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
