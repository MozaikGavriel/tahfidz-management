@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0" style="background: rgba(26, 83, 92, 0.95); backdrop-filter: blur(10px);">
                <div class="card-header bg-dark-green text-white text-center py-4">
                    <h3 class="mb-0 fw-bold">
                        <i class="fas fa-key me-2"></i>Reset Password
                    </h3>
                    <p class="mb-0 mt-2 small">Atur ulang password Anda</p>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-4">
                            <label for="email" class="form-label text-white">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark-green text-white">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input id="email" type="email" 
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                    name="email" value="{{ $email ?? old('email') }}" 
                                    required autocomplete="email" autofocus
                                    placeholder="Masukkan email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-white">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark-green text-white">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input id="password" type="password" 
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                    name="password" required autocomplete="new-password"
                                    placeholder="Masukkan password baru">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label text-white">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark-green text-white">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input id="password-confirm" type="password" 
                                    class="form-control form-control-lg" 
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Konfirmasi password baru">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg fw-bold">
                                <i class="fas fa-sync-alt me-2"></i>Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-dark-green {
        background-color: #1a535c;
    }
    .card {
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid rgba(255,255,255,0.2);
        background-color: rgba(255,255,255,0.1);
        color: #ffffff;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        background-color: rgba(255,255,255,0.2);
        border-color: #4ecdc4;
        box-shadow: 0 0 0 0.25rem rgba(78, 205, 196, 0.25);
        color: #ffffff;
    }
    .form-control::placeholder {
        color: rgba(255,255,255,0.5);
    }
    .btn-success {
        background-color: #4ecdc4;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-success:hover {
        background-color: #3da89f;
        transform: translateY(-2px);
    }
    .min-vh-100 {
        min-height: 100vh;
    }
    .input-group-text {
        border-radius: 8px 0 0 8px;
        border: 1px solid rgba(255,255,255,0.2);
    }
</style>
@endsection
