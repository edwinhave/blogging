<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">
                    {{ $article->category?->name ?? 'Uncategorized' }}
                </strong>
                <h3 class="mb-0">{{ $article->title }}</h3>
                <div class="mb-1 text-muted">{{ $article->updated_at }}</div>
                <p class="card-text mb-auto">{{ Str::limit($article->body, 50, ' ...') }}</p>
                <a href="{{ route('articles.show', $article) }}" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                @if ($article->image)
                    <img src="{{ $article->image_url }}" alt="image" width="200" height="250">
                @else
                    <img src="https://via.placeholder.com/200x250" width="200" height="250">
                @endif
            </div>
        </div>
    </div>

