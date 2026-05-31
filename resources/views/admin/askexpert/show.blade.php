@extends('layouts.app')

@section('title','Ask Expert Question Details')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Ask Expert Question Details</h2>
                    <a href="{{ route('askexpert.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Question Information
                        </div>
                        <div class="panel-body">
                            @include('layouts.partial.msg')

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Name:</th>
                                            <td>{{ $expert->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $expert->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{ $expert->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Organization:</th>
                                            <td>{{ $expert->organization ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Topic of Inquiry:</th>
                                            <td>{{ $expert->topicOfInquiry ?? 'N/A' }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Status:</th>
                                            <td>
                                                @if($expert->status == 1)
                                                    <span class="badge badge-success">Answered</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Submitted At:</th>
                                            <td>{{ $expert->created_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated:</th>
                                            <td>{{ $expert->updated_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>File:</th>
                                            <td>
                                                @if($expert->file)
                                                    <a href="{{ asset($expert->file) }}" target="_blank" class="btn btn-primary btn-sm">
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
                                    <h4>Subject:</h4>
                                    <div class="well">
                                        <p>{{ $expert->subject }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Question:</h4>
                                    <div class="well">
                                        <p>{{ $expert->question }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('askexpert.index') }}" class="btn btn-default">Back</a>
                                    <a href="{{ route('askexpert.status', $expert->id) }}" class="btn btn-warning">
                                        @if($expert->status == 1)
                                            Mark as Pending
                                        @else
                                            Mark as Answered
                                        @endif
                                    </a>
                                    <form action="{{ route('askexpert.destroy', $expert->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this question?')">
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

