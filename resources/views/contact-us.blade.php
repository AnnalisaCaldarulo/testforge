<x-layout>
    <div class="container pt-5">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-5 backdrop">
                <h1 class="text-center display-4">
                    Contattaci!
                </h1>
                @if (session('errorMail'))
                    <div class="alert alert-danger text-center">
                        {{ session('errorMail') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6">
                <form class="backdrop p-5 my-5 " method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    {{-- CROSS SITE REQUEST FORGERY = falsificazione di richiesta inviata da un sito a un altro --}}
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Inserisci il tuo nome:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Inserisci la tua email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Scrivi il tuo messaggio:</label>
                        <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
