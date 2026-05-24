@extends('layouts.app')

@section('title','Partner Support & Benefits')
@section('content')

<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Partner Support & Benefits</h2>
                    <a style="float:right" href="{{ route('partner-support-benefit.create') }}" class="btn btn-primary square-btn-adjust">Add Benefit</a>
                </div>
            </div>
            <hr />
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Benefits</div>
                    <div class="panel-body">
                        @include('layouts.partial.msg')
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Order</th>
                                    <th width="17%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($benefits as $key=>$benefit)
                                <tr class="odd gradeX">
                                    <td>{{ $key + 1 }}</td>
                                    <td><i class="{{ $benefit->icon }} fa-2x"></i></td>
                                    <td>{{ $benefit->title }}</td>
                                    <td>{{ $benefit->order }}</td>
                                    <td>
                                        <a href="{{route('partner-support-benefit.edit',$benefit->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form id="delete-form-{{ $benefit->id }}" action="{{ route('partner-support-benefit.destroy',$benefit->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $benefit->id }}').submit();
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

