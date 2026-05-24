@extends('layouts.app')

@section('title','Edit Department')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Department</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Department
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('department.update', $department->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Department Name <span class="text-danger">*</span></label>
                                            <input class="form-control" name="name" value="{{ $department->name }}" required />

                                        </div>

                                        <div class="form-group">
                                            <label>Icon Class <span class="text-danger">*</span></label>
                                            <input class="form-control" name="icon" value="{{ $department->icon }}" required />
                                            <p class="help-block">FontAwesome icon class</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="{{ $department->order }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $department->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $department->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>

                                        <a href="{{ route('department.index') }}" class="btn btn-danger">Back</a>
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

