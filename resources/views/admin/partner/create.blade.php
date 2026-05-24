@extends('layouts.app')

@section('title','Add Partner')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Partner</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Partner
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('partner.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Partner Name <span class="text-danger">*</span></label>
                                            <input class="form-control" name="name" placeholder="Partner Name" required />

                                        </div>

                                        <div class="form-group">
                                            <label>Website URL</label>
                                            <input class="form-control" name="website" placeholder="https://example.com" />

                                        </div>

                                        <div class="form-group">
                                            <label>Logo Image <span class="text-danger">*</span></label>
                                            <input type="file" name="image" required />
                                            <p class="help-block">Recommended: PNG with transparent background</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="0" />
                                            <p class="help-block">Lower number appears first</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>

                                        <a href="{{ route('partner.index') }}" class="btn btn-danger">Back</a>
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

