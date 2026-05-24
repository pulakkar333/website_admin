@extends('layouts.app')

@section('title','Add Setting')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Setting</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Setting
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('setting.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Key <span class="text-danger">*</span></label>
                                            <input class="form-control" name="key" placeholder="company_name" required />
                                            <p class="help-block">Use lowercase with underscores (e.g., site_title, company_email)</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Type <span class="text-danger">*</span></label>
                                            <select class="form-control" name="type" required>
                                                <option value="text">Text</option>
                                                <option value="textarea">Textarea</option>
                                                <option value="number">Number</option>
                                                <option value="url">URL</option>
                                                <option value="email">Email</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Value <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="value" rows="4"></textarea>
                                        </div>

                                        <!--<div class="form-group">-->
                                        <!--    <label>Status</label>-->
                                        <!--    <select class="form-control" name="status">-->
                                        <!--        <option value="1">Active</option>-->
                                        <!--        <option value="0">Inactive</option>-->
                                        <!--    </select>-->
                                        <!--</div>-->

                                        <a href="{{ route('setting.index') }}" class="btn btn-danger">Back</a>
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