<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <h1>Kamu sudah login</h1>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>