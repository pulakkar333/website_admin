@extends('layouts.app')

@section('title','Add Client Category')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Client Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Client Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('clientcategory.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Category Name <span class="text-danger">*</span></label>
                                            <input class="form-control" name="name" placeholder="Corporate Clients" required />
                                        </div>


                                        {{-- <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Category Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea class="form-control ckeditor" name="details" rows="5" placeholder="Category Details"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" accept="image/*" />
                                            <p class="help-block">Upload category image (JPEG, JPG, PNG, WEBP - Max 2MB)</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="0" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div> --}}

                                        <a href="{{ route('clientcategory.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>

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

