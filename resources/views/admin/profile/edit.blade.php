@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Edit Profil</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary" style="position: relative; overflow: hidden;">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row animate__animated animate__fadeInUp">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="full_name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $profile->full_name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Nomor HP</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="address" name="address" rows="3">{{ $profile->address }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Bio</label>
                                        <textarea class="form-control" id="bio" name="bio" rows="3">{{ $profile->bio }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="avatar" class="form-label">Foto Profil</label>
                                        <input type="file" class="form-control" id="avatar" name="avatar">
                                        @if ($profile->avatar)
                                            <small class="text-muted">Foto saat ini:</small>
                                            <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Foto Profil" class="img-thumbnail mt-2" style="width: 100px; height: 100px; object-fit: cover;">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn simpan-perubahan-btn" style="position: relative; overflow: hidden;">
                                    <i class="fas fa-save me-1"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Warna gradasi dark green untuk tombol Simpan Perubahan */
    .simpan-perubahan-btn {
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .simpan-perubahan-btn:hover {
        background: linear-gradient(45deg, #0d2e33, #1a535c);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .simpan-perubahan-btn:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .simpan-perubahan-btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300%;
        height: 300%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%) rotate(45deg);
        transition: all 0.5s ease;
        opacity: 0;
    }

    .simpan-perubahan-btn:hover::after {
        opacity: 1;
        transform: translate(-50%, -50%) rotate(45deg) scale(0);
    }

    .page-wrapper {
        margin-top: -70px;
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        min-height: 100vh;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }
    .page-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: inherit;
        filter: blur(10px);
        z-index: -1;
    }

    /* Animasi tombol Kembali */
    .btn-secondary {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .btn-secondary:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300%;
        height: 300%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%) rotate(45deg);
        transition: all 0.5s ease;
        opacity: 0;
    }

    .btn-secondary:hover::after {
        opacity: 1;
        transform: translate(-50%, -50%) rotate(45deg) scale(0);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animasi tombol Simpan Perubahan
        const submitButton = document.querySelector('button[type="submit"]');
        submitButton.addEventListener('mouseenter', () => {
            submitButton.classList.add('animate__animated', 'animate__rubberBand');
        });
        submitButton.addEventListener('mouseleave', () => {
            submitButton.classList.remove('animate__animated', 'animate__rubberBand');
        });

        // Animasi tombol Kembali
        const backButton = document.querySelector('.btn-secondary');
        backButton.addEventListener('mouseenter', () => {
            backButton.classList.add('animate__animated', 'animate__rubberBand');
        });
        backButton.addEventListener('mouseleave', () => {
            backButton.classList.remove('animate__animated', 'animate__rubberBand');
        });
    });
</script>
@endsection