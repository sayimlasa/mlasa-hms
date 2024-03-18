@extends('home')
@section('content')
    <div class="card card-breadcrumb ">
        <div class="card-header">
            <h3 class="card-title">Edit Location</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
            <form action="{{route('location.update',$location->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Location Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="name" value="{{$location->name}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Branch Name</label>

                            <select class="form-control select2" style="width: 100%;" name="branch_id" required>
                                <option value="">--select branch--</option>
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
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

