@extends('layouts.app')

@section('title','All Career Benefits')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Career Benefits</h2>
                    <a style="float:right" href="{{ route('careerbenefit.create') }}" class="btn btn-primary square-btn-adjust">Add Career Benefit</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Career Benefits
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
                                        <th>Description</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($careerBenefits as $key=>$benefit)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td><i class="{{ $benefit->icon }} fa-2x"></i></td>
                                        <td>{{ $benefit->title }}</td>
                                        <td>{{ Str::limit($benefit->description, 50) }}</td>
                                        <td>{{ $benefit->order }}</td>
                                        <td>
                                            @if($benefit->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td><a href="{{route('careerbenefit.edit',$benefit->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form id="delete-form-{{ $benefit->id }}" action="{{ route('careerbenefit.destroy',$benefit->id) }}" style="display: none;" method="POST">
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
                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>

@endsection

