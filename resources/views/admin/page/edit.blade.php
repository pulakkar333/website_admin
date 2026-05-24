@extends('layouts.app')

@section('title','Edit Page')
@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Page</h2>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Page</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('page.update',$page->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" value="{{ $page->title }}" placeholder="Title" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Title</label>
                                        <input class="form-control" name="sub_title" value="{{ $page->sub_title }}" placeholder="Sub Title" />
                                    </div>

                                    <div class="form-group">
                                        <label>Menu (Title URI)</label>
                                        <select name="title_uri" class="form-control" required>
                                            @if (!empty($page->title_uri))
                                                <option value="{{ $parent_id_for->slug }}">{{ $parent_id_for->menu_name }}</option>
                                            @else
                                                <option value="">Select Menu</option>
                                            @endif

                                            @foreach($menu_all as $main_menu)
                                                <option value="{{ $main_menu->slug }}">{{ $main_menu->menu_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Short</label>
                                        <textarea class="form-control" name="short" rows="3">{{ $page->short }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control ckeditor" name="description" rows="3">{{ $page->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Image</label><br>
                                        <input type="file" name="image" id="imageInput" />
                                        <br>
                                        @if ($page->image)
                                            <div id="imagePreviewWrapper" style="position: relative; display: inline-block; margin-top: 10px;">
                                                <img src="{{ asset('uploads/page/'.$page->image) }}" class="img-thumbnail" width="100" height="100" />
                                                <button type="button" id="removeImageBtn" style="position: absolute; top: 2px; right: 2px; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; line-height: 16px; text-align: center; cursor: pointer;">&times;</button>
                                            </div>
                                            <input type="hidden" name="image_deleted" id="imageDeleted" value="0">
                                        @endif
                                    </div>

                                    <a href="{{ route('page.index') }}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Inline Script to handle delete -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const removeBtn = document.getElementById("removeImageBtn");
        const imageWrapper = document.getElementById("imagePreviewWrapper");
        const imageDeleted = document.getElementById("imageDeleted");

        if (removeBtn && imageWrapper && imageDeleted) {
            removeBtn.addEventListener("click", function () {
                alert("Image will be removed."); // Debug: remove later
                imageWrapper.style.display = "none";
                imageDeleted.value = "1";
            });
        }
    });
</script>

@endsection
