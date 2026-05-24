@extends('layouts.app')

@section('title','Edit Setting')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Setting</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Setting
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('setting.update', $setting->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Key <span class="text-danger">*</span></label>
                                            <input class="form-control" name="key" value="{{ $setting->key }}" required />
                                            <p class="help-block">Use lowercase with underscores</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Type <span class="text-danger">*</span></label>
                                            <select class="form-control" name="type" required>
                                                <option value="text" {{ $setting->type == 'text' ? 'selected' : '' }}>Text</option>
                                                <option value="textarea" {{ $setting->type == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                                <option value="number" {{ $setting->type == 'number' ? 'selected' : '' }}>Number</option>
                                                <option value="url" {{ $setting->type == 'url' ? 'selected' : '' }}>URL</option>
                                                <option value="email" {{ $setting->type == 'email' ? 'selected' : '' }}>Email</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Value <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="value" rows="4" >{{ $setting->value }}</textarea>
                                        </div>

                                        <!--<div class="form-group">-->
                                        <!--    <label>Status</label>-->
                                        <!--    <select class="form-control" name="status">-->
                                        <!--        <option value="1" {{ $setting->status == 1 ? 'selected' : '' }}>Active</option>-->
                                        <!--        <option value="0" {{ $setting->status == 0 ? 'selected' : '' }}>Inactive</option>-->
                                        <!--    </select>-->
                                        <!--</div>-->

                                        <a href="{{ route('setting.index') }}" class="btn btn-danger">Back</a>
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