<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/kitadiskusi_logo.png" type="image/x-icon">
    <title>KitaDiskusi @if(trim($__env->yieldContent('title'))) - @yield('title') @endif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.13.2/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.13.2/dist/sweetalert2.min.css" rel="stylesheet">
    @yield('css')
</head>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
    <?php
    $successMessage = session('success');
    $failedMessage = session('failed');

    if ($successMessage != null) {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '" . $successMessage . "',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
    } else if ($failedMessage != null) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Walaweh :(',
                    text: '" . $failedMessage . "'
                });
            </script>";
    }
    ?>
    @yield('js')
</body>

</html>