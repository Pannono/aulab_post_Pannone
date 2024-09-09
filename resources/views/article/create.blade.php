<x-layout>
    <div class="container-fluid p-5 bg-p text-light text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 mt-5">Crea un nuovo Articolo</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid p-5 bg-p text-light text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data" class="card p-5 shadow rounded border">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{old('subtitle')}}">
                        @error('subtitle')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select class="form-control" id="category" name="category">
                            <option selected disabled>Seleziona categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Contenuto</label>
                        <textarea class="form-control" id="body" name="body" cols="30" rows="7">{{old('body')}}</textarea>
                        @error('body')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-3 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-outline-secondary">Crea</button>
                        <a href="{{route('homepage')}}" class="text-secondary mt-2">Torna alla Home</a>
                    </div>
                </form>
</x-layout>