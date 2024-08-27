<x-layout>
    <div class="container">
        <div class="row height-custom align-items-center justify-content-center ">
            @if (session('successMail'))
                <div class="alert alert-success">
                    {{ session('successMail') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="col-12 col-md-7">
                <h1 class="display-4 text-center backdrop p-5">Il tuo viaggio inizia da qui!</h1>
            </div>
        </div>
        <div class="row justify-content-center py-5">
            @foreach ($books as $book)
                <div class="col-12 col-md-3 d-flex justify-content-center">
                    <x-card   
                    :book="$book"
                    ></x-card>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
