@extends('layouts.app')

@section('title','Edit Eligibility Requirement')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Eligibility Requirement</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Requirement</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <form role="form" method="post" action="{{ route('eligibility-requirement.update', $requirement->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" value="{{ $requirement->title }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control ckeditor" rows="3" name="description" required>{{ $requirement->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="{{ $requirement->order }}" />
                                        </div>
                                        <a href="{{ route('eligibility-requirement.index') }}" class="btn btn-danger">Back</a>
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

