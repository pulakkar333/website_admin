@extends('layouts.app')

@section('title','Edit Our Clients')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Our Clients</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Our Clients
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <form role="form" method="post" action="{{ route('client.update',$photo->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <select class="form-control" name="category_id" required>
                                                <option value="">-- Select Category --</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $photo->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">Select client category (Hospitals, Clinics, etc.)</small>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Client Name *</label>
                                            <input class="form-control" name="title" value="{{ $photo->title }}" placeholder="e.g., City Hospital" required />
                                            <small class="form-text text-muted">Name of the client/organization</small>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Website URL</label>
                                            <input class="form-control" name="designation" value="{{ $photo->designation }}" placeholder="https://example.com" />
                                            <small class="form-text text-muted">Client website URL (optional)</small>
                                            @error('designation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Order/Sl.No</label>
                                            <input type="number" class="form-control" name="sl" value="{{ $photo->sl }}" placeholder="1" min="0" />
                                            <small class="form-text text-muted">Display order (lower numbers appear first)</small>
                                            @error('sl')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Current Logo</label><br/>
                                            @if($photo->image)
                                                <img src="{{ asset('uploads/client/'.$photo->image) }}" class="img-thumbnail" width="200" height="100" style="object-fit: contain; background: #fff; padding: 10px;" />
                                            @else
                                                <p class="text-muted">No logo uploaded</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Upload New Logo</label>
                                            <input type="file" class="form-control" name="image" accept="image/*" />
                                            <small class="form-text text-muted">Upload new logo (JPG, PNG, BMP - Recommended: 235px × 80px). Leave empty to keep current logo.</small>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="status" value="1" {{ $photo->status ? 'checked' : '' }} />
                                                Active
                                            </label>
                                            <small class="form-text text-muted">Only active clients will be shown on the website</small>
                                        </div>

                                        <a href="{{ route('client.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update Client</button>

                                    </form>
                                    <br />




                                </div>
                            </div>
                        </div>
                        <!-- End Form Elements -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->

@endsection
