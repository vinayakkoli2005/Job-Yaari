@extends('layouts.admin')

@section('title', 'Manage Blogs')

@section('styles')
<style>
    .card-custom {
        background: #1e293b;
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    
    .table-custom {
        margin-bottom: 0;
    }
    
    .table-custom th {
        background-color: #1e293b;
        color: #94a3b8;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid rgba(255, 255, 255, 0.05);
        padding: 1.25rem 1.5rem;
    }
    
    .table-custom td {
        background-color: #1e293b;
        color: #e2e8f0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
    }
    
    .table-custom tr:last-child td {
        border-bottom: none;
    }
    
    .blog-thumb {
        width: 60px;
        height: 45px;
        border-radius: 8px;
        object-fit: cover;
        background-color: #0f172a;
    }
    
    .blog-thumb-placeholder {
        width: 60px;
        height: 45px;
        border-radius: 8px;
        background-color: #334155;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 0.8rem;
    }

    .badge-category {
        font-size: 0.75rem;
        padding: 0.35rem 0.75rem;
        border-radius: 8px;
        font-weight: 600;
    }
    
    /* Category Colors matching public badge pills */
    .bg-badge-admit-card {
        background-color: rgba(56, 189, 248, 0.15) !important;
        color: #38bdf8 !important;
    }
    
    .bg-badge-result {
        background-color: rgba(74, 222, 128, 0.15) !important;
        color: #4ade80 !important;
    }
    
    .bg-badge-job-notification {
        background-color: rgba(248, 113, 113, 0.15) !important;
        color: #f87171 !important;
    }
    
    .bg-badge-syllabus {
        background-color: rgba(251, 191, 36, 0.15) !important;
        color: #fbbf24 !important;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        border: none;
    }
    
    .btn-edit {
        background-color: rgba(99, 102, 241, 0.15);
        color: #818cf8;
    }
    
    .btn-edit:hover {
        background-color: #6366f1;
        color: white;
    }
    
    .btn-delete {
        background-color: rgba(239, 68, 68, 0.15);
        color: #f87171;
    }
    
    .btn-delete:hover {
        background-color: #ef4444;
        color: white;
    }

    /* Custom Pagination Styles */
    .pagination {
        margin-top: 1.5rem;
        margin-bottom: 0;
        gap: 0.25rem;
    }
    
    .page-link {
        background-color: #1e293b;
        border: 1px solid rgba(255, 255, 255, 0.05);
        color: #94a3b8;
        border-radius: 8px;
        padding: 0.5rem 0.85rem;
        transition: all 0.2s ease;
    }
    
    .page-link:hover {
        background-color: rgba(99, 102, 241, 0.1);
        color: #38bdf8;
        border-color: rgba(255, 255, 255, 0.1);
    }
    
    .page-item.active .page-link {
        background: linear-gradient(135deg, #38bdf8 0%, #6366f1 100%);
        color: white;
        border: none;
    }
    
    .page-item.disabled .page-link {
        background-color: #1e293b;
        color: #475569;
        border-color: rgba(255, 255, 255, 0.02);
    }
</style>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1 class="header-title">Blog Management</h1>
        <p class="header-subtitle">Create, update, and manage all your JobYaari blog articles.</p>
    </div>
    <div class="col-md-4 text-md-end d-flex align-items-center justify-content-md-end">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary rounded-3 px-4 py-2">
            <i class="fa-solid fa-circle-plus me-2"></i>Create New Blog
        </a>
    </div>
</div>

<div class="card card-custom overflow-hidden mb-4">
    <div class="table-responsive">
        <table class="table table-custom">
            <thead>
                <tr>
                    <th style="width: 80px;">Image</th>
                    <th>Title</th>
                    <th style="width: 180px;">Category</th>
                    <th style="width: 180px;">Published Date</th>
                    <th style="width: 120px;" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    @php
                        $categoryClass = 'bg-badge-' . strtolower(str_replace(' ', '-', $blog->category));
                    @endphp
                    <tr>
                        <td>
                            @if($blog->image_path)
                                <img src="{{ asset('storage/' . $blog->image_path) }}" alt="{{ $blog->title }}" class="blog-thumb">
                            @else
                                <div class="blog-thumb-placeholder">
                                    <i class="fa-regular fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold text-white mb-1" style="font-size: 0.95rem;">{{ $blog->title }}</div>
                            <div class="text-muted text-truncate" style="max-width: 450px; font-size: 0.85rem;">
                                {{ $blog->short_description }}
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-category {{ $categoryClass }}">
                                {{ $blog->category }}
                            </span>
                        </td>
                        <td>
                            <div class="fw-medium text-white-50" style="font-size: 0.9rem;">
                                <i class="fa-regular fa-calendar-check me-2 text-muted"></i>
                                {{ $blog->published_at->format('M d, Y') }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn-action btn-edit" title="Edit Blog">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                
                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post? This action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Delete Blog">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-regular fa-folder-open display-4 mb-3 d-block text-slate-600"></i>
                            No blog posts found. Click "Create New Blog" to write your first post.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $blogs->links() }}
</div>
@endsection
