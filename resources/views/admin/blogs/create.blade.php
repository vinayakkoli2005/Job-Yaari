@extends('layouts.admin')

@section('title', 'Create New Blog')

@section('styles')
<style>
    .card-custom {
        background: #1e293b;
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        padding: 2.5rem;
    }
    
    .form-label {
        font-weight: 600;
        color: #cbd5e1;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        background-color: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #f8fafc;
        border-radius: 12px;
        padding: 0.8rem 1.25rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        background-color: rgba(15, 23, 42, 0.8);
        border-color: #6366f1;
        color: #f8fafc;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    }
    
    .form-control::placeholder {
        color: #475569;
    }
    
    .form-select option {
        background-color: #1e293b;
        color: #f8fafc;
    }
    
    .image-preview-container {
        border: 2px dashed rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        background: rgba(15, 23, 42, 0.3);
        transition: all 0.3s ease;
        position: relative;
        cursor: pointer;
    }
    
    .image-preview-container:hover {
        border-color: #38bdf8;
        background: rgba(15, 23, 42, 0.5);
    }
    
    .image-preview-img {
        max-width: 100%;
        max-height: 250px;
        border-radius: 12px;
        display: none;
        margin-top: 1rem;
        object-fit: cover;
    }
    
    .image-preview-icon {
        font-size: 2.5rem;
        color: #475569;
        margin-bottom: 0.75rem;
    }
</style>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-link text-decoration-none text-muted p-0 mb-3 d-inline-flex align-items-center">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Blog List
        </a>
        <h1 class="header-title">Create New Blog</h1>
        <p class="header-subtitle">Publish a new job, exam details, syllabus, or notifications.</p>
    </div>
</div>

<div class="card card-custom">
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-lg-8">
                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="form-label">Blog Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="e.g. UPSC Prelims Exam Date 2026 Out" value="{{ old('title') }}" required>
                </div>

                <!-- Short Description -->
                <div class="mb-4">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="3" class="form-control" placeholder="A short 1-2 sentence preview for cards..." required>{{ old('short_description') }}</textarea>
                </div>

                <!-- Full Content -->
                <div class="mb-4">
                    <label for="content" class="form-label">Full Blog Content</label>
                    <textarea name="content" id="content" class="form-control" required>{{ old('content') }}</textarea>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Category -->
                <div class="mb-4">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="" disabled selected>Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Published At -->
                <div class="mb-4">
                    <label for="published_at" class="form-label">Published Date</label>
                    <input type="date" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', date('Y-m-d')) }}" required>
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label class="form-label">Featured Image</label>
                    <div class="image-preview-container" onclick="document.getElementById('image').click();">
                        <div class="image-preview-default" id="previewDefault">
                            <i class="fa-solid fa-cloud-arrow-up image-preview-icon"></i>
                            <div class="text-white fw-semibold">Upload Image</div>
                            <div class="text-muted" style="font-size: 0.8rem;">PNG, JPG, JPEG up to 2MB</div>
                        </div>
                        <img src="" alt="Preview" class="image-preview-img" id="previewImage">
                        <input type="file" name="image" id="image" class="d-none" accept="image/*" onchange="previewFile();">
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4 border-secondary opacity-25">

        <div class="d-flex justify-content-end gap-3">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary rounded-3 px-4 py-2 text-white border-secondary">
                Cancel
            </a>
            <button type="submit" class="btn btn-primary rounded-3 px-5 py-2">
                Publish Blog <i class="fa-solid fa-paper-plane ms-2"></i>
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<!-- TinyMCE CDN -->
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
        skin: 'oxide-dark',
        content_css: 'dark',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
        toolbar: 'undo redo | blocks | bold italic underline strikethrough superscript subscript | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | charmap | code fullscreen preview | help',
        menubar: 'file edit view insert format tools table help',
        height: 480,
        promotion: false,
        branding: false,
        statusbar: true,
        resize: true,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    function previewFile() {
        const preview = document.getElementById('previewImage');
        const defaultView = document.getElementById('previewDefault');
        const file = document.getElementById('image').files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = "block";
            defaultView.style.display = "none";
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = "none";
            defaultView.style.display = "block";
        }
    }
</script>
@endsection
