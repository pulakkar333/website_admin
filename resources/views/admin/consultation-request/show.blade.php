@extends('layouts.app')

@section('title','Consultation Request Details')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Consultation Request Details</h2>
                    <a href="{{ route('consultation-request.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Consultation Request Information
                        </div>
                        <div class="panel-body">
                            @include('layouts.partial.msg')

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Full Name:</th>
                                            <td>{{ $consultationRequest->full_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Organization / Hospital Name:</th>
                                            <td>{{ $consultationRequest->organization_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $consultationRequest->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{ $consultationRequest->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Topic of Inquiry:</th>
                                            <td>{{ $consultationRequest->topic_of_inquiry }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Submitted At:</th>
                                            <td>{{ $consultationRequest->created_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated:</th>
                                            <td>{{ $consultationRequest->updated_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>File:</th>
                                            <td>
                                                @if($consultationRequest->file)
                                                    <a href="{{ asset($consultationRequest->file) }}" target="_blank" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-download"></i> Download File
                                                    </a>
                                                @else
                                                    <span class="text-muted">No file attached</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            @if($consultationRequest->message)
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Message:</h4>
                                    <div class="well">
                                        <p>{{ $consultationRequest->message }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('consultation-request.index') }}" class="btn btn-default">Back</a>
                                    <form action="{{ route('consultation-request.destroy', $consultationRequest->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this consultation request?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>

@endsection

