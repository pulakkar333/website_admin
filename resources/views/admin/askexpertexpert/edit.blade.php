@extends('layouts.app')

@section('title','Edit Expert')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Expert</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Expert
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('askexpertexpert.update',$expert->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input class="form-control" name="name" value="{{ $expert->name }}" placeholder="Expert Name" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                            <input class="form-control" name="designation" value="{{ $expert->designation }}" placeholder="Expert Designation" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Current Image</label><br>
                                            @if($expert->image)
                                                <img src="{{ asset($expert->image) }}" class="img-thumbnail" width="150" />
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Change Image</label>
                                            <input type="file" class="form-control" name="image" accept="image/*" />
                                            <p class="help-block">Upload new expert image (JPG, PNG, max 2MB)</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="{{ $expert->order }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $expert->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $expert->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>

                                        <a href="{{ route('askexpertexpert.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
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

