@extends('layouts.app')

@section('title','Add Footer Address')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Footer Address</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add New Address</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <form role="form" method="post" action="{{ route('footer-address.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" placeholder="Head Office" required />
                                            <p class="help-block">e.g., Head Office, Factory Office, China Office</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="address" rows="3" placeholder="17/2, Topkhana Road (2nd Floor), Dhaka - 1000, Bangladesh." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="0" />
                                        </div>
                                        <a href="{{ route('footer-address.index') }}" class="btn btn-danger">Back</a>
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

