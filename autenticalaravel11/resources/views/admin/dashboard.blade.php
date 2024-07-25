<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/css/login.css'])
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Admin dashboard</span></div>
            <form action="">
                <div class="row">
                    <p><b>Name - </b> {{ $getRecord->name }} </p>
                    <p><b>Email - </b> {{ $getRecord->email }} </p>
                </div>
                <div class="signup-link">Logout? <a href="{{ url('logout') }}">Logout</a> </div>
                <div class="signup-link">Home Page? <a href="{{ url('/') }}">Welcome PAge(Home)</a> </div>
            </form>

             
        </div> 

    </div>
</body>
</html>   