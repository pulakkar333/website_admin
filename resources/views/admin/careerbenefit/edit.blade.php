@extends('layouts.app')

@section('title','Edit Career Benefit')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Career Benefit</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit Career Benefit
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('careerbenefit.update', $careerBenefit->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input class="form-control" name="title" value="{{ $careerBenefit->title }}" required />

                                        </div>

                                        <div class="form-group">
                                            <label>Icon Class <span class="text-danger">*</span></label>
                                            <input class="form-control" name="icon" value="{{ $careerBenefit->icon }}" required />
                                            <p class="help-block">FontAwesome icon class</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" rows="4" required>{{ $careerBenefit->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Order</label>
                                            <input class="form-control" name="order" type="number" value="{{ $careerBenefit->order }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $careerBenefit->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $careerBenefit->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>

                                        <a href="{{ route('careerbenefit.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>

                                    </form>
                                    <br />




                            </div>
                        </div>
                    </div>
                    <!-- End Form Elements -->
                </div>
            </div>
            <!-- /. ROW  -->

            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

@endsection

