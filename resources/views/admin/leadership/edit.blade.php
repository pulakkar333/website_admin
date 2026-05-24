@extends('layouts.app')

@section('title', 'Edit Leadership Member')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Edit Leadership Member</h2>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Update Leadership Member Information
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.leadership.update', $leadership->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input class="form-control" name="name" value="{{ $leadership->name }}"
                                               placeholder="e.g., John Doe" required/>
                                        <small class="form-text text-muted">Full name of the leader</small>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Designation *</label>
                                        <input class="form-control" name="designation" value="{{ $leadership->designation }}"
                                               placeholder="e.g., CEO, Managing Director" required/>
                                        <small class="form-text text-muted">Position or title</small>
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Details</label>
                                        <textarea class="form-control" name="details" rows="5"
                                                  placeholder="Bio or description">{{ $leadership->details }}</textarea>
                                        <small class="form-text text-muted">Brief biography or description (optional)</small>
                                        @error('details')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Current Image</label>
                                        @if($leadership->image)
                                            <div style="margin-bottom: 10px;">
                                                <img src="{{ asset('uploads/leadership/' . $leadership->image) }}"
                                                     alt="{{ $leadership->name }}"
                                                     style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 5px;">
                                            </div>
                                        @else
                                            <p class="text-muted">No image uploaded</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Upload New Image</label>
                                        <input type="file" class="form-control" name="image" accept="image/*"/>
                                        <small class="form-text text-muted">Upload new profile photo (JPG, PNG, GIF, WEBP - Max: 2MB). Leave empty to keep current image.</small>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Display Order *</label>
                                        <input type="number" class="form-control" name="order"
                                               value="{{ $leadership->order }}" placeholder="e.g., 1, 2, 3"
                                               min="0" required/>
                                        <small class="form-text text-muted">Lower numbers appear first</small>
                                        @error('order')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="status" value="1"
                                                   {{ $leadership->status ? 'checked' : '' }}/>
                                            Active
                                        </label>
                                        <small class="form-text text-muted">Only active members will be shown on the website</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Leadership Member</button>
                                    <a href="{{ route('admin.leadership.index') }}" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

