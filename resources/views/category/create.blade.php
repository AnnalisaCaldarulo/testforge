<x-layout>
    <div class="container pt-5">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-5 backdrop ">
                <h1 class="text-center display-4">CREA LA CATEGORIA</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="p-5 backdrop my-5" method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name"
                            value="{{ old('name') }}" id="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione:</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control  @error('description') is-invalid  @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom">Crea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
