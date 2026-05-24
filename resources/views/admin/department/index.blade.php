@extends('layouts.app')

@section('title','All Departments')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Departments</h2>
                    <a style="float:right" href="{{ route('department.create') }}" class="btn btn-primary square-btn-adjust">Add Department</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Departments
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Icon</th>
                                        <th>Department Name</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($departments as $key=>$department)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td><i class="{{ $department->icon }} fa-2x"></i></td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->order }}</td>
                                        <td>
                                            @if($department->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td><a href="{{route('department.edit',$department->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form id="delete-form-{{ $department->id }}" action="{{ route('department.destroy',$department->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $department->id }}').submit();
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

