<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Tanya Jawab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">
    <style>
       
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light head-home">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Forum Diskusi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Nav-1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav-2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav-3</a>
                    </li> -->
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-icon">
                                <span>N</span> 
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header head-home">
                        Ajukan Pertanyaan
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="questionTitle" class="form-label">Judul Pertanyaan</label>
                                <input type="text" class="form-control" id="questionTitle"
                                    placeholder="Masukkan judul pertanyaan">
                            </div>
                            <div class="mb-3">
                                <label for="questionDetails" class="form-label">Detail Pertanyaan</label>
                                <textarea class="form-control" id="questionDetails" rows="4"
                                    placeholder="Jelaskan pertanyaan Anda"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Kirim Pertanyaan</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header head-home">
                        Daftar Pertanyaan
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="card-title">Judul Pertanyaan 1</h5>
                            <p class="card-text">Deskripsi pertanyaan</p>
                            <a href="{{ route('quest.detail') }}" class="detail-btn">Lihat Detail</a>
                        </div>
                        <div class="mb-4">
                            <h5 class="card-title">Judul Pertanyaan 2</h5>
                            <p class="card-text">Deskripsi pertanyaan</p>
                            <a href="{{ route('quest.detail') }}" class="detail-btn">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header head-home">
                        Pencarian
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="search" class="form-label">Cari Pertanyaan</label>
                                <input type="text" class="form-control" id="search" placeholder="Cari di forum">
                            </div>
                            <button type="submit" class="btn btn-success">Cari</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header head-home">
                        Kategori
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">Kategori 1</a>
                        <a href="#" class="list-group-item list-group-item-action">Kategori 2</a>
                        <a href="#" class="list-group-item list-group-item-action">Kategori 3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="head-home text-center text-lg-start mt-5">
        <div class="text-center p-3">
            © 2024 Forum Diskusi
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
