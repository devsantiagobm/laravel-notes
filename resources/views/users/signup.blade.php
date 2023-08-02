@extends("plantillas/base")

@section("content")

<form action="{{ route('signup') }}" method="POST" class="form" novalidate>

    <div class="form__box">
        <h1 class="form__title">Crear nuevo usuario</h1>

        @csrf <!--  Problema de seguridad-->

        <div class="form__group">
            <label class="form__label">Correo electrónico</label>
            <input type="email" class="form__input" name="email" placeholder="user@domain.com">

            @if($errors->has("email"))
            <span class="form__alert-danger">{{$errors->first("email")}}</span>
            @enderror

        </div>

        <div class="form__group">
            <label class="form__label">Password</label>
            <input type="password" class="form__input" name="password" placeholder="••••••••">

            @if($errors->has("password"))
            <span class="form__alert-danger">{{$errors->first("password")}}</span>
            @enderror
        </div>

        <button type="submit" class="form__submit">Nuevo usuario</button>
    </div>
</form>


@endsection