<x-layout>
    <div class="container">
        <div class="row height-title align-items-center justify-content-center ">
            <div class="col-12 col-md-7">
                <h1 class="display-4 text-center backdrop p-5">Tutti i libri della piattaforma</h1>
            </div>
        </div>
        <div class="row justify-content-center py-5">
            @foreach ($books as $book)
                <div class="col-12 col-md-4">
                    <x-card :book="$book"></x-card>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
