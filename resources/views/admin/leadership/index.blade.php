@extends('layouts.app')

@section('title', 'All Leadership Members')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Leadership Members</h2>
                        <a href="{{ route('admin.leadership.create') }}" class="btn btn-primary square-btn-adjust" style="float:right;">Add New Member</a>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Leadership Team List
                            </div>

                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leaderships as $key => $leadership)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @if($leadership->image)
                                                        <img src="{{ asset('uploads/leadership/' . $leadership->image) }}" alt="{{ $leadership->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                                    @else
                                                        <span class="label label-default">No Image</span>
                                                    @endif
                                                </td>
                                                <td><strong>{{ $leadership->name }}</strong></td>
                                                <td>{{ $leadership->designation }}</td>
                                                <td>{{ $leadership->order }}</td>
                                                <td>
                                                    @if($leadership->status)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.leadership.edit', $leadership->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.leadership.destroy', $leadership->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

