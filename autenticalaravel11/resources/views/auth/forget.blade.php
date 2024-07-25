<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget macu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/css/login.css'])
 


</head>
<body>
    <div class="container">
        @include('_message')

        <div class="wrapper">
            <div class="title"><span>Forget Password Macu</span></div>
            <form action="{{ url('forget' ) }}" method="POST">
                 @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="email" value="{{old('email')}}" placeholder="email" required name="email">
                </div>
                 
                
                <div class="pass"><a href="{{ url('login') }}">Login</a></div>
                <div class="row button">
                    <input type="submit" value="Forget Password">
                </div>
                <div class="signup-link">Sign In? <a href="{{ url('registra') }}">Regsitarte</a></div>
                <div class="signup-link">Bienmvendi<a href="{{ url('/') }}">Biencendi</a></div>
            </form>
        </div> 

    </div>
</body>
</html>   