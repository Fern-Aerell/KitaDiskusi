<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="halaman-login">
        <div class="container">
            <form action="{{ route('signup.store') }}" method="post">
                @csrf
                <h1>Sign Up</h1>
                <br/>
                <div class="name">
                    <input type="text" name="name" id="name" placeholder="Name">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <br/>
                <div class="username">
                    <input type="text" name="username" id="username" placeholder="Username">
                    @error('username')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <br/>
                <div class="email">
                    <input type="text" name="email" id="email" placeholder="Email">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="password">
                    <br>
                    <input type="password" name="password" id="password" placeholder="Password">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="password_confirmation">
                    <br>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="button">
                    <button type="submit">Daftar</button>
                </div>
            </form>
        </div>
        <div class="regis">
            <p>sudah punya akun? </p>
            <a href="{{ route('login') }}"><p>Sign In</p></a>
        </div>
    </div>
</body>

</html>
