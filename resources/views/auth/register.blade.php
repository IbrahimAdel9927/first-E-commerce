@extends('auth.layout.auth')

@section('title', 'register')

@section('login')
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="form-input">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-input">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="email">
        </div>
        <div class="form-input">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
        </div>
        <button type="submit">Register</button>
        <div>
            <a class="link" href="{{ route('login.index') }}">Login</a>
        </div>
        <p class="error">
            @if ($errors->any())
                <ul class="ul-error">
                    @foreach ($errors->all() as $error)
                        <li class="li-error">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </p>
    </form>
@endsection
