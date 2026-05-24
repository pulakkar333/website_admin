@extends('layouts.app')

@section('title','Why Partner With Us')
@section('content')

<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Why Partner With Us</h2>
                    <a style="float:right" href="{{ route('why-partner.create') }}" class="btn btn-primary square-btn-adjust">Add New Item</a>
                </div>
            </div>
            <hr />
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Items</div>
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
                                    <th width="17%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key=>$item)
                                <tr class="odd gradeX">
                                    <td>{{ $key + 1 }}</td>
                                    <td><i class="{{ $item->icon }} fa-2x"></i></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->details, 50) }}</td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                                        <a href="{{route('why-partner.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('why-partner.destroy',$item->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $item->id }}').submit();
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

