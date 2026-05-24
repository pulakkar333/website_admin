@extends('layouts.app')

@section('title','Technical Support Request Details')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Technical Support Request Details</h2>
                    <a href="{{ route('technicalsupport.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Request Information
                        </div>
                        <div class="panel-body">
                            @include('layouts.partial.msg')

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Name:</th>
                                            <td>{{ $support->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $support->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{ $support->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Organization / Hospital Name:</th>
                                            <td>{{ $support->organization ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Equipment Name / Model:</th>
                                            <td>{{ $support->equipment_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Preferred Contact Time:</th>
                                            <td>{{ $support->preferred_contact_time ?? 'N/A' }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        {{-- <tr>
                                            <th width="30%">Status:</th>
                                            <td>
                                                @if($support->status == 1)
                                                    <span class="badge badge-success">Resolved</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <th>Submitted At:</th>
                                            <td>{{ $support->created_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated:</th>
                                            <td>{{ $support->updated_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>File:</th>
                                            <td>
                                                @if($support->file)
                                                    <a href="{{ asset($support->file) }}" target="_blank" class="btn btn-primary btn-sm">
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

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Description of Issue:</h4>
                                    <div class="well">
                                        <p>{{ $support->message }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('technicalsupport.index') }}" class="btn btn-default">Back</a>
                                    {{-- <a href="{{ route('technicalsupport.status', $support->id) }}" class="btn btn-warning">
                                        @if($support->status == 1)
                                            Mark as Pending
                                        @else
                                            Mark as Resolved
                                        @endif
                                    </a> --}}
                                    <form action="{{ route('technicalsupport.destroy', $support->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this request?')">
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

