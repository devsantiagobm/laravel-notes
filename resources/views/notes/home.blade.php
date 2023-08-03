@extends("plantillas/base")


@php

$currentRoute = Route::current()->getName();
$currentId = request()->route('id');

@endphp

@section("content")

<div class="home">

    <h1 class="home__title">
        Lista de tareas
        <span class="home__count">
            {{count($notes)}}
        </span>
    </h1>


    <div class="home__categories">
        @if($currentRoute != "home")
        <a class="home__category" href="{{ route('home' )}}" style="--color: #121212">Eliminar filtro</a>
        @endif

        <a class="home__category" href="{{ route('home-category', ['id' => 1] )}}" style="--color: #121212">Sin categoría</a>

        @foreach($categories as $category)
        <a class="home__category
        @if($currentId == $category['id']) home__category--active @endif
        " href="{{ route('home-category', [$category->id])}}" style="--color: {{$category['color']}}">{{$category["nombre"]}}</a>
        @endforeach
    </div>


    <!-- @if(session("success")) -->
    <div class="home__success">{{session("success")}} </div>
    <!-- @endif -->

    <div class="home__notes">
        @if(count($notes) == 0)

        <div class="home__message">
            <i class="fa-regular fa-face-frown home__sad-icon"></i>
            <span>Ups! parece que no tienes tareas</span>
            <a href="notes/new" class="home__new-note-link">Crear mi primer tarea</a>
        </div>
        @endif

        @foreach($notes as $note)
        <div class="home__note note">
            <div class="note__column">
                <span class="note__title" style="--color: {{$note->color}}">{{$note->titulo }}</span>
                <p class="note__description">{{$note->descripcion }}</p>
            </div>



            <div class="note__column">
                <a class="note__button" href="{{ route('form-edit-note', [$note->id]) }}">
                    <i class="fa-solid fa-pen"></i>
                </a>

                <a class="note__button" href="{{ route('delete-note', [$note->id]) }}">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>

            <a href="{{ route('notes-details', [$note->id]) }}" class="note__link"></a>
        </div>
        @endforeach

    </div>


</div>

@endsection