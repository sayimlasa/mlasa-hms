@extends('home')
@section('title')
    Role List
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card" id="user-list">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Roles</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2 flex-wrap">
                                @if(auth()->user()->isAdmin)
                                    <a href="{{route('roles.create')}}" class="btn btn-success"><i
                                            class="ri-add-line align-bottom me-1"></i> Create Role</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2"
                               class="table nowrap align-middle table-sm table-hover"
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Role name</th>
                                <th>User count</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($roles as $r)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->usercount>0?$r->usercount:''}}</td>
                                    <td>
                                        <div class="hstack gap-3">
                                            @if($r->id!=1)
                                                <a class="btn btn-primary btn-sm" href="{{route('role.edit',$r->id)}}"><i class="ri-pencil-line"></i> edit</a>
                                                @if($r->usercount==0)
                                                    <form action="{{route('role.delete',$r->id)}}" method="post" class="m-0 p-0"
                                                          onsubmit="return confirm('Do you want to delete this role?')">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm"><i class="ri-delete-bin-3-line"></i> delete</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
@endsection
