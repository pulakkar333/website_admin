@extends('layouts.app')

@section('title','Expert Consultation Topics')
@section('content')

<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Expert Consultation Topics</h2>
                    <a style="float:right" href="{{ route('askexperttopic.create') }}" class="btn btn-primary square-btn-adjust">Add Topic</a>
                </div>
            </div>
            <hr />
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Topics ({{ $topics->count() }})
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
                                @forelse($topics as $key=>$topic)
                                <tr class="odd gradeX">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($topic->icon)
                                            <i class="{{ $topic->icon }} fa-2x"></i>
                                        @else
                                            <span class="text-muted">No Icon</span>
                                        @endif
                                    </td>
                                    <td>{{ $topic->title }}</td>
                                    <td>{{ Str::limit($topic->details, 50) }}</td>
                                    <td>{{ $topic->order }}</td>
                                    <td>
                                        @if($topic->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $topic->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{route('askexperttopic.edit',$topic->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form id="delete-form-{{ $topic->id }}" action="{{ route('askexperttopic.destroy',$topic->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $topic->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No topics found. <a href="{{ route('askexperttopic.create') }}">Add your first topic</a></td>
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

