@extends('layouts.app')

@section('title','Add Dealership Category')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Dealership Category</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add New Category</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <form role="form" method="post" action="{{ route('dealership-category.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Details <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="details" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="0" />
                                        </div>
                                        <a href="{{ route('dealership-category.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

