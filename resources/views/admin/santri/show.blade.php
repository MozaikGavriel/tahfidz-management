@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Detail Data Santri</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('santri.index') }}" class="btn btn-secondary" style="position: relative; overflow: hidden;">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header" style="background: linear-gradient(45deg, #1a535c, #0d2e33);">
                                        <h5 class="mb-0 text-white">Data Santri</h5>
                                    </div>
                                    <div class="card-body" style="background: #f8f9fa;">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>NIS:</strong></p>
                                                <p class="text-muted">{{ $santri->nis }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>Nama Lengkap:</strong></p>
                                                <p class="text-muted">{{ $santri->nama }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>Tempat Lahir:</strong></p>
                                                <p class="text-muted">{{ $santri->tempat_lahir }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>Tanggal Lahir:</strong></p>
                                                <p class="text-muted">{{ $santri->tanggal_lahir }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>Daerah Asal:</strong></p>
                                                <p class="text-muted">{{ $santri->asal }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>Kategori:</strong></p>
                                                <p class="text-muted">{{ $santri->kategori }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>Sekolah:</strong></p>
                                                <p class="text-muted">{{ $santri->sekolah }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>Kelas:</strong></p>
                                                <p class="text-muted">{{ $santri->kelas }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p class="mb-1"><strong>No. HP:</strong></p>
                                                <p class="text-muted">{{ $santri->no_hp ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <p class="mb-1"><strong>Email:</strong></p>
                                                <p class="text-muted">{{ $santri->email ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="mb-1"><strong>Alamat:</strong></p>
                                                <p class="text-muted">{{ $santri->alamat }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header" style="background: linear-gradient(45deg, #1a535c, #0d2e33);">
                                        <h5 class="mb-0 text-white">Foto Santri</h5>
                                    </div>
                                    <div class="card-body text-center" style="background: #f8f9fa;">
                                        @if ($santri->foto)
                                            <img src="{{ asset('storage/' . $santri->foto) }}" alt="Foto Santri" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                                        @else
                                            <div class="p-4 bg-light rounded">
                                                <i class="fas fa-user-circle fa-5x text-secondary"></i>
                                                <p class="mt-3 text-muted">Foto tidak tersedia</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" style="background: linear-gradient(45deg, #1a535c, #0d2e33);">
                                <h5 class="mb-0 text-white">Data Wali Santri</h5>
                            </div>
                            <div class="card-body" style="background: #f8f9fa;">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <p class="mb-1"><strong>Nama Wali:</strong></p>
                                        <p class="text-muted">{{ $santri->wali_nama }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p class="mb-1"><strong>No. HP Wali:</strong></p>
                                        <p class="text-muted">{{ $santri->wali_no_hp ?? '-' }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mb-1"><strong>Alamat Wali:</strong></p>
                                        <p class="text-muted">{{ $santri->wali_alamat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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
        const backBtn = document.querySelector('.btn-secondary');

        // Animasi tombol Kembali
        backBtn.addEventListener('mouseenter', () => {
            backBtn.classList.add('animate__animated', 'animate__pulse');
        });

        backBtn.addEventListener('mouseleave', () => {
            backBtn.classList.remove('animate__animated', 'animate__pulse');
        });

        backBtn.addEventListener('click', () => {
            backBtn.classList.add('animate__animated', 'animate__rubberBand');
            setTimeout(() => {
                backBtn.classList.remove('animate__animated', 'animate__rubberBand');
            }, 1000);
        });
    });
</script>
@endsection
