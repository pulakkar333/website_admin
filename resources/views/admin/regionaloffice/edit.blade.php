@extends('layouts.app')

@section('title','Edit Regional Office')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Regional Office</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Regional Office
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('regionaloffice.update', $office->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" value="{{ $office->title }}" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Details <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="details" rows="4" required>{{ $office->details }}</textarea>
                                        </div>

                                        <a href="{{ route('regionaloffice.index') }}" class="btn btn-danger">Back</a>
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

