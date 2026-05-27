@extends('layouts.app')

@section('title', 'Latest Govt Job Openings, Admit Cards & Exam Results')

@section('styles')
<style>
    /* Hero Section */
    .hero-section {
        padding: 5rem 0 3.5rem 0;
        background: radial-gradient(circle at 80% 20%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                    radial-gradient(circle at 10% 80%, rgba(56, 189, 248, 0.1) 0%, transparent 40%);
        text-align: center;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        letter-spacing: -1px;
        color: #f8fafc;
        margin-bottom: 1rem;
    }

    .hero-title span {
        background: linear-gradient(to right, #38bdf8, #818cf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: #94a3b8;
        max-width: 650px;
        margin: 0 auto 2.5rem auto;
        font-weight: 400;
    }

    /* Filters Section */
    .filter-container {
        background: rgba(30, 41, 59, 0.5);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 24px;
        padding: 1.75rem;
        margin-bottom: 3.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form-control-custom {
        background-color: rgba(15, 23, 42, 0.6) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        color: #f8fafc !important;
        border-radius: 14px !important;
        padding: 0.8rem 1.25rem !important;
        font-size: 0.95rem !important;
        transition: all 0.3s ease !important;
    }

    .form-control-custom:focus {
        background-color: rgba(15, 23, 42, 0.8) !important;
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15) !important;
    }

    .form-control-custom::placeholder {
        color: #475569;
    }

    .form-select-custom {
        background-color: rgba(15, 23, 42, 0.6) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        color: #f8fafc !important;
        border-radius: 14px !important;
        padding: 0.8rem 1.25rem !important;
        font-size: 0.95rem !important;
        transition: all 0.3s ease !important;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
        background-size: 12px 12px !important;
    }

    .form-select-custom:focus {
        background-color: rgba(15, 23, 42, 0.8) !important;
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15) !important;
    }

    .form-select-custom option {
        background-color: #1e293b;
        color: #f8fafc;
    }

    /* Category Badges / Pills */
    .category-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: center;
        margin-top: 1.25rem;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        padding-top: 1.25rem;
    }

    .category-pill {
        background-color: rgba(30, 41, 59, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.05);
        color: #94a3b8;
        padding: 0.5rem 1.25rem;
        border-radius: 100px;
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .category-pill:hover {
        color: #38bdf8;
        border-color: rgba(56, 189, 248, 0.3);
        background-color: rgba(56, 189, 248, 0.03);
    }

    .category-pill.active {
        background: linear-gradient(135deg, #38bdf8 0%, #6366f1 100%);
        color: white;
        border: none;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    /* Cards Grid Styling */
    .card-custom {
        background-color: #1e293b;
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
    }

    .card-custom:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        border-color: rgba(99, 102, 241, 0.2);
    }

    .card-img-wrapper {
        position: relative;
        height: 210px;
        overflow: hidden;
        background-color: #0f172a;
    }

    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card-custom:hover .card-img-top {
        transform: scale(1.08);
    }

    .card-img-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #1e1b4b 0%, #311042 100%);
        color: rgba(255, 255, 255, 0.25);
    }

    .card-img-placeholder i {
        font-size: 3rem;
        margin-bottom: 0.5rem;
        background: linear-gradient(to right, #38bdf8, #818cf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        opacity: 0.6;
    }

    .placeholder-text {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #64748b;
    }

    .badge-category {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 0.75rem;
        padding: 0.4rem 0.85rem;
        border-radius: 8px;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
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

    .card-body {
        padding: 1.5rem;
    }

    .meta-date {
        font-size: 0.8rem;
        color: #64748b;
        font-weight: 500;
    }

    .card-title {
        font-size: 1.15rem;
        line-height: 1.4;
        transition: color 0.2s ease;
    }

    .card-custom:hover .card-title {
        color: #38bdf8 !important;
    }

    .card-text {
        font-size: 0.9rem;
        line-height: 1.5;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .btn-readmore {
        color: #cbd5e1;
        font-size: 0.9rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        padding: 0;
        transition: color 0.2s ease;
    }

    .card-custom:hover .btn-readmore {
        color: #38bdf8;
    }

    .transition-arrow {
        transition: transform 0.2s ease;
    }

    .card-custom:hover .transition-arrow {
        transform: translateX(4px);
    }

    /* Loading Spinner overlay */
    #blog-grid-wrapper {
        position: relative;
        min-height: 250px;
    }

    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        border-radius: 20px;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s ease;
    }

    .loading-overlay.active {
        opacity: 1;
        pointer-events: auto;
    }

    .spinner-custom {
        width: 3rem;
        height: 3rem;
        color: #38bdf8;
    }
</style>
@endsection

@section('content')
<!-- Hero Header -->
<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Job<span>Yaari</span> Blog Portal</h1>
        <p class="hero-subtitle">Instant notifications and updates on Government Jobs, Syllabus, Hall Tickets, and Exams.</p>
    </div>
</section>

<!-- Main Blogs Area -->
<section class="pb-5">
    <div class="container">
        <!-- Search and Filter Bar -->
        <div class="filter-container">
            <div class="row g-3">
                <!-- Search Input -->
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0 text-muted ps-3 pe-1"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" id="search" class="form-control form-control-custom border-start-0" placeholder="Search by blog title (e.g. UPSC, SSC, IBPS)...">
                    </div>
                </div>
                
                <!-- Date Filter -->
                <div class="col-lg-4">
                    <select id="date-filter" class="form-select form-select-custom">
                        <option value="">All Months</option>
                        @foreach($dates as $date)
                            <option value="{{ $date['value'] }}">{{ $date['label'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <!-- Category Filter Badges -->
            <div class="category-pills">
                <div class="category-pill active" data-category="">All Categories</div>
                <div class="category-pill" data-category="Admit Card">Admit Card</div>
                <div class="category-pill" data-category="Result">Result</div>
                <div class="category-pill" data-category="Job Notification">Job Notification</div>
                <div class="category-pill" data-category="Syllabus">Syllabus</div>
            </div>
        </div>

        <!-- Grid Container -->
        <div id="blog-grid-wrapper">
            <!-- Spinner -->
            <div class="loading-overlay" id="loadingOverlay">
                <div class="spinner-border spinner-custom" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <!-- Blog Card Row -->
            <div class="row" id="blog-grid">
                @include('blogs._cards_grid')
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- Load custom filter script -->
<script src="{{ asset('js/blog-filter.js') }}"></script>
@endsection
