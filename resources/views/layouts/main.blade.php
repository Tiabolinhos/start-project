<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <header>
        <div class="Logo">Ray&Isa</div>
  

        <nav class="navbar">

            <ul>
                @guest
                <li>
                    <a href="/register" class="nav-link">Cadastro</a>
                </li>
                <li>
                    <a href="/login" class="nav-link">Entrar</a>
                </li>
                @endguest

                @auth
                <li>
                    <a href="/view" class="nav-link">Tarefas</a>

                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link" onclick="event.preventDefault();
                        this.closest('form').submit();">Sair</a>

                    </form>

                </li>
                @endauth
                <li>
                    <a href="/events/create" class="nav-link">Criar Tarefa</a>
                </li>
                <li>
                    <a href="/sumario/QuemSomos" class="nav-link">Sobre</a>
                </li>

            </ul>


        </nav>

        <label for="nav_check" class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </label>

    </header>
    <main>
        <div class="container-fluid">
            @if(session('msg'))
            <p class="msg">{{ session('msg')}}</p>
            @endif
            @yield('content')
        </div>
    </main>

    <footer>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      ©2023 Ray&Isa
      
    </div>
    </footer>
<script>
    hamburger=document.querySelector(".hamburger");
    hamburger.onclick=function () {
        navbar =document.querySelector(".navbar");
        navbar.classList.toggle("nav-link")

        
    }
</script>
</body>

</html>