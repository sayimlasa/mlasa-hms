
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-breadcrumb ">
                    <div class="card-header">
                        <h3 class="card-title">Add Ward</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div>
                            @foreach ($errors->all() as $error)
                                <span class="fs-10 text-danger">{{ $error }}</span><br/>
                            @endforeach
                        </div>
                        <form action="{{route('ward.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Ward Name</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-5 pb-3">
                                <button class="btn btn-success btn-load btn-lg save-btn " type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($ward->id) ? 'Save' : 'Update' }}</span>
                                </span>
                                </button>
                            </div>
                        </form>
                        </form>
                    </div>

                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
