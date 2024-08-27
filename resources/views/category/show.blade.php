<x-layout>
    <div class="container">
        <div class="row height-title align-items-center justify-content-center ">
            <div class="col-12 col-md-7">
                <h1 class="display-4 text-center backdrop p-5">Dettaglio della categoria {{ $category->name }}</h1>
            </div>
        </div>
        <div class="row justify-content-center py-5 text-white backdrop">
            <div class="col-12 ">
                <p class="text-center h3">{{ $category->description }}</p>
            </div>



        </div>
        <div class="row justify-content-center">
            @foreach ($category->books as $book)
                <x-card :book="$book"></x-card>
            @endforeach
        </div>
        <div class="row justify-content-center">
            @auth
                <div class="row justify-content-end text-end">
                    <div class="col-12 col-md-3 d-flex justify-content-end">
                        <form action="{{ route('category.delete', compact('category')) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete mx-2">Cancella</button>
                        </form>

                        <a href="{{ route('category.edit', compact('category')) }}" class="btn btn-edit ">Modifica</a>



                    </div>
                </div>
            @endauth

        </div>

    </div>

</x-layout>
