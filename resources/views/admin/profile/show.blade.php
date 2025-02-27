@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Profil Saya</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row animate__animated animate__fadeInUp">
            <div class="col-12">
                <div class="card shadow-lg animate__animated animate__zoomIn">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="card mb-4">
                                    <div class="card-header" style="background: linear-gradient(45deg, #1a535c, #0d2e33);">
                                        <h5 class="mb-0 text-white">Foto Profil</h5>
                                    </div>
                                    <div class="card-body" style="background: #f8f9fa;">
                                        @if ($profile && $profile->avatar)
                                            <img src="{{ asset('storage/' . $profile->avatar) }}" 
                                                 alt="Foto Profil" 
                                                 class="img-fluid rounded-circle" 
                                                 style="width: 200px; height: 200px; object-fit: cover;">
                                        @else
                                            <div class="p-4 bg-light rounded">
                                                <i class="fas fa-user-circle fa-5x text-secondary"></i>
                                                <p class="mt-3 text-muted">Foto tidak tersedia</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card mb-4">
                                    <div class="card-header" style="background: linear-gradient(45deg, #1a535c, #0d2e33);">
                                        <h5 class="mb-0 text-white">Informasi Profil</h5>
                                    </div>
                                    <div class="card-body" style="background: #f8f9fa;">
                                        <div class="row">
                                            <div class="col-md-6 animate__animated animate__fadeInLeft">
                                                <p class="mb-1"><strong>Nama Lengkap:</strong></p>
                                                <p class="text-muted">{{ $profile->full_name ?? Auth::user()->name }}</p>
                                            </div>
                                            <div class="col-md-6 animate__animated animate__fadeInRight">
                                                <p class="mb-1"><strong>Nomor HP:</strong></p>
                                                <p class="text-muted">{{ $profile->phone ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-12 animate__animated animate__fadeInLeft">
                                                <p class="mb-1"><strong>Alamat:</strong></p>
                                                <p class="text-muted">{{ $profile->address ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-12 animate__animated animate__fadeInLeft">
                                                <p class="mb-1"><strong>Bio:</strong></p>
                                                <p class="text-muted">{{ $profile->bio ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('profile.edit') }}" class="btn" style="background: linear-gradient(45deg, #1a535c, #0d2e33); color: white; border: none; position: relative; overflow: hidden; transition: all 0.3s ease;">
                                <i class="fas fa-edit me-1"></i>Edit Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Warna gradasi dark green untuk tombol Edit Profil */
    .btn {
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background: linear-gradient(45deg, #0d2e33, #1a535c);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .btn:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .btn::after {
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

    .btn:hover::after {
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animasi tombol Edit Profil
        const editBtn = document.querySelector('.btn');
        editBtn.addEventListener('mouseenter', () => {
            editBtn.classList.add('animate__animated', 'animate__rubberBand');
        });
        editBtn.addEventListener('mouseleave', () => {
            editBtn.classList.remove('animate__animated', 'animate__rubberBand');
        });
    });
</script>
@endsection