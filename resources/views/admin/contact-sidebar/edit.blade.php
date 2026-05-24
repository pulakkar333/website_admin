@extends('layouts.app')

@section('title', 'Edit Contact Sidebar')
@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Contact Sidebar Settings</h2>
                    <p class="text-muted">Manage the floating contact sidebar that appears on the frontend pages.</p>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Contact Sidebar</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('contact-sidebar.update') }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>WhatsApp Number <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="tel" name="whatsapp"
                                                        value="{{ $whatsapp }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="tel" name="phone" value="{{ $phone }}"
                                                        required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Email Address <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" value="{{ $email }}"
                                                required />
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>WeChat Label <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="wechat_label"
                                                        value="{{ $wechatLabel }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>WeChat Link <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="url" name="wechat_link"
                                                        value="{{ $wechatLink }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Facebook Page/Profile Link</label>
                                            <input class="form-control" type="url" name="facebook" value="{{ $facebook }}"
                                                placeholder="https://facebook.com/" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Enabled</option>
                                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>Disabled</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Settings</button>
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