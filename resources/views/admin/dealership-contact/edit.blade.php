@extends('layouts.app')

@section('title','Edit Dealership Contact Information')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dealership Contact Information</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Contact Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('dealership-contact.update') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" value="{{ $contact->email }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input class="form-control" name="phone" value="{{ $contact->phone }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Office Hours <span class="text-danger">*</span></label>
                                            <input class="form-control" name="office_hours" value="{{ $contact->office_hours }}" placeholder="e.g., Monday - Friday, 9:00 AM - 5:00 PM" required />
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

