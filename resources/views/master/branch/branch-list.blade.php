@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if(auth()->user()->isAdmin)
                            <h3 class="card-title">Branch List</h3>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('branch.create')}}">Add Branch</a></li>
                            </ol>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch Name</th>
                                <th class="col-2"></th>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
