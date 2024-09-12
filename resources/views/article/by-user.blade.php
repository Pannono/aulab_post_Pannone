<x-layout>
    
    <div class="container-fluid p-5 bg-p text-light text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 mt-5">{{$user->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            
            @foreach ($articles as $article)
            
            <div class="col-12 col-md-3">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($article->image)}}" class="img-fluid rounded-start" alt="Immagine dell'articolo {{$article->title}}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <h6 class="card-subtitle">{{$article->subtitle}}</h6>
                            </div>
                            @if ($article->category)
                            <p class="small text-muted">Categoria:
                                <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize text-muted">{{$article->category->name}}</a>
                            </p>
                            @else
                            <p class="small text-muted">Nessuna categoria</p>
                            @endif
                            <p class="small text-muted my-0">
                                @foreach ($article->tags as $tag)
                                #{{$tag->name}}
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            
        </div>
        
    </div>
</x-layout>