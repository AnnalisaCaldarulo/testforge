<x-layout>
    <div class="container pt-5">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-5 backdrop ">
                <h1 class="text-center display-4">Registrati</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12 col-md-6">
                <form class="p-5 backdrop my-5 " method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- CROSS SITE REQUEST FORGERY = falsificazione di richiesta inviata da un sito a un altro --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Nome completo</label>
                        <input type="text" class="form-control " name="name" value="" id="title">

                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Indirizzo email</label>
                        <input type="email" class="form-control " name="email" value="" id="title">

                    </div>
                    <div class="mb-3">
                        <label for="plot" class="form-label">Password</label>
                        <input type="password" class="form-control " name="password">

                    </div>
                    <div class="mb-3">
                        <label for="plot" class="form-label">Conferma password</label>
                        <input type="password" class="form-control " name="password_confirmation">

                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom">Registrati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
