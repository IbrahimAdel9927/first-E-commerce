@extends('auth.layout.auth')

@section('title', 'login')

@section('login')
    <form method="POST" action="{{ route('login.authenticate') }}">
        @csrf
        <div class="form-input">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-input">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
        </div>
        <button type="submit">Login</button>
        <div>
            <a class="link" href="{{ route('register.index') }}">Register</a>
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

<!-- @yield('login') -->