@extends('layouts.app')

@section('title', 'Dealership Applications')
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Dealership Submission Form</h2>
                    </div>
                </div>
                <hr />
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Applications ({{ $dealerships->count() }})
                        </div>
                        <div class="panel-body">
                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Dealership Name</th>
                                            <th>Trade License/TIN</th>
                                            <th>Business Type</th>
                                            <th>Years of Experience</th>
                                            <th>Area of Interest</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th width="12%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($dealerships as $key => $item)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>

                                                {{-- New Fields --}}
                                                <td>{{ $item->trade_license_tin ?? 'N/A' }}</td>
                                                <td>{{ $item->business_type ?? 'N/A' }}</td>
                                                <td>{{ $item->years_of_experience ?? '0' }} yrs</td>
                                                <td>{{ Str::limit($item->area_of_interest, 20) }}</td>

                                                <td>{{ $item->phone }}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                        <span class="badge badge-success">Approved</span>
                                                    @else
                                                        <span class="badge badge-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('dealership.show', $item->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('dealership.destroy', $item->id) }}"
                                                        style="display: none;" method="POST">
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
                                                <td colspan="10" class="text-center">No dealership applications yet</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection