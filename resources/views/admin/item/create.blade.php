@extends('layouts.app')

@section('title', 'Add Product')
@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Product</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Product
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('item.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" placeholder="Title" />
                                        </div>
                                        <div class="form-group">
                                            <label>Model Name</label>
                                            <input class="form-control" name="model_name" placeholder="Model Name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <input class="form-control" name="product_brand" placeholder="Product Brand" />
                                        </div>

                                        {{-- <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" placeholder="Sub Title" />
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select name="parent_category" id="parent_category" class="form-control"
                                                required>
                                                <option value="">Select Parent Category</option>
                                                @foreach($parentCategories as $parentCategory)
                                                    <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Sub Category</label>
                                            <select name="category" id="sub_category" class="form-control" required>
                                                <option value="">Select Sub Category</option>
                                                @foreach($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}"
                                                        data-parent="{{$subCategory->parent_category_id}}">
                                                        {{$subCategory->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Technical Specifications</label>
                                            <textarea class="form-control ckeditor" name="details1"
                                                placeholder="Details 1"></textarea>
                                        </div>
                                        <div class="form-group">

                                            <label> Details </label>
                                            <textarea class="form-control ckeditor" name="description"
                                                placeholder="Description"></textarea>

                                        </div>

                                        {{-- <div class="form-group">
                                            <label>Title 1</label>
                                            <input class="form-control" name="title1" placeholder="Title 1" />
                                        </div>

                                        <div class="form-group">
                                            <label>Details 1</label>
                                            <textarea class="form-control ckeditor" name="details1"
                                                placeholder="Details 1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 2</label>
                                            <input class="form-control" name="title2" placeholder="Title 2" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 2</label>
                                            <textarea class="form-control ckeditor" name="details2"
                                                placeholder="Details 2"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 3</label>
                                            <input class="form-control" name="title3" placeholder="Title 3" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 3</label>
                                            <textarea class="form-control ckeditor" name="details3"
                                                placeholder="Details 3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Title 4</label>
                                            <input class="form-control" name="title4" placeholder="Title 4" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 4</label>
                                            <textarea class="form-control ckeditor" name="details4"
                                                placeholder="Details 4"></textarea>
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" />
                                        </div>

                                        <div class="form-group">
                                            <label>Brochure (PDF, DOC, DOCX - Max 10MB)</label>
                                            <input type="file" name="brochure" accept=".pdf,.doc,.docx" />
                                            <p class="help-block">Upload product brochure for download</p>
                                        </div>
                                        <div class="form-group">
                                            <label>SL (Order)</label>
                                            <input type="number" class="form-control" name="sl"
                                                placeholder="Serial Number/Order" value="0" />
                                            <p class="help-block">Lower numbers appear first. Products will be ordered by
                                                this field.</p>
                                        </div>


                                        <a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>

                                    </form>
                                    <br />

                                    <script>
                                        document.getElementById('parent_category').addEventListener('change', function () {
                                            var parentId = this.value;
                                            var subCategorySelect = document.getElementById('sub_category');
                                            var options = subCategorySelect.getElementsByTagName('option');

                                            // Reset sub category
                                            subCategorySelect.value = '';

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
                                                    }
                                                }
                                            }
                                        });
                                    </script>




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