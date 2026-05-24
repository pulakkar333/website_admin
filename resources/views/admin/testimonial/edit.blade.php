@extends('layouts.app')

@section('title','Edit Our Testimonial')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Our Testimonial</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Our Testimonial
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('testimonial.update',$photo->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" value="{{ $photo->title }}" placeholder="Name" />

                                        </div>
                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" name="designation"  placeholder="Short" required/>{{ $photo->designation }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label>Sl</label>
                                            <input class="form-control" name="sl" value="{{ $photo->sl }}" placeholder="Sl" />

                                        </div>

                                        <div class="form-group">
                                            <label>Image (Height:200px X width:200px)</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/testimonial/'.$photo->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('testimonial.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>

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
