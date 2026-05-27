@forelse($blogs as $blog)
    @php
        $categoryClass = 'bg-badge-' . strtolower(str_replace(' ', '-', $blog->category));
    @endphp
    <div class="col-md-6 col-lg-4 mb-4 blog-card-item">
        <div class="card card-custom">
            <!-- Card Image -->
            <div class="card-img-wrapper">
                @if($blog->image_path)
                    <img src="{{ asset('storage/' . $blog->image_path) }}" class="card-img-top" alt="{{ $blog->title }}">
                @else
                    <div class="card-img-placeholder">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span class="placeholder-text">JobYaari Updates</span>
                    </div>
                @endif
                <span class="badge badge-category {{ $categoryClass }}">
                    {{ $blog->category }}
                </span>
            </div>
            
            <!-- Card Body -->
            <div class="card-body d-flex flex-column">
                <div class="card-meta d-flex justify-content-between align-items-center mb-3">
                    <span class="meta-date"><i class="fa-regular fa-calendar me-2"></i>{{ $blog->published_at->format('M d, Y') }}</span>
                </div>
                
                <h5 class="card-title text-white fw-bold mb-2">{{ $blog->title }}</h5>
                <p class="card-text text-muted mb-4">{{ $blog->short_description }}</p>
                
                <a href="{{ route('blogs.show', $blog->id) }}" class="btn-readmore mt-auto text-decoration-none">
                    Read Full Post <i class="fa-solid fa-arrow-right ms-2 transition-arrow"></i>
                </a>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 py-5 text-center text-muted">
        <i class="fa-regular fa-face-frown display-3 mb-3 d-block text-slate-600"></i>
        <h4 class="text-white fw-semibold mb-2">No updates found</h4>
        <p class="mb-0">Try clearing filters or adjusting your search terms.</p>
    </div>
@endforelse
