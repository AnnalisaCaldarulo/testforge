<x-layout>
    <div class="container vh-100">
        <div class="row align-items-center">
            <h1 class="display-4 text-center">Le nostre auto</h1>
        </div>
        <div class="row h-100 align-items-center justify-content-center">
            @foreach ($cars as $car)
                <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $car['img'] }}" class="card-img-top img-height " alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car['name'] }}</h5>
                            <p class="text-muted fst-italic"> Stato: {{ $car['condition'] }} </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
