@extends('home')
@section('title')
    Branches List
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card" id="user-list">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Branches</h5>
                        @if(auth()->user()->isAdmin)
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ route('branches.create') }}" class="btn btn-success">
                                        <i class="ri-add-line align-bottom me-1"></i> Create Branch</a>
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
                                <th>Branch name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($branches as $branch)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$branch->name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-soft-dark btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            @if(auth()->user()->isAdmin)
                                                <a class="dropdown-item"
                                                   href="{{ route('branches.create', ['branchid'=>$branch->id]) }}"><i
                                                        class="ri-pencil-line"></i> edit</a>
                                            @endif

                                            <form action="{{ route('branches.destroy',$branch->id) }}"
                                                  method="post">
                                                @csrf
                                                <button class="dropdown-item"><i
                                                        class="ri-lock-unlock-line"></i> Delete
                                                </button>
                                            </form>
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
