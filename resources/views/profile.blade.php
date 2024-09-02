<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/edit.css">
</head>
<body>
    <div class="container mt-5">
        <div class="profile-card">
            <!-- Tombol Kembali -->
            <button class="back-button" onclick="window.history.back();"><i class="fas fa-arrow-left"></i></button>
            
            <h2 class="mb-4"><i class="fas fa-user-circle"></i> Profile Akun</h2>
            
            <!-- Form untuk Name-->
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                <label for="name" class="form-label">Name</label>
            </div>
            
            <!-- Form untuk Username-->
            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="Your Username" required>
                <label for="username" class="form-label">Username</label>
            </div>
            
            <!-- Form untuk Email -->
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Your Email Address" required>
                <label for="email" class="form-label">Email</label>
            </div>
            
            <!-- Form untuk New Password-->
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="New Password" required>
                <label for="password" class="form-label">New Password</label>
            </div>
            
            <!-- Tombol untuk Save -->
            <button class="btn btn-primary mb-4"><i class="fas fa-save"></i> Simpan</button>

            <!-- Tombol untuk Hapus Akun -->
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i class="fas fa-trash-alt"></i> Hapus Akun</button>
        </div>
        
        <!-- Fitur Konfirmasi Hapus Akun -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Deteksi Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p>Apakah anda ingin menghapus Akun? Tindakan ini tidak dapat di ulang.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger">Ya,Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>