<x-layout>
    <div class="container">
        <div class="row height-title align-items-center justify-content-center ">
            <div class="col-12 col-md-7">
                <h1 class="display-4 text-center backdrop p-5">Tutte le categorie della piattaforma</h1>
            </div>
        </div>
        <div class="row justify-content-center py-5">
            @foreach ($categories as $category)
                <div class="col-12 col-md-4">
                    <div class="card mb-5">
                        <div class="card-body m-0 p-0 text-center">
                            <h5 class="card-title p-1"> {{ $category->name }} </h5>
                        </div>

                        <div class="d-flex justify-content-center my-1">
                            <a href="{{ route('category.show', compact('category')) }}" class="btn btn-custom ">Leggi di
                                più</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</x-layout>
