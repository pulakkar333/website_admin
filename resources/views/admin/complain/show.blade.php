@extends('layouts.app')

@section('title','Complaint Details')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Complaint Details</h2>
                    <a href="{{ route('complain.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Complaint Information
                        </div>
                        <div class="panel-body">
                            @include('layouts.partial.msg')

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Name:</th>
                                            <td>{{ $complain->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $complain->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{ $complain->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company:</th>
                                            <td>{{ $complain->company ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Complaint Category:</th>
                                            <td>{{ ucfirst($complain->complaintCategory ?? ($complain->product ?? 'N/A')) }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">

                                        {{-- <tr>
                                            <th width="30%">Status:</th>
                                            <td>
                                                @if($complain->status == 1)
                                                    <span class="badge badge-success">Resolved</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <th>Submitted At:</th>
                                            <td>{{ $complain->created_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated:</th>
                                            <td>{{ $complain->updated_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Attachment:</th>
                                            <td>
                                                @if($complain->attachment)
                                                    <a href="{{ asset('uploads/complains/'.$complain->attachment) }}" target="_blank" class="btn btn-primary btn-sm">
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
                                    <h4>Complaint:</h4>
                                    <div class="well">
                                        <p>{{ $complain->complaint }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('complain.index') }}" class="btn btn-default">Back</a>
                                    {{-- <a href="{{ route('complain.status', $complain->id) }}" class="btn btn-warning">
                                        @if($complain->status == 1)
                                            Mark as Pending
                                        @else
                                            Mark as Resolved
                                        @endif
                                    </a> --}}
                                    <form action="{{ route('complain.destroy', $complain->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this complaint?')">
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

