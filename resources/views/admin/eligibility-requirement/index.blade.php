@extends('layouts.app')

@section('title','Eligibility Requirements')
@section('content')

<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Eligibility Requirements</h2>
                    <a style="float:right" href="{{ route('eligibility-requirement.create') }}" class="btn btn-primary square-btn-adjust">Add Requirement</a>
                </div>
            </div>
            <hr />
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Requirements</div>
                    <div class="panel-body">
                        @include('layouts.partial.msg')
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Order</th>
                                    <th width="17%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($requirements as $key=>$requirement)
                                <tr class="odd gradeX">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $requirement->title }}</td>
                                    <td>{!! Str::limit($requirement->description, 50) !!}</td>
                                    <td>{{ $requirement->order }}</td>
                                    <td>
                                        <a href="{{route('eligibility-requirement.edit',$requirement->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form id="delete-form-{{ $requirement->id }}" action="{{ route('eligibility-requirement.destroy',$requirement->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $requirement->id }}').submit();
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
            </div>
        </div>
    </div>
</div>

@endsection

