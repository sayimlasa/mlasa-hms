@extends('layouts.master')
@section('title')
    Create Role
@endsection

@component('components.datatable')@endcomponent
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Role
        @endslot
        @slot('title')
            create
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Create Role</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2 flex-wrap">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($errors->all() as $error)
                            <span class="fs-10 text-danger">{{ $error }}</span><br/>
                        @endforeach
                    </div>
                    <form action="{{route('role.save')}}" method="post" onsubmit="return validateforminputs(this)">
                        @csrf
                        <input type="hidden" name="role[id]" value="{{isset($role)?$role->id:''}}">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div>
                                    <label for="name" class="form-label">Role name</label>
                                    <input id="name" type="text" name="role[name]" class="form-control" required placeholder="eg. cashier, nurse"
                                           value="{{isset($role)?$role->name:request('name')}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="replicate" class="form-label">Replicate from</label>
                                    <select id="replicate" class="form-select" onchange="replicaterole()">
                                        <option value="">--replicate from--</option>
                                        @foreach($roles as $r)
                                            <option {{selected(request('replicateid'),$r->id)}} value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-primary" onclick="checkitems(true)"><i class="ri-check-line"></i> check all</button>
                            <button type="button" class="btn btn-dark" onclick="checkitems(false)"><i class="ri-close-line"></i> uncheck all</button>
                        </div>
                        <table id="" class="table nowrap align-middle table-sm table-bordered" style="width:100%;">
                            <thead>
                            <tr>
                                <th>Menu</th>
                                <th style="width: 40%">Submenu</th>
                                <th style="width: 45%">Permission</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($menus as $m)
                                <tr>
                                    <td class="fs-3" style="vertical-align: middle">
                                        <label class="form-check-label hstack gap-1 align-items-center">
                                            <span>{{$count++}}. {{$m->label}}</span>
                                            <input class="flex-shrink-0 me-2" type="checkbox" onchange="menuchecked(this)"
                                                   style="height: 25px;width: 25px;">
                                        </label>
                                    </td>
                                    <td style="vertical-align: top">
                                        @foreach($m->submenus->chunk(3) as $chunk)
                                            <div class="row mb-1">
                                                @foreach($chunk as $s)
                                                    <div class="col-lg-4">
                                                        <label class="form-check-label hstack align-items-center">
                                                            <input class="flex-shrink-0 me-2" type="checkbox" name="submenus[]" value="{{$s->id}}"
                                                                   {{isset($role)&&$role->submenus->contains($s->id)?'checked':''}}
                                                                   style="height: 15px;width: 15px;">
                                                            <span>{{$s->label}}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($m->permissions->chunk(3) as $chunk)
                                            <div class="row mb-1">
                                                @foreach($chunk as $p)
                                                    <div class="col-lg-4">
                                                        <label class="form-check-label hstack align-items-center" data-bs-toggle="tooltip" data-bs-placement="left"
                                                               title="{{$p->description}}">
                                                            <input class="flex-shrink-0 me-2" type="checkbox" name="permissions[]" value="{{$p->id}}"
                                                                   {{isset($role)&&$role->permissions->contains($p->id)?'checked':''}}
                                                                   style="height: 15px;width: 15px;">
                                                            <span>{{$p->label}}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-success btn-load btn-lg save-btn">
                                 <span class="d-flex align-items-center">
                                     <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status" style="display: none"></span>
                                     <span class="flex-grow-1">Save</span>
                                 </span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script>
        initToolTips();

        function replicaterole() {
            let replicateid = $('#replicate').val();
            let name = $('#name').val();
            let url = `{{route('role.create',isset($role)?$role->id:'')}}/?name=${name}&replicateid=${replicateid}`;
            // console.log(url);
            window.location.replace(url);
        }

        function checkitems(check) {
            $('input:checkbox').prop('checked', check);
        }

        function menuchecked(menu) {
            $(menu).closest('tr').find('input:checkbox').prop('checked', $(menu).is(':checked'));
        }

        function validateforminputs(form) {
            $(form).find('.save-spinner').show();
            $(form).find('.save-btn').prop('disabled', true);
        }
    </script>
@endsection
