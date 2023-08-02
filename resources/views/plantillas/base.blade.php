@php

$authLinks = [
["name" => "Notas", "link" => "home"],
["name" => "Crear nota", "link" => "form-new-note"],
["name" => "Categorías", "link" => "categories"],
["name" => "Cerrar sesión", "link" => "log-out"]
];

$guestLinks = [
["name" => "Nuevo usuario", "link" => "signup-form"],
["name" => "Inicia sesión", "link" => "login-form"],
];


$currentRoute = Route::current()->getName();

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de notas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://kit.fontawesome.com/bcaf08f682.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">


    @stack("head")


</head>

<body>

    <header class="header">

        <div class="header__logo">
            YourNote
            <span class="header__dot">.</span>
        </div>

        <nav>
            <ul class="header__nav">

                @auth
                @foreach($authLinks as $link)
                <li>
                    <a href="{{ route($link['link'] ) }}" class="header__link 
                    @if($currentRoute == $link['link'])
                    header__link--active
                    @endif
                    ">
                        {{$link["name"]}}
                    </a>
                </li>
                @endforeach
                @endauth

                @guest
                @foreach($guestLinks as $link)
                <li>
                    <a href="{{ route($link['link']) }}" class="header__button">
                        {{$link["name"]}}
                    </a>
                </li>
                @endforeach
                @endguest
            </ul>
        </nav>

    </header>



    <main class="layout">
        @yield("content")
    </main>


</body>

</html>