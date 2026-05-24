@extends('layouts.app')

@section('title', 'All Client Testimonials')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Client Testimonials</h2>
                        <a href="{{ route('admin.client-testimonial.create') }}" class="btn btn-primary square-btn-adjust" style="float:right;">Add New Testimonial</a>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Client Testimonials List
                            </div>

                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($testimonials as $key => $testimonial)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td><strong>{{ $testimonial->title }}</strong></td>
                                                <td>{{ Str::limit($testimonial->details, 100) }}</td>
                                                <td>{{ $testimonial->order }}</td>
                                                <td>
                                                    @if($testimonial->status)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.client-testimonial.edit', $testimonial->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.client-testimonial.destroy', $testimonial->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
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

