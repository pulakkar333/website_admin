 @extends('layouts.app')

@section('title','Edit Footer Contact')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Footer Contact Information</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Footer Contact
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('footer-contact.update') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Hotline <span class="text-danger">*</span></label>
                                            <input class="form-control" type="tel" name="phone" value="{{ $contact->phone }}" placeholder="+8801404003501" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Order <span class="text-danger">*</span></label>
                                            <input class="form-control" type="tel" name="ordermobile" value="{{ $contact->ordermobile }}" placeholder="+8801404003501" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Sales <span class="text-danger">*</span></label>
                                            <input class="form-control" type="tel" name="salesmobile" value="{{ $contact->salesmobile }}" placeholder="+8801404003525" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Service <span class="text-danger">*</span></label>
                                            <input class="form-control" type="tel" name="servicemobile" value="{{ $contact->servicemobile }}" placeholder="+8801404003535" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" value="{{ $contact->email }}" placeholder="info@gmebd.com" required />
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