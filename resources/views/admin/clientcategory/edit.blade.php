@extends('layouts.app')

@section('title','Edit Client Category')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Client Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Client Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('clientcategory.update', $clientCategory->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Category Name <span class="text-danger">*</span></label>
                                            <input class="form-control" name="name" value="{{ $clientCategory->name }}" required />
                                        </div>


                                        {{-- <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ old('title', $clientCategory->title) }}" placeholder="Category Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea class="form-control ckeditor" name="details" rows="5" placeholder="Category Details">{{ old('details', $clientCategory->details) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" accept="image/*" />
                                            <p class="help-block">Upload category image (JPEG, JPG, PNG, WEBP - Max 2MB)</p>
                                            @if($clientCategory->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/clientmanage/' . $clientCategory->image) }}" class="img-thumbnail" width="150" height="150" />
                                                    <p class="text-muted">Current Image</p>
                                                </div>
                                            @else
                                                <p>No image uploaded.</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="{{ $clientCategory->order }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $clientCategory->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $clientCategory->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div> --}}

                                        <a href="{{ route('clientcategory.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>

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

