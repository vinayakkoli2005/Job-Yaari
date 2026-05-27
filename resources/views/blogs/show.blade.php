@extends('layouts.app')

@section('title', $blog->title)

@section('styles')
<style>
    .detail-card {
        background: #1e293b;
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 24px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        padding: 3rem;
        margin-top: 3.5rem;
        margin-bottom: 5rem;
    }
    
    .blog-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding-bottom: 2rem;
        margin-bottom: 2.5rem;
    }
    
    .blog-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #f8fafc;
        line-height: 1.3;
        margin-bottom: 1.25rem;
        letter-spacing: -0.5px;
    }

    .badge-category {
        font-size: 0.8rem;
        padding: 0.45rem 1rem;
        border-radius: 8px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    /* Category Badge Colors */
    .bg-badge-admit-card {
        background-color: #38bdf8 !important;
        color: #0f172a !important;
    }

    .bg-badge-result {
        background-color: #4ade80 !important;
        color: #0f172a !important;
    }

    .bg-badge-job-notification {
        background-color: #f87171 !important;
        color: #0f172a !important;
    }

    .bg-badge-syllabus {
        background-color: #fbbf24 !important;
        color: #0f172a !important;
    }

    .blog-meta {
        font-size: 0.95rem;
        color: #94a3b8;
        display: flex;
        gap: 1.5rem;
        align-items: center;
        flex-wrap: wrap;
    }

    .blog-hero-wrapper {
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        max-height: 480px;
        background-color: #0f172a;
    }

    .blog-hero-img {
        width: 100%;
        height: 100%;
        max-height: 480px;
        object-fit: cover;
    }
    
    .blog-hero-placeholder {
        width: 100%;
        height: 350px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #1e1b4b 0%, #311042 100%);
        color: rgba(255, 255, 255, 0.25);
    }
    
    .blog-hero-placeholder i {
        font-size: 5rem;
        margin-bottom: 1rem;
        background: linear-gradient(to right, #38bdf8, #818cf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        opacity: 0.6;
    }

    .blog-body-content {
        font-size: 1.15rem;
        line-height: 1.85;
        color: #cbd5e1;
    }
    
    .blog-body-content p {
        margin-bottom: 1.5rem;
    }
    
    .blog-body-content strong {
        color: #f8fafc;
        font-weight: 700;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="detail-card">
                <!-- Back Link -->
                <a href="/" class="btn btn-link text-decoration-none text-muted p-0 mb-4 d-inline-flex align-items-center">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back to All Updates
                </a>
                
                <!-- Header -->
                <div class="blog-header">
                    @php
                        $categoryClass = 'bg-badge-' . strtolower(str_replace(' ', '-', $blog->category));
                    @endphp
                    <span class="badge badge-category {{ $categoryClass }} mb-3">
                        {{ $blog->category }}
                    </span>
                    
                    <h1 class="blog-title">{{ $blog->title }}</h1>
                    
                    <div class="blog-meta">
                        <span><i class="fa-regular fa-calendar-check me-2 text-muted"></i>Published on <strong>{{ $blog->published_at->format('M d, Y') }}</strong></span>
                        <span><i class="fa-solid fa-briefcase me-2 text-muted"></i>Portal: <strong>JobYaari</strong></span>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="blog-hero-wrapper">
                    @if($blog->image_path)
                        <img src="{{ asset('storage/' . $blog->image_path) }}" alt="{{ $blog->title }}" class="blog-hero-img">
                    @else
                        <div class="blog-hero-placeholder">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span class="placeholder-text text-white-50" style="letter-spacing: 2px;">JobYaari Premium Updates</span>
                        </div>
                    @endif
                </div>
                
                <!-- Full Content -->
                <div class="blog-body-content">
                    {!! $blog->content !!}
                </div>
                
                <hr class="my-5 border-secondary opacity-25">
                
                <div class="text-center">
                    <a href="/" class="btn btn-outline-secondary rounded-3 px-4 py-2 text-white border-secondary">
                        <i class="fa-solid fa-house me-2"></i>Back to Home
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
