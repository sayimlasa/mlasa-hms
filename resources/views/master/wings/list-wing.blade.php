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
                        <h5 class="card-title mb-0 flex-grow-1">Wings</h5>
                        @if(auth()->user()->isAdmin)
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{route('wing.create')}}" class="btn btn-success">
                                        <i class="ri-add-line align-bottom me-1"></i> Create Wing</a>
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
                                <th>Wing Name</th>
                                <th></th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($wings as $wing)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$wing->name}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="{{ route('wing.destroy',$wing->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('wing.edit',$wing->id) }}">Show</a>

                                            <a class="btn btn-primary" href="{{ route('wing.edit',$wing->id) }}">Edit</a>

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
