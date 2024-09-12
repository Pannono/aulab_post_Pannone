<x-layout>

    <div class="container-fluid p-5 bg-p text-light text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 mt-5">{{$article->title}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 d-flex flex-column">
                <img src="{{ Storage::url($article->image)}}" class="img-fluid rounded-start" alt="Immagine dell'articolo {{$article->title}}">
                <div class="text-center">
                    <h2>{{$article->subtitle}}</h2>
                    @if ($article->category)
                    <p class="fs-5"> Categoria:
                        <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize fw-bold text-muted">{{$article->category->name}}</a>
                    </p>
                    @else
                        <p class="fs-5">Nessuna categoria</p>
                    @endif
                    <p class="small text-muted my-0">
                        @foreach ($article->tags as $tag)
                            #{{$tag->name}}
                        @endforeach
                    </p>
                    <div class="text-muted my-3">
                        <p>Redatto il {{$article->created_at->format('d/m/Y')}} da <a href="{{route('article.byUser', $article->user)}}" class="text-capitalize text-muted fw-bold">{{$article->user->name}}</a></p>
                    </div>
                </div>
                <hr>
                <p>{{$article->body}}</p>
                @if (Auth::user() && Auth::user()->is_revisor)
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-evenly">
                                <form action="{{route('revisor.acceptArticle' , $article)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Accetta</button>
                                </form>
                                <form action="{{route('revisor.rejectArticle' , $article)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Rifiuta</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="text-center">
                    <a href="{{route('article.index')}}" class="btn btn-primary">Tutti gli articoli</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>