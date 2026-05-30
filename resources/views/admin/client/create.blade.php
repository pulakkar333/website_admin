@extends('layouts.app')

@section('title','Add Our Clients')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Our Clients</h2>

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
                                    <form role="form" method="post" action="{{ route('client.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <select class="form-control" name="category_id" required>
                                                <option value="">-- Select Category --</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                            <input class="form-control" name="title" value="{{ old('title') }}" placeholder="e.g., City Hospital" required />
                                            <small class="form-text text-muted">Name of the client/organization</small>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <label>Website URL</label>
                                            <input class="form-control" name="designation" value="{{ old('designation') }}" placeholder="https://example.com" />
                                            <small class="form-text text-muted">Client website URL (optional)</small>
                                            @error('designation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Client Logo *</label>
                                            <input type="file" class="form-control" name="image" accept="image/*" required />
                                            <small class="form-text text-muted">Upload client logo (JPG, PNG, BMP - Recommended: 235px × 80px)</small>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Order/Sl.No</label>
                                            <input type="number" class="form-control" name="sl" value="{{ old('sl') }}" placeholder="1" min="0" />
                                            <small class="form-text text-muted">Display order (lower numbers appear first)</small>
                                            @error('sl')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="status" value="1" {{ old('status', 1) ? 'checked' : '' }} />
                                                Active
                                            </label>
                                            <small class="form-text text-muted">Only active clients will be shown on the website</small>
                                        </div>

                                        <a href="{{ route('client.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Save Client</button>

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
