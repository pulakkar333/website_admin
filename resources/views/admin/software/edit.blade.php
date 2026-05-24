@extends('layouts.app')

@section('title', 'Edit Software Product')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Edit Software Product</h2>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Update Software Product Information
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.software.update', $software->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Software Name *</label>
                                                <input class="form-control" name="name" value="{{ $software->name }}"
                                                       placeholder="e.g., DME Diagnostic Suite" required/>
                                                <small class="form-text text-muted">Name of the software product</small>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Version</label>
                                                <input class="form-control" name="version" value="{{ $software->version }}"
                                                       placeholder="e.g., 2.5.1"/>
                                                <small class="form-text text-muted">Software version (optional)</small>
                                                @error('version')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" rows="3"
                                                  placeholder="Brief description of the software">{{ $software->description }}</textarea>
                                        <small class="form-text text-muted">Short description (optional)</small>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Icon URL</label>
                                        <input class="form-control" name="icon" value="{{ $software->icon }}"
                                               placeholder="https://example.com/icons/software-icon.png"/>
                                        <small class="form-text text-muted">Icon image URL (optional)</small>
                                        @if($software->icon)
                                            <div style="margin-top: 10px;">
                                                <strong>Current Icon:</strong>
                                                <img src="{{ $software->icon }}" alt="Icon" style="max-width: 50px; max-height: 50px; margin-left: 10px;" onerror="this.style.display='none'"/>
                                            </div>
                                        @endif
                                        @error('icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <hr>
                                    <h4>Resources</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current PDF Manual</label>
                                                @if($software->pdf_manual_link)
                                                    <div style="margin-bottom: 10px;">
                                                        <a href="{{ asset('uploads/software/manuals/' . $software->pdf_manual_link) }}"
                                                           target="_blank" class="btn btn-sm btn-info">
                                                            <i class="fa fa-file-pdf-o"></i> View Current Manual
                                                        </a>
                                                    </div>
                                                @else
                                                    <p class="text-muted">No PDF manual uploaded</p>
                                                @endif

                                                <label>Upload New PDF Manual</label>
                                                <input type="file" class="form-control" name="pdf_manual_link" accept=".pdf"/>
                                                <small class="form-text text-muted">Upload PDF manual (Max: 10MB). Leave empty to keep current.</small>
                                                @error('pdf_manual_link')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Software File</label>
                                                @if($software->software_file)
                                                    <div style="margin-bottom: 10px;">
                                                        <a href="{{ asset('uploads/software/files/' . $software->software_file) }}"
                                                           target="_blank" class="btn btn-sm btn-success">
                                                            <i class="fa fa-download"></i> View Current Software File
                                                        </a>
                                                        <span class="text-muted" style="margin-left: 10px;">{{ $software->software_file }}</span>
                                                    </div>
                                                @else
                                                    <p class="text-muted">No software file uploaded</p>
                                                @endif

                                                <label>Upload New Software File</label>
                                                <input type="file" class="form-control" name="software_file" accept=".exe,.zip,.rar,.msi,.dmg,.deb,.rpm"/>
                                                <small class="form-text text-muted">Upload software file (Max: 80MB). Leave empty to keep current.</small>
                                                @error('software_file')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert alert-info">
                                        <i class="fa fa-info-circle"></i> <strong>Note:</strong> Download Link and Video Tutorial Link are managed in
                                        <a href="{{ route('admin.software-support-settings.edit') }}" class="alert-link">Support & Installation Settings</a>
                                    </div>

                                    <div class="alert alert-info">
                                        <i class="fa fa-info-circle"></i> <strong>Note:</strong> Installation Steps, License Information, Download Link, Video Tutorial Link, and Support Details are managed in
                                        <a href="{{ route('admin.software-support-settings.edit') }}" class="alert-link">Support & Installation Settings</a>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Display Order *</label>
                                                <input type="number" class="form-control" name="order"
                                                       value="{{ $software->order }}" placeholder="e.g., 1, 2, 3"
                                                       min="0" required/>
                                                <small class="form-text text-muted">Lower numbers appear first</small>
                                                @error('order')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" name="status" value="1"
                                                               {{ $software->status ? 'checked' : '' }}/>
                                                        Active
                                                    </label>
                                                    <small class="form-text text-muted">Only active software will be shown on the website</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Software</button>
                                    <a href="{{ route('admin.software.index') }}" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
