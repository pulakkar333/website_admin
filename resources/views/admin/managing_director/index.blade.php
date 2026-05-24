@extends('layouts.app')

@section('title', 'All Managing Directors')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Managing Directors</h2>
                        {{-- <a href="{{ route('admin.managing_director.create') }}" class="btn btn-primary square-btn-adjust" style="float:right;">Add New Managing Director</a> --}}
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Managing Directors List
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
                                            <th>Career Highlights</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($managingDirectors as $key => $md)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @if($md->image)
                                                        <img src="{{ asset('uploads/managing_director/' . $md->image) }}" alt="{{ $md->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                                    @else
                                                        <span class="label label-default">No Image</span>
                                                    @endif
                                                </td>
                                                <td><strong>{{ $md->name }}</strong></td>
                                                <td>{{ $md->designation }}</td>
                                                <td>
                                                    @if($md->career_highlights && count($md->career_highlights) > 0)
                                                        <span class="badge badge-info">{{ count($md->career_highlights) }} Highlights</span>
                                                    @else
                                                        <span class="text-muted">No highlights</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($md->status)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.managing_director.edit', $md->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.managing_director.destroy', $md->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this Managing Director?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <p class="text-muted">No Managing Directors found. <a href="{{ route('admin.managing_director.create') }}">Add one now</a></p>
                                                </td>
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
    </div>
@endsection

