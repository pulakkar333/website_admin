@extends('layouts.app')

@section('title', 'Edit Corporate Ecosystem')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Edit Corporate Ecosystem</h2>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Update Corporate Ecosystem Information
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.corporate-ecosystem.update', $ecosystem->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label>Title *</label>
                                        <input class="form-control" name="title" value="{{ $ecosystem->title }}"
                                               placeholder="e.g., Supply Chain Management" required/>
                                        <small class="form-text text-muted">Name of the ecosystem</small>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" rows="5"
                                                  placeholder="Brief description">{{ $ecosystem->description }}</textarea>
                                        <small class="form-text text-muted">Detailed description (optional)</small>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{-- <div class="form-group">
                                        <label>Icon Class</label>
                                        <input class="form-control" name="icon" value="{{ $ecosystem->icon }}"
                                               placeholder="e.g., fas fa-network-wired, fas fa-cloud"/>
                                        <small class="form-text text-muted">FontAwesome icon class (optional) - <a href="https://fontawesome.com/icons" target="_blank">Browse Icons</a></small>
                                        @if($ecosystem->icon)
                                            <div style="margin-top: 10px;">
                                                <strong>Current Icon Preview:</strong> <i class="{{ $ecosystem->icon }}" style="font-size: 32px; margin-left: 10px;"></i>
                                            </div>
                                        @endif
                                        @error('icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group">
                                        <label>Current Image</label>
                                        @if($ecosystem->image)
                                            <div style="margin-bottom: 10px;">
                                                <img src="{{ asset('uploads/corporate-ecosystem/' . $ecosystem->image) }}"
                                                     alt="{{ $ecosystem->title }}"
                                                     style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 5px;">
                                            </div>
                                        @else
                                            <p class="text-muted">No image uploaded</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Upload New Image</label>
                                        <input type="file" class="form-control" name="image" accept="image/*"/>
                                        <small class="form-text text-muted">Upload new image (JPG, PNG, GIF, WEBP - Max: 2MB). Leave empty to keep current image.</small>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{-- <div class="form-group">
                                        <label>Link/URL</label>
                                        <input class="form-control" name="link" value="{{ $ecosystem->link }}"
                                               placeholder="e.g., /solutions/supply-chain or https://example.com"/>
                                        <small class="form-text text-muted">Related page link or external URL (optional)</small>
                                        @error('link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Display Order *</label>
                                        <input type="number" class="form-control" name="order"
                                               value="{{ $ecosystem->order }}" placeholder="e.g., 1, 2, 3"
                                               min="0" required/>
                                        <small class="form-text text-muted">Lower numbers appear first</small>
                                        @error('order')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="status" value="1"
                                                   {{ $ecosystem->status ? 'checked' : '' }}/>
                                            Active
                                        </label>
                                        <small class="form-text text-muted">Only active ecosystems will be shown on the website</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Corporate Ecosystem</button>
                                    <a href="{{ route('admin.corporate-ecosystem.index') }}" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


