@extends('layouts.app')

@section('title', 'Software Support Settings')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Software Support & Installation Settings</h2>
                        <p class="text-muted">Manage installation steps, license information, and support details that apply to all software products.</p>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Installation & Support Information
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.software-support-settings.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label>Installation Steps</label>
                                        <textarea class="form-control" name="installation_steps" rows="6"
                                                  placeholder="1. Download the software from the link above&#10;2. Run the installer and follow on-screen instructions&#10;3. After installation, launch the software and log in using your credentials&#10;4. If you face issues, consult the User Manual or contact support">{{ $installationSteps->value }}</textarea>
                                        <small class="form-text text-muted">Step-by-step installation guide (applies to all software products)</small>
                                        @error('installation_steps')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>License Information</label>
                                        <textarea class="form-control" name="license_info" rows="4"
                                                  placeholder="License type, terms, and conditions...">{{ $licenseInfo->value }}</textarea>
                                        <small class="form-text text-muted">License details (applies to all software products)</small>
                                        @error('license_info')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <hr/>

                                    <h4 style="color: #081953; margin-bottom: 20px;">
                                        <i class="fa fa-link"></i> Download & Resources
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Download Link</label>
                                                <input class="form-control" name="download_link" value="{{ $downloadLink->value ?? '' }}"
                                                       placeholder="https://example.com/download/software.exe"/>
                                                <small class="form-text text-muted">Default download link for software (applies to all software)</small>
                                                @error('download_link')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Video Tutorial Link</label>
                                                <input class="form-control" name="video_tutorial_link" value="{{ $videoTutorialLink->value ?? '' }}"
                                                       placeholder="https://youtube.com/watch?v=..."/>
                                                <small class="form-text text-muted">Video tutorial URL (applies to all software)</small>
                                                @error('video_tutorial_link')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr/>

                                    <h4 style="color: #081953; margin-bottom: 20px;">
                                        <i class="fa fa-headset"></i> Support Information
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Support Email</label>
                                                <input type="email" class="form-control" name="support_email" value="{{ $supportEmail->value }}"
                                                       placeholder="support@example.com"/>
                                                <small class="form-text text-muted">Support contact email (applies to all software)</small>
                                                @error('support_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Support Phone</label>
                                                <input class="form-control" name="support_phone" value="{{ $supportPhone->value }}"
                                                       placeholder="+880-123-456789"/>
                                                <small class="form-text text-muted">Support hotline number (applies to all software)</small>
                                                @error('support_phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Support Hours</label>
                                                <input class="form-control" name="support_hours" value="{{ $supportHours->value }}"
                                                       placeholder="Sun - Thu: 9:00 AM - 6:00 PM"/>
                                                <small class="form-text text-muted">Support availability hours (applies to all software)</small>
                                                @error('support_hours')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr style="margin-top: 30px;"/>

                                    <div style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa fa-save"></i> Update Support Settings
                                        </button>
                                        <a href="{{ route('admin.software.index') }}" class="btn btn-default btn-lg">Back to Software List</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

