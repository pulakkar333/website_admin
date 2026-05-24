@extends('layouts.app')

@section('title','Registrations')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Registrations</h2>
                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Registrations ({{ $registrations->count() }})
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
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>City</th>
                                        {{-- <th>Company</th>
                                        <th>Product Name</th>
                                        <th>Serial Number</th>
                                        <th>Purchase Date</th>
                                        <th>Address</th>
                                        <th>Status</th> --}}
                                        <th>Date</th>
                                        <th width="15%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($registrations as $key=>$item)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->organization ?? 'N/A' }}</td>
                                        <td>{{ $item->designation ?? 'N/A' }}</td>
                                        <td>{{ $item->department ?? 'N/A' }}</td>
                                        <td>{{ $item->city ?? 'N/A' }}</td>
                                        {{-- <td>{{ $item->company ?? 'N/A' }}</td>
                                        <td>{{ $item->product_name ?? 'N/A' }}</td>
                                        <td>{{ $item->serial_number ?? 'N/A' }}</td>
                                        <td>{{ $item->purchase_date ? date('d M Y', strtotime($item->purchase_date)) : 'N/A' }}</td>
                                        <td>{{ Str::limit($item->address, 30) }}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-success">Verified</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td> --}}
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('registration.show', $item->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('registration.destroy',$item->id) }}" style="display: none;" method="POST">
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
                                        <td colspan="9" class="text-center">No registrations yet</td>
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

