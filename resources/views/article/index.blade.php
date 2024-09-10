<x-layout>
    <div class="container-fluid p-5 bg-p text-light text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 mt-5">Tutti gli articoli</h1>
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
                                <p class="small text-muted">Categoria:
                                    <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize text-muted">{{$article->category->name}}</a>
                                </p>
                            </div>
                            <div class="card-footer">
                                <p>Redatto il {{$article->created_at->format('d/m/Y')}} <br>
                                da <a href="{{route('article.byUser', $article->user)}}" class="text-capitalize text-muted">{{$article->user->name}}</a></p>
                                <a href="{{route('article.show', $article)}}" class="btn btn-primary">Leggi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-layout>