@extends('home')
@section('title')
    Edit wing
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card" id="user-list">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">
                            @if (isset($wing))
                                Edit
                            @else
                                Create
                            @endif Wing
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($errors->all() as $error)
                            <span class="fs-10 text-danger">{{ $error }}</span><br />
                        @endforeach
                    </div>

                    <form action="{{route('wing.update',$wing->id)}}" method="post" onsubmit="return validateforminputs(this)">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Wing Name</label>
                                    <input id="name" type="text" name="name" class="form-control" required placeholder="name" value="{{$wing->name}}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-5 pb-3">
                                <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($wing->id) ? 'Save' : 'Update' }}</span>
                                </span>
                                </button>
                            </div>
                    </form>


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
