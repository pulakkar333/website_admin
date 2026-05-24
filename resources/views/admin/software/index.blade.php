@extends('layouts.app')

@section('title', 'All Software Products')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Software Products</h2>
                        <a href="{{ route('admin.software.create') }}" class="btn btn-primary square-btn-adjust" style="float:right;">Add New Software</a>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Software Products List
                            </div>

                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Name</th>
                                            <th>Version</th>
                                            <th>Description</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($software as $key => $item)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td><strong>{{ $item->name }}</strong></td>
                                                <td>
                                                    @if($item->version)
                                                        <span class="label label-info">v{{ $item->version }}</span>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>{{ Str::limit($item->description, 80) }}</td>
                                                <td>{{ $item->order }}</td>
                                                <td>
                                                    @if($item->status)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.software.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.software.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this software?');">
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

