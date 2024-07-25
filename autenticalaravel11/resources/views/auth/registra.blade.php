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
        <span style="color:red"> {{$errors->first('email')}} <br> </span>
        <span style="color:red"> {{$errors->first('password')}} <br> </span>
        <span style="color:red"> {{$errors->first('confi_password')}} <br> </span>
        @include('_message')
        <div class="wrapper">
            <div class="title"><span>Registra Macu</span></div>
            <form action="{{ url('registra' ) }}" method="POST">
                @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" value="{{old('name')}}"
                    placeholder="usernam" required name="name">
                </div>
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="email" value="{{old('email')}}"
                    placeholder="email" required name="email">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value=""
                    placeholder="Password" required name="password">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value=""
                    placeholder="Confirm Password" required name="confi_password">
                </div>
                <div class="row">
                    <select name="is_role" id="" required class="selectbox">
                        <option value="">Select Role</option>
                        <option {{old('is_role') == '2' ? 'selected' : ''}} value="2">Super Admin</option>
                        <option {{old('is_role') == '1' ? 'selected' : ''}} value="1"> Admin</option>
                        <option {{old('is_role') == '0' ? 'selected' : ''}} value="0"> user</option>
                    </select>
                </div>
                <div class="pass"><a href="{{ url('forget') }}">Forget Pass</a></div>
                <div class="row button">
                    <input type="submit" value="Registracion">
                </div>
                <div class="signup-link">Sign In? <a href="{{ url('login') }}">login</a></div>
                <div class="signup-link">Bienmvendi<a href="{{ url('/') }}">Biencendi</a></div>
            </form>
        </div> 

    </div>
</body>
</html>   