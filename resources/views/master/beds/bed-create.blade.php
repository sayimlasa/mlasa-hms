@extends('home')
@section('content')
    <div class="card card-breadcrumb ">
        <div class="card-header">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@if(isset($bed))
                            Edit
                        @else
                            Create
                        @endif Bed</h5>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
            <form action="{{route('bed.save')}}" method="post" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="bed[id]" value="{{isset($bed)?$bed->id:''}}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Bed Name</label>
                            <input id="username" type="text" name="bed[name]" class="form-control" required
                                   placeholder="Enter Bed"
                                   value="{{isset($bed)?$bed->name:''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="roomid" class="form-label">Ward Name</label>
                            <select id="roomid" name="bed[roomid]" class="form-select form-control" required>
                                <option value="">--select ward--</option>
                                @foreach($rooms as $r)
                                    <option {{selected(isset($bed)?$bed->roomid:'',$r->id)}} value="{{$r->id}}">{{$r->name}}</option>
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
                                    <span class="flex-grow-1">{{ !isset($user->id) ? 'Save' : 'Update' }}</span>
                                </span>
                    </button>
                </div>
            </form>
            </form>
        </div>

@endsection

