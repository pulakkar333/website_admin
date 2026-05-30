@extends('layouts.app')

@section('title','Add Category')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <form role="form" method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" placeholder="Title" />
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label>Description</label>--}}
                                            {{--<textarea class="form-control ckeditor" rows="3" name="description"></textarea>--}}
                                        {{--</div>--}}
                                        <div class="form-group">
                                            <label>Album Photo</label>
                                            <input type="file" name="image" id="albumPhoto" accept="image/*"/>
                                            <div id="albumPreview" class="mt-3" style="display: none;">
                                                <p><strong>Album Photo Preview:</strong></p>
                                                <img id="albumPreviewImg" src="" alt="Album Preview" class="img-thumbnail" style="max-width: 300px; max-height: 300px;"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Gallery (Multiple)</label>
                                            <input type="file" class="form-control" placeholder="Image" name="images2[]" id="galleryPhotos" multiple accept="image/*"/>
                                            <div id="galleryPreview" class="mt-3" style="display: none;">
                                                <p><strong>Gallery Preview:</strong></p>
                                                <div id="galleryPreviewContainer" class="row" style="margin-top: 10px;"></div>
                                            </div>
                                        </div>


                                        <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>

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

<script>
    // Album Photo Preview
    document.addEventListener('DOMContentLoaded', function() {
        const albumPhoto = document.getElementById('albumPhoto');
        if (albumPhoto) {
            albumPhoto.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('albumPreviewImg').src = e.target.result;
                        document.getElementById('albumPreview').style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    document.getElementById('albumPreview').style.display = 'none';
                }
            });
        }

        // Gallery Photos Preview
        const galleryPhotos = document.getElementById('galleryPhotos');
        if (galleryPhotos) {
            galleryPhotos.addEventListener('change', function(e) {
                const files = e.target.files;
                const previewContainer = document.getElementById('galleryPreviewContainer');
                previewContainer.innerHTML = ''; // Clear previous previews

                if (files.length > 0) {
                    document.getElementById('galleryPreview').style.display = 'block';

                    Array.from(files).forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const colDiv = document.createElement('div');
                            colDiv.className = 'col-md-3 col-sm-4 col-xs-6';
                            colDiv.style.marginBottom = '15px';

                            const imgDiv = document.createElement('div');
                            imgDiv.style.position = 'relative';
                            imgDiv.style.border = '1px solid #ddd';
                            imgDiv.style.padding = '5px';
                            imgDiv.style.borderRadius = '4px';

                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'img-thumbnail';
                            img.style.width = '100%';
                            img.style.height = '150px';
                            img.style.objectFit = 'cover';

                            const fileName = document.createElement('p');
                            fileName.style.margin = '5px 0 0 0';
                            fileName.style.fontSize = '11px';
                            fileName.style.color = '#666';
                            fileName.style.textAlign = 'center';
                            fileName.textContent = file.name.length > 20 ? file.name.substring(0, 20) + '...' : file.name;

                            imgDiv.appendChild(img);
                            imgDiv.appendChild(fileName);
                            colDiv.appendChild(imgDiv);
                            previewContainer.appendChild(colDiv);
                        };
                        reader.readAsDataURL(file);
                    });
                } else {
                    document.getElementById('galleryPreview').style.display = 'none';
                }
            });
        }
    });
</script>

@endsection
