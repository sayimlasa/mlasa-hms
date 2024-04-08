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
