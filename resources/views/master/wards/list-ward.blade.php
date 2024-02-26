@extends('home')
@section('title')
    Wing List
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card" id="user-list">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Wards</h5>
                        @if(auth()->user()->isAdmin)
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{route('ward.create')}}" class="btn btn-success">
                                        <i class="ri-add-line align-bottom me-1"></i> Create Ward</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id=""
                               class="table nowrap align-middle table-sm table-hover"
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ward Name</th>
                                <th>Wing Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($wards as $ward)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$ward->name}}</td>
                                    <td>{{$ward->wing_name}}</td>
                                    <td>active</td>
                                   
                                    <td>
                                        <form action="{{ route('ward.destroy',$ward->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('ward.edit',$ward->id) }}">Show</a>

                                            <a class="btn btn-primary" href="{{ route('ward.edit',$ward->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
