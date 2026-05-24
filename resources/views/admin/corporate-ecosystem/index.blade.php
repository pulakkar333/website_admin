@extends('layouts.app')

@section('title', 'All Corporate Ecosystem')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Corporate Ecosystem</h2>
                        {{-- <a href="{{ route('admin.corporate-ecosystem.create') }}" class="btn btn-primary square-btn-adjust" style="float:right;">Add New Ecosystem</a> --}}
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Corporate Ecosystem List
                            </div>

                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Image</th>

                                            {{-- <th>Icon</th> --}}
                                            <th>Title</th>
                                            <th>Description</th>

                                            {{-- <th>Order</th>
                                            <th>Status</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ecosystems as $key => $ecosystem)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @if($ecosystem->image)
                                                        <img src="{{ asset('uploads/corporate-ecosystem/' . $ecosystem->image) }}" alt="{{ $ecosystem->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                                    @else
                                                        <span class="label label-default">No Image</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    @if($ecosystem->icon)
                                                        <i class="{{ $ecosystem->icon }}" style="font-size: 24px;"></i>
                                                    @else
                                                        <span class="text-muted">No Icon</span>
                                                    @endif
                                                </td> --}}

                                                <td><strong>{{ $ecosystem->title }}</strong></td>
                                                <td><strong>{{ $ecosystem->description }}</strong></td>
                                                {{-- <td>{{ $ecosystem->order }}</td>
                                                <td>
                                                    @if($ecosystem->status)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Inactive</span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <a href="{{ route('admin.corporate-ecosystem.edit', $ecosystem->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.corporate-ecosystem.destroy', $ecosystem->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this ecosystem?');">
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


