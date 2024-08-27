<x-layout>
    <div class="container py-5">
        <div class="row height-title align-items-center justify-content-center ">
            <div class="col-12 col-md-7">
                <h1 class="display-4 text-center backdrop p-5">Dettaglio del libro: <span class="fst-italic ">
                        {{ $book->title }}</span> </h1>
            </div>
        </div>
        <div class="row justify-content-center py-5 text-white backdrop">
            <div class="col-12 col-md-6">

                @if ($book->cover)
                    <img src="{{ Storage::url($book->cover) }}" alt="">
                @else
                    <img src="https://picsum.photos/500" alt="" class="rounded shadow">
                @endif

            </div>
            <div class="col-12 col-md-6">
                <h2 class="title">Titolo: {{ $book->title }}</h2>
                <h5 class="fst-italic">Numero di pagine: {{ $book->pages }}</h5>
                <h5>Prezzo {{ $book->price }}€</h5>
                <h3> Trama:</h3>
                <p>{{ $book->plot }}</p>

                {{-- traversamento di un modello --}}
                <p class="text-white fst-italic"> Libro aggiunto da: {{ $book->user->name }} </p>

                @if (count($book->categories) > 0)
                    <h6>Categorie del libro:</h6>
                    <ul>
                        @foreach ($book->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach

                    </ul>
                @endif
            </div>
            <div class="row justify-content-end ">
                <div class="col-12  d-flex flex-column align-items-end">
                    <form action="{{ route('book.delete', compact('book')) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete mx-2">Cancella</button>
                    </form>
                    <a href="{{ route('book.edit', compact('book')) }}" class="btn btn-edit ">Modifica
                        libro</a>
                </div>

            </div>
        </div>
    </div>

</x-layout>
