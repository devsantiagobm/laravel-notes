@extends("plantillas/base")


@section("content")

<div class="home">



    
    <h1 class="home__title">
        Lista de categorías
        <span class="home__count">
            {{count($categories)}}
        </span>
    </h1>

    <a href="{{ route('form-new-category') }}" class="home__new">
        <i class="fa-solid fa-plus"></i>
        Agregar categoría
    </a>

    <!-- @if(session("success")) -->
    <div class="home__success">{{session("success")}} </div>
    <!-- @endif -->

    <div class="home__notes">
        @if(count($categories) == 0)

        <div class="home__message">
            <i class="fa-regular fa-face-frown home__sad-icon"></i>
            <span>Ups! parece que no tienes categorías</span>
            <a href="{{route('form-new-category')}}" class="home__new-note-link">Crear mi primer categoría</a>
        </div>
        @endif

        @foreach($categories as $category)
        <div class="home__note note note--category">
            <div class="note__column">
                <span class="note__title" style="--color: {{$category->color}}">{{$category->nombre }}</span>
            </div>

            <div class="note__column">
                <a class="note__button" href="{{ route('form-update-category', ['id' => $category->id]) }}">
                    <i class="fa-solid fa-pen"></i>
                </a>

                <a class="note__button" href="{{ route('delete-category', ['id' => $category->id]) }}">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>
        </div>
        @endforeach

    </div>


</div>

@endsection