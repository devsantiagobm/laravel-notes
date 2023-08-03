@extends("plantillas/base")


@section("content")
<form action="{{ route('update-category', ['id' => $category->id] ) }}" method="POST" class="form">

    <div class="form__box">
        <h1>Editar categoría</h1>

        @csrf <!--  Problema de seguridad-->

        <div class="form__group">
            <label class="form__label">Nombre</label>
            <input type="text" class="form__input" name="nombre" placeholder="Hogar" value="{{ $category->nombre }}">

            @if($errors->has("nombre"))
            <span class="form__alert-danger">{{$errors->first("nombre")}}</span>
            @endif
        </div>

        <div class="form__group">
            <label class="form__label">Color</label>
            <input type="color" value="{{$category->color}}" class="form__input form__color-input" name="color"/>

            @if($errors->has("descripcion"))
            <span class="form__alert-danger">{{$errors->first("descripcion")}}</span>
            @endif
        </div>

        <button type="submit" class="form__submit">Actualizar categoría</button>
    </div>
</form>
@endsection