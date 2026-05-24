@extends('layouts.app')

@section('title', 'Add Client Testimonial')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Add Client Testimonial</h2>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create New Client Testimonial
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.client-testimonial.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label>Title *</label>
                                        <input class="form-control" name="title" value="{{ old('title') }}"
                                               placeholder="e.g., Dhaka Medical College Hospital" required/>
                                        <small class="form-text text-muted">Client or hospital name</small>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Details *</label>
                                        <textarea class="form-control" name="details" rows="6"
                                                  placeholder="Enter testimonial message here..." required>{{ old('details') }}</textarea>
                                        <small class="form-text text-muted">The testimonial quote/message</small>
                                        @error('details')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Display Order *</label>
                                        <input type="number" class="form-control" name="order"
                                               value="{{ old('order', 1) }}" placeholder="e.g., 1, 2, 3"
                                               min="0" required/>
                                        <small class="form-text text-muted">Lower numbers appear first</small>
                                        @error('order')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="status" value="1"
                                                   {{ old('status', 1) ? 'checked' : '' }}/>
                                            Active
                                        </label>
                                        <small class="form-text text-muted">Only active testimonials will be shown on the website</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Testimonial</button>
                                    <a href="{{ route('admin.client-testimonial.index') }}" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

