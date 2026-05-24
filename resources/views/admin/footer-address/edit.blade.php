@extends('layouts.app')

@section('title','Edit Footer Address')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Footer Address</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Address</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <form role="form" method="post" action="{{ route('footer-address.update', $address->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" value="{{ $address->title }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="address" rows="3" required>{{ $address->address }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="{{ $address->order }}" />
                                        </div>
                                        <a href="{{ route('footer-address.index') }}" class="btn btn-danger">Back</a>
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

