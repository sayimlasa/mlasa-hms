@extends('home')
@section('content')
    <div class="card card-breadcrumb ">
        <div class="card-header">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@if(isset($user))
                            Edit
                        @else
                            Create
                        @endif User</h5>
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
            <form action="{{route('user.save')}}" method="post" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="user[id]" value="{{isset($user)?$user->id:''}}">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" name="user[username]" class="form-control" required
                                   placeholder="username"
                                   value="{{isset($user)?$user->username:''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input id="fname" type="text" name="user[fname]" class="form-control" required
                                   placeholder="first name"
                                   value="{{isset($user)?$user->fname:''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="lname">Last name</label>
                            <input id="lname" type="text" name="user[lname]" class="form-control" required
                                   placeholder="last name"
                                   value="{{isset($user)?$user->lname:''}}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="user[email]" class="form-control" placeholder="email"
                                   value="{{isset($user)?$user->email:''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="mobileno" class="form-label">Mobile no</label>
                            <input id="mobileno" type="text" name="user[mobileno]" class="form-control"
                                   placeholder="Mobile no"
                                   value="{{isset($user)?$user->mobileno:''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="dob" class="form-label">DOB</label>
                            <input id="dob" type="date" name="user[dob]" class="form-control" required
                                   max="{{date('Y-m-d')}}"
                                   value="{{isset($user)?$user->dob:''}}">
                        </div>
                    </div>

                        <div class="col-md-4">
                            <div>
                                <label for="roleid" class="form-label">Role</label>
                                <select id="roleid" name="user[roleid]" class="form-select form-control" required>
                                    <option value="">--select role--</option>
                                    @foreach($roles as $r)
                                        <option {{isset($user)?$user->roleid:'',$r->id}} value="{{$r->id}}">{{$r->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" name="user[gender]" class="form-select form-control" required>
                                <option value="">--select gender--</option>
                                <option
                                    {{isset($user)?$user->gender:'',\App\Models\User::GENDER_MALE}} value="{{\App\Models\User::GENDER_MALE}}">{{\App\Models\User::GENDER_MALE}}</option>
                                <option
                                    {{isset($user)?$user->gender:'',\App\Models\User::GENDER_FEMALE}} value="{{\App\Models\User::GENDER_FEMALE}}">{{\App\Models\User::GENDER_FEMALE}}</option>
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

