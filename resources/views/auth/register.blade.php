@extends('layouts.layoutMasterCustomer')

@section('title', 'Sign Up')

@section('content')
    <section class="sect1-login flex justify-center align-center justify-around" id="head">
        <div class="form-login flex justify-center column" style="">
            <p style="margin-top: 2em; font-size: 40px; text-align: center; font-weight: bold;">Signup</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" id="nomor_hp" name="nomor_hp" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="password_confirmation" required>
                </div>
                <button type="submit">Sign Up</button>
            </form>
            <p class="signup-link">Already have an account?
                <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
        <div class="img-head-login flex justify-center column" style="width: 40%; height: inherit;">
            <img style="object-fit: contain;" src="{{ asset('assets/images/laundryhead.png') }}" alt="">
        </div>
    </section>
@endsection
