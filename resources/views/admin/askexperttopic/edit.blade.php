@extends('layouts.app')

@section('title','Edit Consultation Topic')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Consultation Topic</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Consultation Topic
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('askexperttopic.update',$topic->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Icon Class</label>
                                            <input class="form-control" name="icon" value="{{ $topic->icon }}" placeholder="fas fa-question-circle" />
                                            <p class="help-block">FontAwesome icon class. Visit <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" value="{{ $topic->title }}" placeholder="Topic Title" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Details <span class="text-danger">*</span></label>
                                            <textarea class="form-control ckeditor" name="details" rows="5" placeholder="Topic details" required>{{ $topic->details }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="{{ $topic->order }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>

                                        <a href="{{ route('askexperttopic.index') }}" class="btn btn-danger">Back</a>
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

