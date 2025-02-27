@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Tambah Data Santri</h4>
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

                        <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nis" class="form-label">NIS :</label>
                                    <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap :</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir :</label>
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="asal" class="form-label">Daerah Asal :</label>
                                <select name="asal" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Daerah Asal --</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Sumatera Utara">Sumatera Utara</option>
                                    <option value="Sumatera Barat">Sumatera Barat</option>
                                    <option value="Riau">Riau</option>
                                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                                    <option value="Jambi">Jambi</option>
                                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                                    <option value="Bangka Belitung">Bangka Belitung</option>
                                    <option value="Bengkulu">Bengkulu</option>
                                    <option value="Lampung">Lampung</option>
                                    <option value="DKI Jakarta">DKI Jakarta</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Banten">Banten</option>
                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                    <option value="DI Yogyakarta">DI Yogyakarta</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                    <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                    <option value="Gorontalo">Gorontalo</option>
                                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                                    <option value="Maluku">Maluku</option>
                                    <option value="Maluku Utara">Maluku Utara</option>
                                    <option value="Papua">Papua</option>
                                    <option value="Papua Barat">Papua Barat</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori :</label>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="kategori" id="kategori-smp" value="Sekolah Menengah Pertama" required>
                                        <label for="kategori-smp" class="form-check-label">Sekolah Menengah Pertama</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="kategori" id="kategori-smk" value="Sekolah Menengah Kejuruan" required>
                                        <label for="kategori-smk" class="form-check-label">Sekolah Menengah Kejuruan</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="kategori" id="kategori-programmer" value="Sekolah Programmer" required>
                                        <label for="kategori-programmer" class="form-check-label">Sekolah Programmer</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="sekolah" class="form-label">Sekolah :</label>
                                <select name="sekolah" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Sekolah --</option>
                                    <option value="SMK Telekomunikasi">SMK Telekomunikasi</option>
                                    <option value="SMA DU 1">SMA DU 1</option>
                                    <option value="SMA DU 2">SMA DU 2</option>
                                    <option value="SMA DU 3">SMA DU 3</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas :</label>
                                    <select name="kelas" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Kelas --</option>
                                        <option value="XII RPL">XII RPL</option>
                                        <option value="XII MM">XII MM</option>
                                        <option value="XII TKJ">XII TKJ</option>
                                        <option value="XI RPL">XI RPL</option>
                                        <option value="XI MM">XI MM</option>
                                        <option value="XI TKJ">XI TKJ</option>
                                        <option value="X RPL">X RPL</option>
                                        <option value="X MM">X MM</option>
                                        <option value="X TKJ">X TKJ</option>
                                        <!-- Tambahkan opsi lainnya jika diperlukan -->
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="no_hp" class="form-label">No HP (Opsional) :</label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="Masukkan Nomor HP">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat :</label>
                                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email (Opsional) :</label>
                                    <input type="email" name="email" class="form-control" placeholder="example@domain.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="foto" class="form-label">Foto (Opsional) :</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header" style="background: linear-gradient(45deg, #1a535c, #0d2e33);">
                                    <h3 class="mb-0 text-white text-center">Tambah Data Wali Santri</h3>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="wali_nama" class="form-label">Nama Lengkap :</label>
                                            <input type="text" id="nama" name="wali_nama" class="form-control" placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="wali_no_hp" class="form-label">No HP :</label>
                                            <input type="text" id="nomor_hp" name="wali_no_hp" class="form-control" placeholder="Masukkan Nomor HP">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="wali_alamat" class="form-label">Alamat :</label>
                                        <textarea id="alamat" name="wali_alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-end mt-4">
                                <button type="submit" class="btn simpan-btn">
                                    <i class="fas fa-save me-1"></i> Simpan
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
        // Hanya menyisakan animasi tombol simpan
        const submitButton = document.querySelector('button[type="submit"]');
        submitButton.addEventListener('mouseenter', () => {
            submitButton.classList.add('animate__animated', 'animate__rubberBand');
        });
        submitButton.addEventListener('mouseleave', () => {
            submitButton.classList.remove('animate__animated', 'animate__rubberBand');
        });
    });
</script>

<style>
    /* Warna gradasi dark green untuk tombol Simpan */
    .simpan-btn {
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .simpan-btn:hover {
        background: linear-gradient(45deg, #0d2e33, #1a535c);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .simpan-btn:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .simpan-btn::after {
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

    .simpan-btn:hover::after {
        opacity: 1;
        transform: translate(-50%, -50%) rotate(45deg) scale(0);
    }
    .page-wrapper {
        margin-top: -70px;
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        min-height: 100vh;
        padding: 20px;
    }
</style>
@endsection

