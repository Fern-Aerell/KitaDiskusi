@extends('layouts.app')

@section('title', 'Sign Up')

@section('css')
    <link rel="stylesheet" href="css/style.css">
@endsection

@section('content')
    <div class="halaman-login">
        <form action="{{ route('signup.store') }}" method="post">
            @csrf
            <img src="kitadiskusi_logo.png" alt="" style="background-color: black">
            <br />
            <div class="name">
                <input type="text" name="name" id="name" placeholder="Name">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br />
            <div class="username">
                <input type="text" name="username" id="username" placeholder="Username">
                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br />
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
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm Password">
                @error('password_confirmation')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="regis">
                <p>sudah punya akun? </p>
                <a href="{{ route('login') }}">
                    <p>Sign In</p>
                </a>
            </div>
            <div class="button">
                <button type="submit">Daftar</button>
            </div>
        </form>
    </div>
@endsection
