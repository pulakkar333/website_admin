@extends('layouts.app')

@section('title','Edit Parent Category')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Parent Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Parent Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('pcategory.update',$pcategory->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{ $pcategory->name }}" placeholder="Name" required />

                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            @if($pcategory->image)
                                                <img src="{{ asset('uploads/pcategory/'.$pcategory->image) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <p>No image uploaded.</p>
                                            @endif
                                        </div>

                                        <a href="{{ route('pcategory.index') }}" class="btn btn-danger">Back</a>
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