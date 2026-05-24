@extends('layouts.app')

@section('title','Footer Addresses')
@section('content')

<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Footer Addresses</h2>
                    <a style="float:right" href="{{ route('footer-address.create') }}" class="btn btn-primary square-btn-adjust">Add Address</a>
                </div>
            </div>
            <hr />
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Addresses</div>
                    <div class="panel-body">
                        @include('layouts.partial.msg')
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Order</th>
                                    <th width="17%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($addresses as $key=>$address)
                                <tr class="odd gradeX">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $address->title }}</td>
                                    <td>{{ Str::limit($address->address, 80) }}</td>
                                    <td>{{ $address->order }}</td>
                                    <td>
                                        <a href="{{route('footer-address.edit',$address->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form id="delete-form-{{ $address->id }}" action="{{ route('footer-address.destroy',$address->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $address->id }}').submit();
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

