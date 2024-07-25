<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Pasword macu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/css/login.css'])
 


</head>
<body>
    <div class="container">
        <span style="color:red"> {{$errors->first('password')}} <br> </span>
        <span style="color:red"> {{$errors->first('confirm_password')}} <br> </span>
        @include('_message')

        <div class="wrapper">
            <div class="title"><span>Reset Password Macu</span></div>
            <form action="{{ url('reset/'.$token) }}"   method="POST">
                 @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="password" value="{{old('password')}}" placeholder="Password" required name="password">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value="" placeholder="Confima Password" required name="confirm_password">
                </div>
                
                 <div class="row button">
                    <input type="submit" value="Login">
                </div>
              
            </form>
        </div> 

    </div>
</body>
</html>   