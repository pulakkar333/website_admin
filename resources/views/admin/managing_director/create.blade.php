@extends('layouts.app')

@section('title', 'Add New Managing Director')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Add New Managing Director</h2>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create New Managing Director
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.managing_director.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input class="form-control" name="name" value="{{ old('name') }}"
                                               placeholder="e.g., John Doe" required/>
                                        <small class="form-text text-muted">Full name of the Managing Director</small>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Designation *</label>
                                        <input class="form-control" name="designation" value="{{ old('designation', 'Managing Director') }}"
                                               placeholder="e.g., Managing Director" required/>
                                        <small class="form-text text-muted">Official title</small>
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" name="message" rows="8"
                                                  placeholder="Write MD's message or speech here...">{{ old('message') }}</textarea>
                                        <small class="form-text text-muted">Message from the Managing Director (optional)</small>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Career Highlights</label>
                                        <div id="career-highlights-container">
                                            <div class="highlight-item" style="margin-bottom: 15px; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control"
                                                                   name="career_title[]"
                                                                   placeholder="e.g., Industry Experience">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Short Description</label>
                                                            <textarea class="form-control"
                                                                      name="career_short[]"
                                                                      rows="2"
                                                                      placeholder="e.g., Over 30 years of experience in technology sector"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-sm remove-highlight" style="margin-top: 25px;">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success btn-sm" id="add-highlight" style="margin-top: 10px;">
                                            <i class="fa fa-plus"></i> Add Another Highlight
                                        </button>
                                        <small class="form-text text-muted">Add career achievements and highlights with title and description (optional)</small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Profile Photo</label>
                                                <input type="file" class="form-control" name="image" accept="image/*"/>
                                                <small class="form-text text-muted">JPG, PNG, GIF, WEBP - Max: 2MB</small>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Signature</label>
                                                <input type="file" class="form-control" name="signature" accept="image/*"/>
                                                <small class="form-text text-muted">Signature image - Max: 1MB</small>
                                                @error('signature')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="status" value="1" checked/>
                                            Active
                                        </label>
                                        <small class="form-text text-muted">Show/hide on the website</small>
                                    </div>

                                    <hr/>

                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa fa-save"></i> Add Managing Director
                                    </button>
                                    <a href="{{ route('admin.managing_director.index') }}" class="btn btn-default btn-lg">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('career-highlights-container');
            const addButton = document.getElementById('add-highlight');

            // Add new highlight field
            addButton.addEventListener('click', function() {
                const newItem = document.createElement('div');
                newItem.className = 'highlight-item';
                newItem.style.marginBottom = '15px';
                newItem.style.padding = '15px';
                newItem.style.border = '1px solid #ddd';
                newItem.style.borderRadius = '5px';
                newItem.style.backgroundColor = '#f9f9f9';
                newItem.innerHTML = `
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control"
                                       name="career_title[]"
                                       placeholder="e.g., Leadership Excellence">
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea class="form-control"
                                          name="career_short[]"
                                          rows="2"
                                          placeholder="e.g., Led company to achieve record growth"></textarea>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger btn-sm remove-highlight" style="margin-top: 25px;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
                container.appendChild(newItem);
            });

            // Remove highlight field
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-highlight') ||
                    e.target.closest('.remove-highlight')) {
                    const item = e.target.closest('.highlight-item');
                    if (container.children.length > 1) {
                        item.remove();
                    } else {
                        item.querySelector('input[name="career_title[]"]').value = '';
                        item.querySelector('textarea[name="career_short[]"]').value = '';
                    }
                }
            });
        });
    </script>
@endsection

