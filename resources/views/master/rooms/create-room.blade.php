@extends('home')
@section('content')
    <div class="card card-breadcrumb ">
        <div class="card-header">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@if(isset($room))
                            Edit
                        @else
                            Create
                        @endif Room</h5>
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
            <form action="{{route('room.save')}}" method="post" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="room[id]" value="{{isset($room)?$room->id:''}}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Room Name</label>
                            <input id="username" type="text" name="room[name]" class="form-control" required
                                   placeholder="room"
                                   value="{{isset($room)?$room->name:''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="wardid" class="form-label">Ward Name</label>
                            <select id="wardid" name="room[wardid]" class="form-select form-control" required>
                                <option value="">--select ward--</option>
                                @foreach($wards as $w)
                                    <option {{isset($room)?$room->wardid:'',$w->id}} value="{{$w->id}}">{{$w->name}}</option>
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

