@extends('receptionist.index')
@section('title')
    Create Patient
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card" id="user-list">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">
                            @if (isset($patient))
                                Edit
                            @else
                                Create
                            @endif Patient
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($errors->all() as $error)
                            <span class="fs-10 text-danger">{{ $error }}</span><br />
                        @endforeach
                    </div>

                    <form action="{{route('patient.save')}}" method="post" onsubmit="return validateforminputs(this)">
                        <input type="hidden" name="patient[id]" value="{{isset($patient)?$parent->i6:''}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">First Name</label>
                                    <input id="name" type="text" name="patient[first_name]" class="form-control" required placeholder="first name"
                                           value="{{isset($parent)?$parent->first_name:''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Middle Name</label>
                                    <input id="name" type="text" name="patient[middle_name]" class="form-control" required placeholder="middle name"
                                           value="{{isset($parent)?$parent->middle_name:''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Last Name</label>
                                    <input id="name" type="text" name="patient[last_name]" class="form-control" required placeholder="last name"
                                           value="{{isset($parent)?$parent->last_name:''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Date of Birth</label>
                                    <input id="name" type="date" name="patient[dob]" class="form-control" required placeholder="date of birth"
                                           value="{{isset($parent)?$parent->dob:''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Mobile Number</label>
                                    <input id="name" type="text" name="patient[mobileno]" class="form-control" required placeholder="Enter your mobile"
                                           value="{{isset($parent)?$parent->mobileno:''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Nationality</label>
                                    <input id="name" type="text" name="patient[nation]" class="form-control" required placeholder="Enter your nation"
                                           value="{{isset($parent)?$parent->nation:''}}">
                                </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center mt-5 pb-3">
                                <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($parent->id) ? 'Save' : 'Update' }}</span>
                                </span>
                                </button>
                            </div>
                    </form>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
    <!--end col-->
    </div>
    <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
@endsection
