@extends('layouts.app')

@section('title','Edit Dealership Page Heading')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dealership Page Heading</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Page Heading
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('dealership-setting.update') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Heading Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="heading_title" value="{{ $setting->heading_title }}" required />
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

