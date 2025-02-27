@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Edit Data Santri</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('santri.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" value="{{ $santri->nis }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $santri->nama }}" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="{{ $santri->tempat_lahir }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $santri->tanggal_lahir }}" required>
                                </div>
                                
                                <div class="col-12">
                                    <label for="asal" class="form-label">Daerah Asal</label>
                                    <select name="asal" class="form-select" required>
                                        <option value="" disabled>-- Pilih Daerah Asal --</option>
                                        @foreach(['Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau', 'Jambi', 'Sumatera Selatan', 'Bangka Belitung', 'Bengkulu', 'Lampung', 'DKI Jakarta', 'Jawa Barat', 'Banten', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara', 'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Gorontalo', 'Sulawesi Barat', 'Maluku', 'Maluku Utara', 'Papua', 'Papua Barat'] as $provinsi)
                                            <option value="{{ $provinsi }}" {{ old('asal', $santri->asal) == $provinsi ? 'selected' : '' }}>{{ $provinsi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label">Kategori</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach(['Sekolah Menengah Pertama', 'Sekolah Menengah Kejuruan', 'Sekolah Programmer'] as $kategori)
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="kategori" id="kategori-{{ strtolower(str_replace(' ', '-', $kategori)) }}" value="{{ $kategori }}" {{ old('kategori', $santri->kategori) == $kategori ? 'checked' : '' }} required>
                                                <label for="kategori-{{ strtolower(str_replace(' ', '-', $kategori)) }}" class="form-check-label">{{ $kategori }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="sekolah" class="form-label">Sekolah</label>
                                    <select name="sekolah" class="form-select" required>
                                        <option value="" disabled>-- Pilih Sekolah --</option>
                                        <option value="SMK Telekomunikasi" {{ old('sekolah', $santri->sekolah) == 'SMK Telekomunikasi' ? 'selected' : '' }}>SMK Telekomunikasi</option>
                                        <option value="SMA DU 1" {{ old('sekolah', $santri->sekolah) == 'SMA DU 1' ? 'selected' : '' }}>SMA DU 1</option>
                                        <option value="SMA DU 2" {{ old('sekolah', $santri->sekolah) == 'SMA DU 2' ? 'selected' : '' }}>SMA DU 2</option>
                                        <option value="SMA DU 3" {{ old('sekolah', $santri->sekolah) == 'SMA DU 3' ? 'selected' : '' }}>SMA DU 3</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select name="kelas" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Kelas --</option>
                                        @foreach(['XII RPL', 'XII MM', 'XII TKJ', 'XI RPL', 'XI MM', 'XI TKJ', 'X RPL', 'X MM', 'X TKJ'] as $kelas)
                                            <option value="{{ $kelas }}" {{ old('kelas', $santri->kelas) == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="no_hp" class="form-label">No HP (Opsional)</label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="Masukkan Nomor HP" value="{{ $santri->no_hp }}">
                                </div>
                                
                                <div class="col-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required>{{ $santri->alamat }}</textarea>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email (Opsional)</label>
                                    <input type="email" name="email" class="form-control" placeholder="example@domain.com" value="{{ $santri->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="foto" class="form-label">Foto (Opsional)</label>
                                    <input type="file" name="foto" class="form-control">
                                    @if ($santri->foto)
                                        <small class="text-muted mt-1 d-block">Foto saat ini: <a href="{{ asset('storage/' . $santri->foto) }}" target="_blank">Lihat Foto</a></small>
                                    @endif
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header" style="background: linear-gradient(45deg, #1a535c, #0d2e33);">
                                    <h3 class="mb-0 text-white text-center">Tambah Data Wali Santri</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="wali_nama" class="form-label">Nama Wali</label>
                                            <input type="text" name="wali_nama" class="form-control" placeholder="Nama Lengkap Wali" value="{{ $santri->wali_nama }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="wali_no_hp" class="form-label">No HP Wali</label>
                                            <input type="text" name="wali_no_hp" class="form-control" placeholder="Masukkan Nomor HP Wali" value="{{ $santri->wali_no_hp }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="wali_alamat" class="form-label">Alamat Wali</label>
                                            <textarea name="wali_alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Wali" required>{{ $santri->wali_alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn simpan-perubahan-btn">
                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Custom JavaScript for additional animations -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animasi tombol simpan
        const submitButton = document.querySelector('button[type="submit"]');
        submitButton.addEventListener('mouseenter', () => {
            submitButton.classList.add('animate__animated', 'animate__rubberBand');
        });
        submitButton.addEventListener('mouseleave', () => {
            submitButton.classList.remove('animate__animated', 'animate__rubberBand');
        });

        // Animasi tombol kembali
        const backButton = document.querySelector('.btn-secondary');
        backButton.addEventListener('mouseenter', () => {
            backButton.classList.add('animate__animated', 'animate__pulse');
        });
        backButton.addEventListener('mouseleave', () => {
            backButton.classList.remove('animate__animated', 'animate__pulse');
        });
    });
</script>

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
</style>
@endsection