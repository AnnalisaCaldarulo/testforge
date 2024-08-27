<x-layout>
    <div class="container pt-5">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-5 backdrop ">
                <h1 class="text-center display-4">CREA IL TUO LIBRO</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="p-5 backdrop   my-5 " method="POST" action="{{ route('book.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- CROSS SITE REQUEST FORGERY = falsificazione di richiesta inviata da un sito a un altro --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Scrivi il titolo:</label>
                        <input type="text" class="form-control @error('title') is-invalid  @enderror" name="title"
                            value="{{ old('title') }}" id="title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="plot" class="form-label">Descrivi la trama:</label>
                        <textarea name="plot" id="plot" cols="30" rows="10"
                            class="form-control  @error('plot') is-invalid  @enderror">{{ old('plot') }}</textarea>
                        @error('plot')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Inserisci il prezzo:</label>
                        <div class="input-container">
                            <i class="bi bi-currency-euro icon py-2"></i>
                            <input type="text"
                                class="input-field form-control @error('price') is-invalid  @enderror " name="price"
                                id="price" value="{{ old('price') }}">

                        </div>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pages" class="form-label">Inserisci il numero di pagine:</label>
                        <input type="number" class="form-control @error('pages') is-invalid  @enderror" name="pages"
                            id="pages" value="{{ old('pages') }}">
                        @error('pages')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Inserisci l'immagine di copertina:</label>
                        <input type="file" class="form-control @error('cover') is-invalid  @enderror" name="cover"
                            id="cover">
                        @error('cover')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        @foreach ($categories as $category)
                            <input type="checkbox" value="{{ $category->id }}" name="categories[]"
                                class="form-check-input" id="{{ 'category-' . $category->name }}">
                            <label class="form-check-label"
                                for="{{ 'category-' . $category->name }}">{{ $category->name }}</label>
                        @endforeach
                        <p>Non vedi la categoria giusta? <a href="{{ route('category.create') }}">Inseriscila tu</a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom">Crea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
