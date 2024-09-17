<div class="card mb-3 shadow-sm rounded border-0">
    <div class="row g-0">
        <div class="col-md-6">
            <img src="{{ Storage::url($article->image)}}" class="imgCard rounded-start" alt="Immagine dell'articolo {{$article->title}}">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title fw-bold text-primary">{{$article->title}}</h5>
                <h6 class="card-subtitle text-truncate text-muted mb-2">{{$article->subtitle}}</h6>
                @if ($article->category)
                <p class="small text-muted">Categoria:
                    <span class="badge bg-light text-dark">
                        <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize text-muted">{{$article->category->name}}</a>
                    </span>
                    
                </p>
                @else
                    <p class="small text-muted">Nessuna categoria</p>
                @endif
                <p class="small text-muted mb-0">
                    @foreach ($article->tags as $tag)
                        <span class="badge bg-light text-dark">#{{$tag->name}}</span>
                    @endforeach
                </p>
                <p class="card-subtitle text-muted fst-italic small mt-3">tempo di lettura {{$article->readDuration()}} min</p>
            </div>
            <div class="card-footer border-top-0 bg-transparent">
                <p class="small text-muted mb-1">Redatto il {{$article->created_at->format('d/m/Y')}} <br>
                da <a href="{{route('article.byUser', $article->user)}}" class="text-capitalize text-muted">{{$article->user->name}}</a></p>
                <a href="{{route('article.show', $article)}}" class="btn btn-primary btn-sm">Leggi</a>
            </div>
        </div>
    </div>
</div>