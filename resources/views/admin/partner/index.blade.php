@extends('layouts.app')

@section('title','All Partners')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Partners</h2>
                    <a style="float:right" href="{{ route('partner.create') }}" class="btn btn-primary square-btn-adjust">Add Partner</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Partners
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Website</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partners as $key=>$partner)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset('uploads/partners/'.$partner->image) }}" class="img-thumbnail" width="80" height="80" /></td>
                                        <td>{{ $partner->name }}</td>
                                        <td>{{ $partner->website ?? 'N/A' }}</td>
                                        <td>{{ $partner->order }}</td>
                                        <td>
                                            @if($partner->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td><a href="{{route('partner.edit',$partner->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form id="delete-form-{{ $partner->id }}" action="{{ route('partner.destroy',$partner->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $partner->id }}').submit();
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

