@extends("plantillas/base")


@section("content")
<form action="{{ route('create-category') }}" method="POST" class="form layout">

    <div class="form__box">
        <h1>Crear nueva categoría</h1>

        @csrf <!--  Problema de seguridad-->

        <div class="form__group">
            <label class="form__label">Nombre</label>
            <input type="text" class="form__input" name="nombre" placeholder="Hogar">

            @if($errors->has("nombre"))
            <span class="form__alert-danger">{{$errors->first("nombre")}}</span>
            @endif
        </div>

        <div class="form__group">
            <label class="form__label">Color</label>
            <input type="color" value="#fca311" class="form__input form__color-input" name="color"/>

            @if($errors->has("descripcion"))
            <span class="form__alert-danger">{{$errors->first("descripcion")}}</span>
            @endif
        </div>

        <button type="submit" class="form__submit">Crear categoría</button>
    </div>
</form>


@endsection