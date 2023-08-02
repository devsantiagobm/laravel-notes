@extends("plantillas/base")

@section("content")

<form action="{{ route('login') }}" method="POST" class="form" novalidate>

    <div class="form__box">
        <h1 class="form__title">Ingresar</h1>

        @csrf <!--  Problema de seguridad-->

        <div class="form__group">
            <label class="form__label">Correo electrónico</label>
            <input type="email" class="form__input" name="email" placeholder="user@domain.com">

            @if($errors->has("email"))
            <span class="form__alert-danger">{{$errors->first("email")}}</span>
            @endif

        </div>

        <div class="form__group">
            <label class="form__label">Password</label>
            <input type="password" class="form__input" name="password" placeholder="••••••••">

            @if($errors->has("password"))
            <span class="form__alert-danger">{{$errors->first("password")}}</span>
            @endif
        </div>


        @if($errors->has("user-not-found"))
        <span class="form__alert-danger center">{{$errors->first("user-not-found")}}</span>
        @endif



        <button type="submit" class="form__submit">Iniciar sesión</button>
    </div>
</form>


@endsection