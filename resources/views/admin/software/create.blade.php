@extends('layouts.app')

@section('title', 'Add New Software')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Add Software Products</h2>
                        <p class="text-muted">Add multiple software products at once. Click "Add Another Software" to add more entries.</p>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create Software Products
                            </div>
                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('admin.software.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div id="software-container">
                                        <!-- First Software Entry -->
                                        <div class="software-item" style="margin-bottom: 30px; padding: 20px; border: 2px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
                                            <h4 style="margin-top: 0; color: #081953; border-bottom: 2px solid #081953; padding-bottom: 10px;">
                                                <i class="fa fa-laptop"></i> Software Product #1
                                            </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Software Name *</label>
                                                        <input class="form-control" name="name[]" value="{{ old('name.0') }}"
                                                               placeholder="e.g., DME Diagnostic Suite" required/>
                                                        <small class="form-text text-muted">Name of the software product</small>
                                                        @error('name.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Version</label>
                                                        <input class="form-control" name="version[]" value="{{ old('version.0') }}"
                                                               placeholder="e.g., 2.5.1"/>
                                                        <small class="form-text text-muted">Software version (optional)</small>
                                                        @error('version.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description[]" rows="2"
                                                          placeholder="Brief description of the software">{{ old('description.0') }}</textarea>
                                                <small class="form-text text-muted">Short description (optional)</small>
                                                @error('description.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Icon URL</label>
                                                <input class="form-control" name="icon[]" value="{{ old('icon.0') }}"
                                                       placeholder="https://example.com/icons/software-icon.png"/>
                                                <small class="form-text text-muted">Icon image URL (optional)</small>
                                                @error('icon.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>PDF Manual</label>
                                                        <input type="file" class="form-control" name="pdf_manual_link[]" accept=".pdf"/>
                                                        <small class="form-text text-muted">Upload PDF manual (Max: 10MB, optional)</small>
                                                        @error('pdf_manual_link.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Software File</label>
                                                        <input type="file" class="form-control" name="software_file[]" accept=".exe,.zip,.rar,.msi,.dmg,.deb,.rpm"/>
                                                        <small class="form-text text-muted">Upload software file (Max: 80MB, optional)</small>
                                                        @error('software_file.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Display Order *</label>
                                                        <input type="number" class="form-control" name="order[]"
                                                               value="{{ old('order.0', 1) }}" placeholder="1"
                                                               min="0" required/>
                                                        <small class="form-text text-muted">Display order</small>
                                                        @error('order.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <div style="margin-top: 5px;">
                                                            <label>
                                                                <input type="checkbox" name="status[]" value="1"
                                                                       {{ old('status.0', 1) ? 'checked' : '' }}/>
                                                                Active
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="text-align: right; margin-top: 15px;">
                                                <button type="button" class="btn btn-danger btn-sm remove-software">
                                                    <i class="fa fa-trash"></i> Remove This Software
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="margin-top: 20px;">
                                        <button type="button" class="btn btn-success" id="add-software">
                                            <i class="fa fa-plus"></i> Add Another Software
                                        </button>
                                    </div>

                                    <hr style="margin-top: 30px;"/>

                                    <div class="alert alert-info" style="margin-top: 20px;">
                                        <i class="fa fa-info-circle"></i> <strong>Note:</strong> Installation Steps, License Information, and Support Details are managed separately.
                                        <a href="{{ route('admin.software-support-settings.edit') }}" class="alert-link">Click here to manage Support & Installation Settings</a>
                                    </div>

                                    <hr style="margin-top: 30px;"/>

                                    <div style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa fa-save"></i> Save All Software Products
                                        </button>
                                        <a href="{{ route('admin.software.index') }}" class="btn btn-default btn-lg">Cancel</a>
                                    </div>
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
            const container = document.getElementById('software-container');
            const addButton = document.getElementById('add-software');
            let softwareCount = 1;

            // Add new software field
            addButton.addEventListener('click', function() {
                softwareCount++;
                const newItem = document.createElement('div');
                newItem.className = 'software-item';
                newItem.style.marginBottom = '30px';
                newItem.style.padding = '20px';
                newItem.style.border = '2px solid #ddd';
                newItem.style.borderRadius = '8px';
                newItem.style.backgroundColor = '#f9f9f9';
                newItem.innerHTML = `
                    <h4 style="margin-top: 0; color: #081953; border-bottom: 2px solid #081953; padding-bottom: 10px;">
                        <i class="fa fa-laptop"></i> Software Product #${softwareCount}
                    </h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Software Name *</label>
                                <input class="form-control" name="name[]"
                                       placeholder="e.g., DME Diagnostic Suite" required/>
                                <small class="form-text text-muted">Name of the software product</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Version</label>
                                <input class="form-control" name="version[]"
                                       placeholder="e.g., 2.5.1"/>
                                <small class="form-text text-muted">Software version (optional)</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description[]" rows="2"
                                  placeholder="Brief description of the software"></textarea>
                        <small class="form-text text-muted">Short description (optional)</small>
                    </div>

                    <div class="form-group">
                        <label>Icon URL</label>
                        <input class="form-control" name="icon[]"
                               placeholder="https://example.com/icons/software-icon.png"/>
                        <small class="form-text text-muted">Icon image URL (optional)</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>PDF Manual</label>
                                <input type="file" class="form-control" name="pdf_manual_link[]" accept=".pdf"/>
                                <small class="form-text text-muted">Upload PDF manual (Max: 10MB, optional)</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Software File</label>
                                <input type="file" class="form-control" name="software_file[]" accept=".exe,.zip,.rar,.msi,.dmg,.deb,.rpm"/>
                                <small class="form-text text-muted">Upload software file (Max: 80MB, optional)</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Display Order *</label>
                                <input type="number" class="form-control" name="order[]"
                                       value="${softwareCount}" placeholder="1"
                                       min="0" required/>
                                <small class="form-text text-muted">Display order</small>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div style="margin-top: 5px;">
                                    <label>
                                        <input type="checkbox" name="status[]" value="1" checked/>
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: right; margin-top: 15px;">
                        <button type="button" class="btn btn-danger btn-sm remove-software">
                            <i class="fa fa-trash"></i> Remove This Software
                        </button>
                    </div>
                `;
                container.appendChild(newItem);
            });

            // Remove software field
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-software') ||
                    e.target.closest('.remove-software')) {
                    const item = e.target.closest('.software-item');
                    if (container.children.length > 1) {
                        item.remove();
                        // Update numbering
                        updateSoftwareNumbers();
                    } else {
                        alert('You must have at least one software entry. Please clear the fields instead.');
                    }
                }
            });

            // Update software numbers
            function updateSoftwareNumbers() {
                const items = container.querySelectorAll('.software-item');
                items.forEach((item, index) => {
                    const h4 = item.querySelector('h4');
                    if (h4) {
                        h4.innerHTML = `<i class="fa fa-laptop"></i> Software Product #${index + 1}`;
                    }
                });
            }
        });
    </script>
@endsection
