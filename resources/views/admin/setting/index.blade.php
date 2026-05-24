@extends('layouts.app')

@section('title','All Settings')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <!--<div class="col-md-12">-->
                <!--    <h2>Site Settings</h2>-->
                <!--    <a style="float:right" href="{{ route('setting.create') }}" class="btn btn-primary square-btn-adjust">Add Setting</a>-->
                <!--    <div class="row">-->

                <!--</div>-->
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Settings
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Key</th>
                                        <th>Value</th>
                                        <th>Type</th>
                                        <!--<th>Status</th>-->
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $key=>$setting)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong>{{ $setting->key }}</strong></td>
                                        <td>{{ Str::limit($setting->value, 60) }}</td>
                                        <td>{{ ucfirst($setting->type) }}</td>
                                        <!--<td>-->
                                        <!--    @if($setting->status == 1)-->
                                        <!--        <span class="badge badge-success">Active</span>-->
                                        <!--    @else-->
                                        <!--        <span class="badge badge-danger">Inactive</span>-->
                                        <!--    @endif-->
                                        <!--</td>-->
                                        <td><a href="{{route('setting.edit',$setting->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form id="delete-form-{{ $setting->id }}" action="{{ route('setting.destroy',$setting->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $setting->id }}').submit();
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