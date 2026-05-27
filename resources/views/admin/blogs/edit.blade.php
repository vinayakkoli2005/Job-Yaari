@extends('layouts.admin')

@section('title', 'Edit Blog')

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

    .form-control::placeholder { color: #475569; }

    .form-select option {
        background-color: #1e293b;
        color: #f8fafc;
    }

    .image-preview-container {
        border: 2px dashed rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 1.5rem;
        text-align: center;
        background: rgba(15, 23, 42, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .image-preview-container:hover {
        border-color: #38bdf8;
        background: rgba(15, 23, 42, 0.5);
    }

    .image-preview-img {
        max-width: 100%;
        max-height: 200px;
        border-radius: 10px;
        margin-top: 0.75rem;
        object-fit: cover;
    }

    .image-preview-icon {
        font-size: 2rem;
        color: #475569;
        margin-bottom: 0.5rem;
    }

    .remove-image-btn {
        background: rgba(239, 68, 68, 0.15);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #f87171;
        border-radius: 8px;
        padding: 0.4rem 0.85rem;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        margin-top: 0.75rem;
    }

    .remove-image-btn:hover {
        background: rgba(239, 68, 68, 0.3);
        border-color: #ef4444;
    }

    /* Make TinyMCE match dark theme */
    .tox .tox-editor-header { z-index: 1 !important; }
</style>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-link text-decoration-none text-muted p-0 mb-3 d-inline-flex align-items-center">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Blog List
        </a>
        <h1 class="header-title">Edit Blog Post</h1>
        <p class="header-subtitle">Update exam details, syllabus information, or results.</p>
    </div>
</div>

<div class="card card-custom">
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Row 1: Title --}}
        <div class="mb-4">
            <label for="title" class="form-label">Blog Title</label>
            <input type="text" name="title" id="title" class="form-control"
                placeholder="e.g. UPSC Prelims Exam Date 2026 Out"
                value="{{ old('title', $blog->title) }}" required>
        </div>

        {{-- Row 2: Short Description --}}
        <div class="mb-4">
            <label for="short_description" class="form-label">Short Description</label>
            <textarea name="short_description" id="short_description" rows="3"
                class="form-control"
                placeholder="A short 1-2 sentence preview shown on blog cards..." required>{{ old('short_description', $blog->short_description) }}</textarea>
        </div>

        {{-- Row 3: Full Content — full width --}}
        <div class="mb-4">
            <label for="content" class="form-label">Full Blog Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        <hr class="my-4 border-secondary opacity-25">

        {{-- Row 4: Category + Date + Image --}}
        <div class="row g-4">

            {{-- Category --}}
            <div class="col-lg-4">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ old('category', $blog->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Published Date --}}
            <div class="col-lg-4">
                <label for="published_at" class="form-label">Published Date</label>
                <input type="date" name="published_at" id="published_at" class="form-control"
                    value="{{ old('published_at', $blog->published_at->format('Y-m-d')) }}" required>
            </div>

            {{-- Image Upload --}}
            <div class="col-lg-4">
                <label class="form-label">Featured Image</label>

                {{-- Remove image checkbox (hidden, toggled by button) --}}
                <input type="hidden" name="remove_image" id="remove_image" value="0">

                <div class="image-preview-container" id="imageContainer" onclick="document.getElementById('image').click();">
                    @if($blog->image_path)
                        <div id="previewDefault" style="display:none;">
                            <i class="fa-solid fa-cloud-arrow-up image-preview-icon"></i>
                            <div class="text-white fw-semibold">Upload New Image</div>
                            <div class="text-muted" style="font-size:0.8rem;">PNG, JPG, JPEG up to 2MB</div>
                        </div>
                        <img src="{{ asset('storage/' . $blog->image_path) }}" alt="Preview"
                            class="image-preview-img" id="previewImage" style="display:block;">
                    @else
                        <div id="previewDefault">
                            <i class="fa-solid fa-cloud-arrow-up image-preview-icon"></i>
                            <div class="text-white fw-semibold">Upload Image</div>
                            <div class="text-muted" style="font-size:0.8rem;">PNG, JPG, JPEG up to 2MB</div>
                        </div>
                        <img src="" alt="Preview" class="image-preview-img" id="previewImage" style="display:none;">
                    @endif
                    <input type="file" name="image" id="image" class="d-none" accept="image/*" onchange="previewFile();">
                </div>

                @if($blog->image_path)
                    <div id="removeImageWrapper">
                        <button type="button" class="remove-image-btn" onclick="removeImage()">
                            <i class="fa-solid fa-trash-can"></i> Remove Image
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <hr class="my-4 border-secondary opacity-25">

        <div class="d-flex justify-content-end gap-3">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary rounded-3 px-4 py-2 text-white border-secondary">
                Cancel
            </a>
            <button type="submit" class="btn btn-primary rounded-3 px-5 py-2">
                Update Blog <i class="fa-solid fa-floppy-disk ms-2"></i>
            </button>
        </div>

    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
        skin: 'oxide-dark',
        content_css: 'dark',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
        toolbar: 'undo redo | blocks | bold italic underline strikethrough superscript subscript | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | charmap | code fullscreen preview | help',
        menubar: 'file edit view insert format tools table help',
        height: 500,
        width: '100%',
        promotion: false,
        branding: false,
        statusbar: true,
        resize: true,
        setup: function (editor) {
            editor.on('change', function () { editor.save(); });
        }
    });

    function previewFile() {
        const preview = document.getElementById('previewImage');
        const defaultView = document.getElementById('previewDefault');
        const file = document.getElementById('image').files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
            defaultView.style.display = 'none';
        };

        if (file) {
            reader.readAsDataURL(file);
            // If user uploads new image, cancel any remove request
            document.getElementById('remove_image').value = '0';
        }
    }

    function removeImage() {
        // Mark image for removal
        document.getElementById('remove_image').value = '1';

        // Clear the preview
        const preview = document.getElementById('previewImage');
        const defaultView = document.getElementById('previewDefault');
        preview.src = '';
        preview.style.display = 'none';
        defaultView.style.display = 'block';
        defaultView.innerHTML = '<i class="fa-solid fa-cloud-arrow-up image-preview-icon"></i><div class="text-white fw-semibold">Upload Image</div><div class="text-muted" style="font-size:0.8rem;">PNG, JPG, JPEG up to 2MB</div>';

        // Hide the remove button
        const wrapper = document.getElementById('removeImageWrapper');
        if (wrapper) wrapper.style.display = 'none';

        // Clear file input
        document.getElementById('image').value = '';
    }
</script>
@endsection
