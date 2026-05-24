@extends('layouts.app')

@section('title','Ask Expert Page Title')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Ask Expert Page Title</h2>
                    <a style="float:right" href="{{ route('askexpertpage.create') }}" class="btn btn-primary square-btn-adjust">
                        {{ $page ? 'Edit' : 'Add' }} Page Title
                    </a>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Page Title Section
                        </div>
                        <div class="panel-body">
                            @include('layouts.partial.msg')

                            @if($page)
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="20%">Title:</th>
                                        <td>{{ $page->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description:</th>
                                        <td>{{ $page->description ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            @if($page->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                <a href="{{ route('askexpertpage.create') }}" class="btn btn-primary">Edit</a>
                            @else
                                <p class="text-center">No page title set. <a href="{{ route('askexpertpage.create') }}">Add one now</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

