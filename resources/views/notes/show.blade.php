@extends("plantillas/base")


@section("content")

<div class="note-detail home">
    <h1 class="note-details__title">{{$note->titulo}}</h1>
    <p class="note-details__description">{{$note->descripcion}}</p>
    <a class="note-details__category" style="--color: {{$note->color}}" href="{{ route('home-category', [$note->id])}}">{{$note->nombre}}</a>
</div>


<a href="{{ route('home') }}" class="back-button">
    <i class="fa-solid fa-arrow-left"></i>
</a>
@endsection