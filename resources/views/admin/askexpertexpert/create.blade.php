@extends('layouts.app')

@section('title','Add Expert')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Expert</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Expert
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('askexpertexpert.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input class="form-control" name="name" placeholder="Expert Name" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                            <input class="form-control" name="designation" placeholder="Expert Designation" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image" accept="image/*" />
                                            <p class="help-block">Upload expert image (JPG, PNG, max 2MB)</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="0" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>

                                        <a href="{{ route('askexpertexpert.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

