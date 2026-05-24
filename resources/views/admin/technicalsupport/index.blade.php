@extends('layouts.app')

@section('title', 'Technical Support Requests')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Technical Support Request Form
                        </h2>
                    </div>
                </div>


                <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Support Requests ({{ $technicalSupports->count() }})
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
                                            <th>Organization</th>
                                            <th>Equipment Name</th>
                                            <th>Message</th>
                                            <th>Preferred Contact Time</th>
                                            <th>File</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Date</th>
                                            <th width="15%;">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($technicalSupports as $key => $item)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->organization ?? 'N/A' }}</td>
                                                <td>{{ $item->equipment_name ?? 'N/A' }}</td>
                                                <td>{{ Str::limit($item->message, 50) }}</td>
                                                <td>{{ $item->preferred_contact_time ?? 'N/A' }}</td>
                                                <td>
                                                    @if($item->file)
                                                        <a href="{{ asset($item->file) }}" target="_blank"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fa fa-download"></i> Download
                                                        </a>
                                                    @else
                                                        <span class="text-muted">No File</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    @if($item->status == 1)
                                                    <span class="badge badge-success">Resolved</span>
                                                    @else
                                                    <span class="badge badge-warning">Pending</span>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('technicalsupport.show', $item->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('technicalsupport.destroy', $item->id) }}"
                                                        style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="submit" onclick="if(confirm('Are you sure?')){
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{ $item->id }}').submit();
                                                                    }else {
                                                                    event.preventDefault();
                                                                    }" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center">No support requests yet</td>
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