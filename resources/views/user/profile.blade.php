@extends('user.home')

@section('title', 'User Profile')

@section('profile')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>User Profile</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        {{-- <div class="col-md-4 text-center">
                            <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" class="img-fluid rounded-circle" alt="Profile Picture" style="width: 150px;">
                        </div> --}}
                        <div class="col-md-8">
                            <h4>{{ $user->username }}</h4>
                            <p><i class="fas fa-envelope"></i> {{ $user->email }}</p>
                            {{-- <p><i class="fas fa-phone"></i> {{ $user->phone }}</p> --}}
                        </div>
                    </div>
                    {{-- <div class="row mt-4">
                        <div class="col-md-12">
                            <h5>About Me:</h5>
                            <p>{{ $user->bio }}</p>
                        </div>
                    </div> --}}
                    {{-- <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
