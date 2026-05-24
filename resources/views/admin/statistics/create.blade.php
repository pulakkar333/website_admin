@extends('layouts.app')

@section('title', 'Add New Statistic')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Add New Statistic</h2>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create New Statistic
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.statistics.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label>Label *</label>
                                        <input class="form-control" name="label" value="{{ old('label') }}"
                                               placeholder="e.g., Years Experience, Happy Clients" required/>
                                        <small class="form-text text-muted">This will be displayed on the website</small>
                                        @error('label')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Value *</label>
                                        <input type="number" class="form-control" name="value"
                                               value="{{ old('value', 0) }}" placeholder="e.g., 30, 400"
                                               min="0" required/>
                                        <small class="form-text text-muted">The counter will animate up to this number</small>
                                        @error('value')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Display Order *</label>
                                        <input type="number" class="form-control" name="order"
                                               value="{{ old('order', 1) }}" placeholder="e.g., 1, 2, 3"
                                               min="0" required/>
                                        <small class="form-text text-muted">Lower numbers appear first (1, 2, 3...)</small>
                                        @error('order')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="status" value="1"
                                                   {{ old('status', 1) ? 'checked' : '' }}/>
                                            Active
                                        </label>
                                        <small class="form-text text-muted">Only active statistics will be shown on the website</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create Statistic</button>
                                    <a href="{{ route('admin.statistics.index') }}" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

