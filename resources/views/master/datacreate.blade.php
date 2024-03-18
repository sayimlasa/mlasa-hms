@extends('home')
@section('content')
    <div class="card card-breadcrumb ">
        <div class="card-header">
            <h3 class="card-title">Add Branch</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 pb-3">
                    <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($branch->id) ? 'Save' : 'Update' }}</span>
                                </span>
                    </button>
                </div>
            </form>
            </form>
        </div>

@endsection

