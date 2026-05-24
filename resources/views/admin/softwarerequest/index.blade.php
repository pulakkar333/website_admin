@extends('layouts.app')

@section('title','Software Requests')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Software Requests</h2>
                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Software Requests ({{ $softwareRequests->count() }})
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Company</th>
                                        <th>Software Type</th>
                                        <th>Requirements</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th width="15%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($softwareRequests as $key=>$item)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->company ?? 'N/A' }}</td>
                                        <td>{{ $item->software_type ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($item->requirements, 50) }}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-success">Processed</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('softwarerequest.show', $item->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('softwarerequest.destroy',$item->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $item->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No software requests yet</td>
                                    </tr>
                                    @endforelse



                                </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>

@endsection

