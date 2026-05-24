@extends('layouts.app')

@section('title','All Media')
@section('content')

<div id="wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Media</h2>
                    <a style="float:right" href="{{ route('publication.create') }}" class="btn btn-primary square-btn-adjust">Add Media</a>
                </div>
            </div>

            <hr />

            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Media
                    </div>
                    <div class="panel-body">

                        @include('layouts.partial.msg')

                        <div id="copy-alert" class="alert alert-success" style="display: none;">
                            ✅ URL copied to clipboard!
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>URL</th>
                                    <th width="17%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($publication as $key => $publication)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $publication->title }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/publication/'.$publication->image) }}"
                                                 class="img-thumbnail"
                                                 width="100" height="100" />
                                        </td>
                                        <td class="center">
                                            <span
                                                style="cursor: pointer; color: #007bff; text-decoration: underline;"
                                                onclick="copyToClipboard('{{ asset('uploads/publication/'.$publication->image) }}')"
                                                title="Click to copy"
                                            >
                                                {{ asset('uploads/publication/'.$publication->image) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('publication.edit', $publication->id) }}"
                                               class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form id="delete-form-{{ $publication->id }}"
                                                  action="{{ route('publication.destroy', $publication->id) }}"
                                                  style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit"
                                                    onclick="if(confirm('Are you sure? You want to delete this?')) {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $publication->id }}').submit();
                                                    } else {
                                                        event.preventDefault();
                                                    }"
                                                    class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
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

<!-- Copy to Clipboard Script -->
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function () {
            let alertBox = document.getElementById("copy-alert");
            alertBox.style.display = "block";
            setTimeout(() => {
                alertBox.style.display = "none";
            }, 2000);
        }, function (err) {
            console.error('Failed to copy text: ', err);
        });
    }
</script>

@endsection
