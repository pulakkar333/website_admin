@extends('layouts.app')

@section('title', 'All Statistics')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Statistics</h2>
                        <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary square-btn-adjust" style="float:right;">Add New Statistic</a>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Statistics List
                            </div>

                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Key</th>
                                            <th>Label</th>
                                            <th>Value</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($statistics as $key => $statistic)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $statistic->key }}</td>
                                                <td>{{ $statistic->label }}</td>
                                                <td><strong>{{ $statistic->value }}</strong></td>
                                                <td>{{ $statistic->order }}</td>
                                                <td>
                                                    @if($statistic->status)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.statistics.edit', $statistic->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.statistics.destroy', $statistic->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this statistic?');">
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

