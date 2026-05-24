@extends('layouts.app')

@section('title','Technical Support Services')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Technical Support Services</h2>
                    <a style="float:right" href="{{ route('technicalsupportservice.create') }}" class="btn btn-primary square-btn-adjust">Add Service</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Support Services ({{ $services->count() }})
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($services as $key=>$service)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if($service->icon)
                                                <i class="{{ $service->icon }} fa-2x"></i>
                                            @else
                                                <span class="text-muted">No Icon</span>
                                            @endif
                                        </td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ Str::limit($service->details, 50) }}</td>
                                        <td>{{ $service->order }}</td>
                                        <td>
                                            @if($service->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $service->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{route('technicalsupportservice.edit',$service->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form id="delete-form-{{ $service->id }}" action="{{ route('technicalsupportservice.destroy',$service->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $service->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No services found. <a href="{{ route('technicalsupportservice.create') }}">Add your first service</a></td>
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

