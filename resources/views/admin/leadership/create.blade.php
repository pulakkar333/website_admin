@extends('layouts.app')

@section('title', 'Add New Leadership Member')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Add New Leadership Member</h2>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create New Leadership Member
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.leadership.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input class="form-control" name="name" value="{{ old('name') }}"
                                               placeholder="e.g., John Doe" required/>
                                        <small class="form-text text-muted">Full name of the leader</small>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Designation *</label>
                                        <input class="form-control" name="designation" value="{{ old('designation') }}"
                                               placeholder="e.g., CEO, Managing Director, Chairman" required/>
                                        <small class="form-text text-muted">Position or title</small>
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Details</label>
                                        <textarea class="form-control" name="details" rows="5"
                                                  placeholder="Bio or description of the leader">{{ old('details') }}</textarea>
                                        <small class="form-text text-muted">Brief biography or description (optional)</small>
                                        @error('details')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <input type="file" class="form-control" name="image" accept="image/*"/>
                                        <small class="form-text text-muted">Upload profile photo (JPG, PNG, GIF, WEBP - Max: 2MB)</small>
                                        @error('image')
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
                                        <small class="form-text text-muted">Only active members will be shown on the website</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Leadership Member</button>
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

