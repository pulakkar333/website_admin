@extends('layouts.app')

@section('title','All Milestones')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Company Milestones</h2>
                    <a style="float:right" href="{{ route('milestone.create') }}" class="btn btn-primary square-btn-adjust">Add Milestone</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Milestones
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Year</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($milestones as $key=>$milestone)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong>{{ $milestone->year }}</strong></td>
                                        <td>{{ $milestone->title }}</td>
                                        <td>{{ Str::limit($milestone->description, 50) }}</td>
                                        <td>{{ $milestone->order }}</td>
                                        <td>
                                            @if($milestone->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td><a href="{{route('milestone.edit',$milestone->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form id="delete-form-{{ $milestone->id }}" action="{{ route('milestone.destroy',$milestone->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $milestone->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach



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

