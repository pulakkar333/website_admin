@extends('layouts.app')

@section('title','Newsletter Subscribers')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Newsletter Subscribers</h2>
                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Subscribers ({{ $newsletters->count() }})
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Subscribed At</th>
                                        <th width="15%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($newsletters as $key=>$item)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Unsubscribed</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->format('d M Y, h:i A') }}</td>
                                        <td>
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('newsletter.destroy',$item->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $item->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No subscribers yet</td>
                                    </tr>
                                    @endforelse



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

