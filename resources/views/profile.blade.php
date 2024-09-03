@extends('layouts.app')

@section('title', 'Profile')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/edit.css">
@endsection

@section('js')
@endsection

@section('content')
    <div class="container mt-5">
        <div class="profile-card">
            <!-- Tombol Kembali -->
            <a class="back-button" href="{{ route('index') }}" style="text-decoration: none;"><i class="fas fa-arrow-left"></i></a>
            
            <h2 class="mb-4"><i class="fas fa-user-circle"></i> Profile Akun</h2>
            
            <p>{{ session('success') }}</p>

            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                <!-- Form untuk Name-->
                <div class="form-group">
                    <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="name" placeholder="Your Name" required>
                    <label for="name" class="form-label">Name</label>
                </div>
                
                <!-- Form untuk Username-->
                <div class="form-group">
                    <input name="username" value="{{ $user->username }}" type="text" class="form-control" id="username" placeholder="Your Username" required>
                    <label for="username" class="form-label">Username</label>
                </div>
                
                <!-- Form untuk Email -->
                <div class="form-group">
                    <input name="email" value="{{ $user->email }}" type="email" class="form-control" id="email" placeholder="Your Email Address" required>
                    <label for="email" class="form-label">Email</label>
                </div>
                
                <!-- Form untuk New Password-->
                <div class="form-group">
                    <input name="password" type="password" class="form-control" id="password" placeholder="New Password">
                    <label for="password" class="form-label">New Password</label>
                </div>
                
                <!-- Tombol untuk Save -->
                <button type="submit" class="btn btn-primary mb-4"><i class="fas fa-save"></i> Simpan</button>
            </form>

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
                        <form action="{{ route('profile.delete') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Ya,Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection