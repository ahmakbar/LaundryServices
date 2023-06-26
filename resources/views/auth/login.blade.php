@extends('layouts.layoutMasterCustomer')

@section('title', 'Sign In')

@section('content')
    <section class="sect1-login flex justify-center align-center justify-around" id="head">
        <div class="form-login flex column" style="">
            <p style="font-size: 40px; text-align: center; font-weight: bold;">Login</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <p class="signup-link">Don't have an account?
                <a href="{{ route('register') }}">Sign up</a>
            </p>
        </div>
        <div class="img-head-login flex justify-center column" style="">
            <img style="object-fit: contain;" src="{{ asset('assets/images/laundryhead.png') }}" alt="">
        </div>

    </section>
@endsection
