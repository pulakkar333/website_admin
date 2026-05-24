@extends('layouts.app')

@section('title','Edit Support Service')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Support Service</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Support Service
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('technicalsupportservice.update',$service->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Icon Class</label>
                                            <input class="form-control" name="icon" value="{{ $service->icon }}" placeholder="fas fa-tools" />
                                            <p class="help-block">FontAwesome icon class. Visit <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a> for icon classes. Example: fas fa-tools, fas fa-wrench, fas fa-cog</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" value="{{ $service->title }}" placeholder="Service Title" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Details <span class="text-danger">*</span></label>
                                            <textarea class="form-control ckeditor" name="details" rows="5" placeholder="Service details description" required>{{ $service->details }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="{{ $service->order }}" />
                                            <p class="help-block">Lower numbers appear first</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>

                                        <a href="{{ route('technicalsupportservice.index') }}" class="btn btn-danger">Back</a>
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

