@extends('layouts.app')

@section('title', 'Sign in')

@section('css')
    <link rel="stylesheet" href="css/style.css">
@endsection

@section('content')
    <div class="halaman-login">
        <form action="{{ route('login.auth') }}" method="post">
            <img src="kitadiskusi_logo.png" alt="" style="background-color: black">
            <p>{{ session('success') }}</p>
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
            <div class="regis">
                <p>belum punya akun? </p>
                <a href="{{ route('signup') }}">
                    <p>Sign Up</p>
                </a>
            </div>
            <div class="button">
                <button type="submit">Masuk</button>
            </div>
        </form>
    </div>
@endsection
