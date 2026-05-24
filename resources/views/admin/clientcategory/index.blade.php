@extends('layouts.app')

@section('title','All Client Categories')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Client Categories</h2>
                    <a style="float:right" href="{{ route('clientcategory.create') }}" class="btn btn-primary square-btn-adjust">Add Client Category</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Client Categories
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Category Name</th>
                                        {{-- <th>Title</th>
                                        <th>Order</th>
                                        <th>Status</th> --}}
                                        <th width="17%;">Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clientCategories as $key=>$category)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>

                                        {{-- <td>
                                            @if($category->image)
                                                <img src="{{ asset('uploads/clientmanage/' . $category->image) }}" alt="{{ $category->name }}" width="50" height="50" class="img-thumbnail">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td> --}}
                                        <td>{{ $category->name }}</td>

                                        {{-- <td>{{ $category->title ?? 'N/A' }}</td>
                                        <td>{{ $category->order }}</td>
                                        <td>
                                            @if($category->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td> --}}
                                        <td><a href="{{route('clientcategory.edit',$category->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form id="delete-form-{{ $category->id }}" action="{{ route('clientcategory.destroy',$category->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $category->id }}').submit();
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

