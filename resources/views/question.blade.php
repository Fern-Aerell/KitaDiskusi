<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi --Detail Pertanyaan--</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/detail.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light head-detail">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Forum Diskusi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-icon">
                                <span>N</span> 
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <?php if($isLogin) { ?>
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <?php } ?>
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
                    <div class="card-header head-detail d-flex justify-content-between align-items-center ">
                        <span>Pertanyaan @User</span>
                        <span class="text-muted">29 Agustus 2024</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Judul Pertanyaan</h5>
                        <p class="card-text">Deskripsi detail pertanyaan</p>
                        <hr>
                        <h6>Jawaban</h6>
                        <div class="answers-container">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="vote-buttons" id="vote1">
                                        <button class="upvote"><i class="fa-solid fa-arrow-up"></i></button>
                                        <span class="vote-count">0</span>
                                        <button class="downvote"><i class="fa-solid fa-arrow-down"></i></button>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-1"><strong>@User 1:</strong></p>
                                        <p class="text-muted">30 Agustus 2024</p>
                                        <p class="card-text">Jawaban dari @User 1 ada disini</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="vote-buttons" id="vote2">
                                        <button class="upvote"><i class="fa-solid fa-arrow-up"></i></button>
                                        <span class="vote-count">0</span>
                                        <button class="downvote"><i class="fa-solid fa-arrow-down"></i></button>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-1"><strong>@User 2:</strong></p>
                                        <p class="text-muted">31 Agustus 2024</p>
                                        <p class="card-text">Jawaban dari @User 2 ada disini</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="vote-buttons" id="vote3">
                                        <button class="upvote"><i class="fa-solid fa-arrow-up"></i></button>
                                        <span class="vote-count">0</span>
                                        <button class="downvote"><i class="fa-solid fa-arrow-down"></i></button>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-1"><strong>@User 3:</strong></p>
                                        <p class="text-muted">31 Agustus 2024</p>
                                        <p class="card-text">Jawaban dari @User 3 ada disini</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="vote-buttons" id="vote3">
                                        <button class="upvote"><i class="fa-solid fa-arrow-up"></i></button>
                                        <span class="vote-count">0</span>
                                        <button class="downvote"><i class="fa-solid fa-arrow-down"></i></button>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-1"><strong>@User 4:</strong></p>
                                        <p class="text-muted">31 Agustus 2024</p>
                                        <p class="card-text">Jawaban dari @User 4 ada disini</p>
                                    </div>
                                </div>
                            </div>
          
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header head-detail">
                        Tambah Jawaban
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="answerDetails" class="form-label">Jawaban Anda</label>
                                <textarea class="form-control" id="answerDetails" rows="4" placeholder="Tulis jawaban Anda"></textarea>
                            </div>
                            <a href="{{ route('question') }}" class="btn btn-success">Kirim Jawaban</a>
                        </form>
                    </div>
                </div>
                
                <a href="{{ route('index') }}" class="btn btn-success mt-3">Kembali ke Halaman Utama</a>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header head-detail">
                        Pertanyaan Terkait
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('index') }}" class="list-group-item list-group-item-action">Pertanyaan Lainnya</a>
                        <a href="{{ route('index') }}" class="list-group-item list-group-item-action">Pertanyaan Lainnya</a>
                        <a href="{{ route('index') }}" class="list-group-item list-group-item-action">Pertanyaan Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="head-detail text-center text-lg-start mt-5">
        <div class="text-center p-3">
            © 2024 Forum Diskusi
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="/js/detail.js"></script>
</body>
</html>