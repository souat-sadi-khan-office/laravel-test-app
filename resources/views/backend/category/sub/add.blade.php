@extends('backend.layouts.app')
@section('title', 'Sub Category Add')
{{-- @section('page_name', 'Category Add') --}}
@section('breadcrumb', 'Sub Category Add')

@section('content')
    <div class="row">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="h3 mb-0">Add Sub Category</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-house-add-fill"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> Sub Category Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <div class="card-body">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form id="categoryForm" class="content_form" action="{{ route('admin.category.store') }}"
                            enctype="multipart/form-data" data-editor="editor">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="name" class="form-label">
                                        Name 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="slug" class="form-label">
                                        Slug 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="slug" id="slug" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="icon" class="form-label">
                                        Icon 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="icon" value="fi-rr-list" class="form-control iconpicker" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="header" class="form-label">
                                        Parent Category 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="parent_id" data-placeholder="-- Select Parent Category --" id="subCategory" class="form-control select" required>
                                        <option value="">-- Select Parent Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="header" class="form-label">
                                        Header 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="header" class="form-control" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="site_title" class="form-label">
                                        Site Title 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="site_title" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="short_description" class="form-label">
                                        Short Description
                                    </label>
                                    <textarea name="short_description" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            @include('backend.components.descriptionInput')

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="meta_title" class="form-label">Meta Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="meta_title" class="form-control" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="meta_keyword" class="form-label">Meta Keyword <span class="text-danger"> Use
                                            Comma " , " *</span></label>
                                    <input type="text" name="meta_keyword" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="meta_description" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="meta_article_tag" class="form-label">Meta Article Tag <span
                                            class="text-danger"> Use Comma " , "</span></label>
                                    <input type="text" name="meta_article_tag" class="form-control">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="meta_script_tag" class="form-label">Meta Script Tag <span
                                            class="text-danger"> Use Comma " , "</span></label>
                                    <input type="text" name="meta_script_tag" class="form-control">
                                </div>
                            </div>
                            {{-- <input type="file" name="image" class="form-control"> --}}
                            <div class="row">
                                <div class="col-4 mt-4 p-5">
                                    <div class="row">
                                        <div class=" mb-3 col-6 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="status" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Status <span
                                                    class="text-danger">*</span></label>
                                        </div>


                                        <div class=" mb-3 col-6 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_featured" id="flexSwitchCheckChecked">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Feature?
                                                <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    @include('backend.components.imageInput')

                                </div>


                            </div>

                            <div id="preview">
                                <img id="imagePreview" alt="Image Preview" style="max-width: 50%; display: none;">
                            </div>

                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            <button type="button" id="submitting" class="btn btn-warning d-none"
                                disabled>Submitting..</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@push('styleforIconPicker')
    <link href="{{ asset('backend/assets/css/bootstrapicons-iconpicker.css') }}" rel="stylesheet">
@endpush


@push('script')
    <script src="{{ asset('backend/assets/js/bootstrapicon-iconpicker.js') }}"></script>
    <script>
        $(function() {
            $('.iconpicker').iconpicker();
            _initCkEditor("editor");
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            _formValidation();

            // Select2
            _componentSelect();

            // Handle file upload preview
            $('#uploadFile').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        $('#imagePreview').attr('src', event.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });


        });
    </script>

    <script>
        $(document).ready(function() {
            // Function to convert name to slug
            function generateSlug(name) {
                return name
                    .toString()
                    .toLowerCase()
                    .trim()
                    .replace(/&/g, '-and-') // Replace & with 'and'
                    .replace(/[^a-z0-9 -]/g, '') // Remove invalid characters
                    .replace(/\s+/g, '-') // Replace spaces with -
                    .replace(/-+/g, '-'); // Replace multiple - with single -
            }

            $('#name').on('input', function() {
                const name = $(this).val();
                const slug = generateSlug(name);
                $('#slug').val(slug);

                // Check if the slug exists
                $.ajax({
                    url: '{{ route('admin.slug.check') }}',
                    type: 'GET',
                    data: {
                        slug: slug,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.exists) {
                            const timestamp = Date.now(); // Get current timestamp
                            $('#slug').val(slug + '-' + timestamp); // Append timestamp to slug
                        }
                    }
                });
            });
        });
    </script>
@endpush
