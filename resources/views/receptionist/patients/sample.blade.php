@extends('index')
@section('content')
    <div class="card card-breadcrumb ">
        <div class="card-header">
            <h3 class="card-title">Consultation</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
            <form action="{{route('location.save')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Doctor Name</label>
                            <select class="form-control select2" required>
                                <option value=""> select doctor</option>
                                @foreach($users as $r)
                                    <option selected="selected" value="{{$r->id}}">{{$r->fullname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Doctor Type</label>
                            <select class="form-control select2" required>
                                <option value=""> select doctor type</option>
                                @foreach($doctor as $d)
                                    <option selected="selected" value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 pb-3">
                    <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($location->id) ? 'Save' : 'Update' }}</span>
                                </span>
                    </button>
                </div>
            </form>
            </form>
        </div>
@endsection

