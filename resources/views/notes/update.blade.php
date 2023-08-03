@extends("plantillas/base")


@php

$initialOptionValue = 1;

@endphp

@push('head')
<script type="module" src="{{ asset('js/pages/newNote.js')}}" defer></script>
@endpush

@section("content")
<form action="{{ route('update-note', ['id' => $note->id]) }}" method="POST" class="form">

    <div class="form__box">
        <h1>Editar nota</h1>

        @csrf <!--  Problema de seguridad-->

        <div class="form__group">
            <label class="form__label">Titulo</label>
            <input type="text" class="form__input" name="titulo" placeholder="Hacer las compras" value="{{$note->titulo}}">

            @if($errors->has("titulo"))
            <span class="form__alert-danger">{{ $errors->first("titulo") }}</span>
            @enderror
        </div>

        <div class="form__group">
            <label class="form__label">Descripción</label>
            <input type="text" class="form__input" name="descripcion" placeholder="Ir al super y hacer las compras" value="{{$note->descripcion}}">
            @if($errors->has("descripcion"))
            <span class="form__alert-danger">{{$errors->first("descripcion")}}</span>
            @enderror
        </div>


        <div class="form__group">
            <label class="form__label">Categoría</label>
            <div class="form__input form__input--select">
                <span class="form__select-text"></span>
                <div class="form__select-arrow"><i class="fa-solid fa-angle-up"></i></div>

                <div class="form__select-box-shown">
                    <div class="form__select-box">
                        @foreach($categories as $category)
                        <span data-value="{{$category['id']}}" class="form__option @if($note->id_category == $category['id']) form__option--active @endif">{{$category["nombre"]}}</span>
                        @endforeach
                    </div>

                </div>
            </div>


            <select name="id_category" class="form__input" id="form__select" hidden>
                <option value="{{$initialOptionValue}}" hidden selected></option>

                @foreach($categories as $category)
                <option value="{{$category['id']}}"></option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="form__submit">Actualizar nota</button>
    </div>
</form>


@endsection