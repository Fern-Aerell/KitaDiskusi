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
            <form action="/login" method="post">
                <h1>Sign In</h1>
                <div class="email">
                    @csrf
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
                <div class="button">
                    <button type="submit">Masuk</button>
                </div>
            </form>
        </div>
        <div class="regis">
            <p>belum punya akun? </p>
            <a href="/regis"><p>Sign Up</p></a>
        </div>
    </div>
</body>

</html>
