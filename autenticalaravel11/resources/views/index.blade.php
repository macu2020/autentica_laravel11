<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido macu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/css/login.css'])
 


</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span> Autenticación Middleware</span></div>
            <form action="">
                @if (Auth::check())
                    @if (Auth::user()->is_role == 2)
                        <div class="signup-link">Superadministrador ya ha iniciado sesión <a href="{{url('superadmin/dashboard')}}">Dashboard</a> </div>
                    @elseif (Auth::user()->is_role == 1)
                        <div class="signup-link">Administrador ya ha iniciado sesión <a href="{{url('admin/dashboard')}}">Dashboard</a> </div>
                    @elseif (Auth::user()->is_role == 0)
                    <div class="signup-link">Usuario ya inició sesión <a href="{{url('user/dashboard')}}">Dashboard</a> </div>
                    @endif
                @else

                <div class="signup-link">¿Iniciar sesión? <a href="{{ url('login') }}">Acceso</a></div>
                <div class="signup-link">¿Registrarte ahora? <a href="{{ url('registra') }}">Registrar</a></div>
                @endif

            </form>
        </div> 

    </div>
</body>
</html>   