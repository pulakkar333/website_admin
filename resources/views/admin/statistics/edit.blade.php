@extends('layouts.app')

@section('title', 'Edit Statistic')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Edit Statistic</h2>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Update Statistic Information
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.statistics.update', $statistic->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label>Key</label>
                                        <input class="form-control" name="key" value="{{ $statistic->key }}" 
                                               placeholder="e.g., years, products, solutions, support" required readonly/>
                                        <small class="form-text text-muted">The key is used in the API response</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Label</label>
                                        <input class="form-control" name="label" value="{{ $statistic->label }}" 
                                               placeholder="e.g., Years Experience" required/>
                                        <small class="form-text text-muted">This will be displayed on the website</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Value</label>
                                        <input type="number" class="form-control" name="value" 
                                               value="{{ $statistic->value }}" placeholder="e.g., 30" 
                                               min="0" required/>
                                        <small class="form-text text-muted">The counter will animate up to this number</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Display Order</label>
                                        <input type="number" class="form-control" name="order" 
                                               value="{{ $statistic->order }}" placeholder="e.g., 1" 
                                               min="0" required/>
                                        <small class="form-text text-muted">Lower numbers appear first</small>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="status" value="1" 
                                                   {{ $statistic->status ? 'checked' : '' }}/> 
                                            Active
                                        </label>
                                        <small class="form-text text-muted">Only active statistics will be shown on the website</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Statistic</button>
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

