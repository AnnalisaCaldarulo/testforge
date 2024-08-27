<x-layout>
    <div class="container">
        <div class="row height-title align-items-center justify-content-center ">
            <div class="col-12 col-md-7">
                <h1 class="display-4 text-center backdrop p-5">Profilo di {{ Auth::user()->name }}</h1>

                <form action="{{ route('user.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Cancella utente</button>
                </form>

            </div>
        </div>
        <div class="row justify-content-center py-5"> 
            {{-- @dd(Auth::user()->books) --}}
            {{-- @foreach (Auth::user()->books as $book)
                <div class="col-12 col-md-3">
                    <x-card :book="$book"></x-card>
                </div>
            @endforeach --}}
            @foreach ($books as $book)
                <div class="col-12 col-md-3">
                    <x-card :book="$book"></x-card>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
