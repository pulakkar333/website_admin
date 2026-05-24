@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Product</h2>
                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Edit Product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form method="POST" action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{ old('name', $item->name) }}" placeholder="Product Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Model Name</label>
                                            <input class="form-control" name="model_name" value="{{ old('model_name', $item->model_name) }}" placeholder="Model Name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <input class="form-control" name="product_brand" value="{{ old('product_brand', $item->product_brand) }}" placeholder="Product Brand" />
                                        </div>
                                        {{-- <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" value="{{ old('sub_title', $item->sub_title) }}" placeholder="Sub Title" />
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select name="parent_category" id="parent_category" class="form-control" required>
                                                <option value="">Select Parent Category</option>
                                                @foreach($parentCategories as $parentCategory)
                                                    <option value="{{ $parentCategory->id }}"
                                                        {{ $item->category && $item->category->parent_category_id == $parentCategory->id ? 'selected' : '' }}>
                                                        {{ $parentCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Sub Category</label>
                                            <select name="category" id="sub_category" class="form-control" required>
                                                <option value="">Select Sub Category</option>
                                                @foreach($subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}"
                                                        data-parent="{{ $subCategory->parent_category_id }}"
                                                        {{ $item->category_id == $subCategory->id ? 'selected' : '' }}>
                                                        {{ $subCategory->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                         <div class="form-group">
                                             <label>Technical Specifications</label>
                                         
                                            <textarea class="form-control ckeditor" name="details1">{{ old('details1', $item->details1) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                               <label>  Details </label>
                                             <textarea class="form-control ckeditor" name="description" placeholder="Description">{{ old('description', $item->description) }}</textarea>
                                        </div>

                                        {{-- <div class="form-group">
                                            <label>Title 1</label>
                                            <input class="form-control" name="title1" value="{{ old('title1', $item->title1) }}" placeholder="Title 1" />
                                        </div>

                                        <div class="form-group">
                                            <label>Details 1</label>
                                            <textarea class="form-control ckeditor" name="details1">{{ old('details1', $item->details1) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 2</label>
                                            <input class="form-control" name="title2" value="{{ old('title2', $item->title2) }}" placeholder="Title 2" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 2</label>
                                            <textarea class="form-control ckeditor" name="details2">{{ old('details2', $item->details2) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 3</label>
                                            <input class="form-control" name="title3" value="{{ old('title3', $item->title3) }}" placeholder="Title 3" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 3</label>
                                            <textarea class="form-control ckeditor" name="details3">{{ old('details3', $item->details3) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 4</label>
                                            <input class="form-control" name="title4" value="{{ old('title4', $item->title4) }}" placeholder="Title 4" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 4</label>
                                            <textarea class="form-control ckeditor" name="details4">{{ old('details4', $item->details4) }}</textarea>
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" />
                                            <br>
                                            @if($item->image)
                                                <img src="{{ asset('uploads/item/' . $item->image) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <p>No image uploaded.</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Brochure (PDF, DOC, DOCX - Max 10MB)</label>
                                            <input type="file" name="brochure" accept=".pdf,.doc,.docx"/>
                                            <p class="help-block">Upload product brochure for download</p>
                                            @if($item->brochure)
                                                <div class="alert alert-info">
                                                    <i class="fa fa-file"></i> Current brochure: <strong>{{ $item->brochure }}</strong>
                                                    <a href="{{ route('item.download.brochure', $item->id) }}" class="btn btn-xs btn-success" target="_blank">
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </div>
                                            @else
                                                <p>No brochure uploaded.</p>
                                            @endif
                                        </div>
                                        
                                        
                                         <div class="form-group">
                                            <label>SL (Order)</label>
                                            <input type="number" class="form-control" name="sl" value="{{ old('sl', $item->sl ?? 0) }}" placeholder="Serial Number/Order" />
                                            <p class="help-block">Lower numbers appear first. Products will be ordered by this field.</p>
                                        </div>

                                        <a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </form>

                                    <script>
                                        function filterSubCategories() {
                                            var parentId = document.getElementById('parent_category').value;
                                            var subCategorySelect = document.getElementById('sub_category');
                                            var options = subCategorySelect.getElementsByTagName('option');

                                            // Show/hide sub categories based on parent selection
                                            for (var i = 0; i < options.length; i++) {
                                                if (options[i].value === '') {
                                                    options[i].style.display = 'block';
                                                } else {
                                                    var dataParent = options[i].getAttribute('data-parent');
                                                    if (dataParent === parentId) {
                                                        options[i].style.display = 'block';
                                                    } else {
                                                        options[i].style.display = 'none';
                                                        // If this was selected but parent changed, clear selection
                                                        if (options[i].selected && dataParent !== parentId) {
                                                            subCategorySelect.value = '';
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        document.getElementById('parent_category').addEventListener('change', filterSubCategories);
                                        // Run on page load to filter based on current selection
                                        window.addEventListener('load', filterSubCategories);
                                    </script>

                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection