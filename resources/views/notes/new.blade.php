@extends("plantillas/base")

@php

$initialOptionValue = 1;

@endphp

@push('head')
<script type="module" src="{{ asset('js/pages/newNote.js')}}" defer></script>
@endpush

@section("content")
<form action="{{ route('create-note') }}" method="POST" class="form">

    <div class="form__box">
        <h1>Crear nueva nota</h1>

        @csrf <!--  Problema de seguridad-->






        <div class="form__group">
            <label class="form__label">Titulo</label>
            <input type="text" class="form__input" name="titulo" placeholder="Hacer las compras">

            @if($errors->has("titulo"))
            <span class="form__alert-danger">{{$errors->first("titulo")}}</span>
            @enderror
        </div>

        <div class="form__group">
            <label class="form__label">Descripción</label>
            <input type="text" class="form__input" name="descripcion" placeholder="Ir al super y hacer las compras">
            @if($errors->has("descripcion"))
            <span class="form__alert-danger">{{$errors->first("descripcion")}}</span>
            @endif
        </div>

        <div class="form__group">
            <label class="form__label">Categoría</label>
            <div class="form__input form__input--select">
                <span class="form__select-text">Sin categoría</span>
                <div class="form__select-arrow"><i class="fa-solid fa-angle-up"></i></div>

                <div class="form__select-box-shown">
                    <div class="form__select-box">
                        <span data-value="1" class="form__option form__option--active">Sin categoría</span>

                        @foreach($categories as $category)
                        <span data-value="{{$category->id}}" class="form__option">{{$category->nombre}}</span>
                        @endforeach
                    </div>

                </div>
            </div>


            <select name="id_category" class="form__input" id="form__select" hidden>
                <option value="{{$initialOptionValue}}" hidden selected></option>

                @foreach($categories as $category)
                <option value="{{$category->id}}"></option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="form__submit">Crear nota</button>
    </div>
</form>


@endsection