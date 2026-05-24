@extends('layouts.app')

@section('title','Add Regional Office')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Regional Office</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Regional Office
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('regionaloffice.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" placeholder="Chittagong Branch" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Details <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="details" rows="4" placeholder="45 Agrabad Commercial Area, Chittagong" required></textarea>
                                        </div>

                                        <a href="{{ route('regionaloffice.index') }}" class="btn btn-danger">Back</a>
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

