@extends('layouts.app')

@section('title','Add Partner Support & Benefit')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Partner Support & Benefit</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add New Benefit</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <form role="form" method="post" action="{{ route('partner-support-benefit.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Icon Class <span class="text-danger">*</span></label>
                                            <input class="form-control" name="icon" placeholder="fas fa-handshake" required />
                                            <p class="help-block">FontAwesome icon class</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="0" />
                                        </div>
                                        <a href="{{ route('partner-support-benefit.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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

