<div class="card card-custom mb-5">
    <div class="card-img-gradient d-flex justify-content-center  " >
        @if (!$book->cover)
            <img src="https://picsum.photos/200/300" class="card-img-top w-100 card-img" alt="...">
        @else
            <img src="{{Storage::url($book->cover)}}" class="card-img-top w-100 card-img" alt="...">
        @endif
    </div>
    <div class="card-body card-body-custom m-0 p-0 text-center">
        <h5 class="card-title p-1"> {{ $book->title }} </h5>
        <p class="card-text text-truncate"> {{ $book->plot }} </p>
        <p class="text-muted">{{ $book->price }} $</p>
    </div>
    <div class="d-flex justify-content-center my-1">
        <a href="{{route('book.show', compact('book'))}}" class="btn btn-custom ">Dettaglio</a>
    </div>
</div>
