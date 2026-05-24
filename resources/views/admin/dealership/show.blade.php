@extends('layouts.app')

@section('title', 'Dealership Application Details')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Dealership Application Details</h2>
                        <a href="{{ route('dealership.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Application Information
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="30%">Dealership Name:</th>
                                                <td>{{ $dealership->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td>{{ $dealership->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone:</th>
                                                <td>{{ $dealership->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Owner:</th>
                                                <td>{{ $dealership->owner ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Business Type:</th>
                                                <td>{{ $dealership->business_type ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <td>{{ $dealership->address ?? 'N/A' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="30%">Trade License/TIN:</th>
                                                <td>{{ $dealership->trade_license_tin ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Years of Experience:</th>
                                                <td>{{ $dealership->years_of_experience ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Area of Interest:</th>
                                                <td>{{ $dealership->area_of_interest ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Submitted At:</th>
                                                <td>{{ $dealership->created_at->format('d M Y, h:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Updated:</th>
                                                <td>{{ $dealership->updated_at->format('d M Y, h:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Document File:</th>
                                                <td>
                                                    @if($dealership->document_file)
                                                        <a href="{{ asset($dealership->document_file) }}" target="_blank"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fa fa-download"></i> Download Document
                                                        </a>
                                                    @else
                                                        <span class="text-muted">No document attached</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Message:</h4>
                                        <div class="well">
                                            <p>{{ $dealership->message ?? 'No message provided' }}</p>
                                        </div>
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