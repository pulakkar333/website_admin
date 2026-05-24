@extends('layouts.app')

@section('title','Meet Our Experts')
@section('content')

<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Meet Our Experts</h2>
                    <a style="float:right" href="{{ route('askexpertexpert.create') }}" class="btn btn-primary square-btn-adjust">Add Expert</a>
                </div>
            </div>
            <hr />
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Experts ({{ $experts->count() }})
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
                                    <th>Created At</th>
                                    <th width="17%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($experts as $key=>$expert)
                                <tr class="odd gradeX">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($expert->image)
                                            <img src="{{ asset($expert->image) }}" class="img-thumbnail" width="80" height="80" />
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $expert->name }}</td>
                                    <td>{{ $expert->designation }}</td>
                                    <td>{{ $expert->order }}</td>
                                    <td>
                                        @if($expert->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $expert->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{route('askexpertexpert.edit',$expert->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form id="delete-form-{{ $expert->id }}" action="{{ route('askexpertexpert.destroy',$expert->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $expert->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No experts found. <a href="{{ route('askexpertexpert.create') }}">Add your first expert</a></td>
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

