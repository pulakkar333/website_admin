@extends('layouts.app')

@section('title','Registration Details')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Registration Details</h2>
                    <a href="{{ route('registration.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registration Information
                        </div>
                        <div class="panel-body">
                            @include('layouts.partial.msg')

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Full Name:</th>
                                            <td>{{ $registration->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $registration->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{ $registration->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Organization / Hospital Name:</th>
                                            <td>{{ $registration->organization ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Designation / Job Title:</th>
                                            <td>{{ $registration->designation ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Department:</th>
                                            <td>{{ $registration->department ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>City / District:</th>
                                            <td>{{ $registration->city ?? 'N/A' }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        {{-- <tr>
                                            <th width="30%">Company:</th>
                                            <td>{{ $registration->company ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Product Name:</th>
                                            <td>{{ $registration->product_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Serial Number:</th>
                                            <td>{{ $registration->serial_number ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Purchase Date:</th>
                                            <td>{{ $registration->purchase_date ? $registration->purchase_date->format('d M Y') : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{ $registration->address ?? 'N/A' }}</td>
                                        </tr> --}}
                                        <tr>
                                            <th>Terms Accepted:</th>
                                            <td>
                                                @if($registration->terms_accepted)
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-warning">No</span>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <th>Status:</th>
                                            <td>
                                                @if($registration->status == 1)
                                                    <span class="badge badge-success">Verified</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <th>Submitted At:</th>
                                            <td>{{ $registration->created_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated:</th>
                                            <td>{{ $registration->updated_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>File (Business Card):</th>
                                            <td>
                                                @if($registration->file)
                                                    <a href="{{ asset($registration->file) }}" target="_blank" class="btn btn-primary btn-sm">
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

                            @if($registration->message)
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Message / Note:</h4>
                                    <div class="well">
                                        <p>{{ $registration->message }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('registration.index') }}" class="btn btn-default">Back</a>
                                    {{-- <a href="{{ route('registration.status', $registration->id) }}" class="btn btn-warning">
                                        @if($registration->status == 1)
                                            Mark as Pending
                                        @else
                                            Mark as Verified
                                        @endif
                                    </a> --}}
                                    <form action="{{ route('registration.destroy', $registration->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this registration?')">
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

