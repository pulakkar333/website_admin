@extends('layouts.app')

@section('title','Our Client Say')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Our Client Say</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Our Client Say
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('photo.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        
                                      
                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" placeholder="Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" name="designation" placeholder="Designation" />
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Image (Height:235px X width:80px)</label>
                                            <input type="file" name="image"/>
                                        </div>

  <div class="form-group">
                                            <label>SL (Order)</label>
                                            <input type="number" class="form-control" name="sl" placeholder="Serial Number/Order" value="0" />
                                            <p class="help-block">Lower numbers appear first. Photos will be ordered by this field.</p>
                                        </div>

                                        <a href="{{ route('photo.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>

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