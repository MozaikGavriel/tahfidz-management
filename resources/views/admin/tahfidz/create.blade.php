@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Tambah Data Hafalan</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('tahfidz.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row animate__animated animate__fadeInUp">
            <div class="col-12">
                <div class="card shadow-lg animate__animated animate__zoomIn">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger animate__animated animate__fadeIn">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('tahfidz.store') }}" method="POST" class="needs-validation animate__animated animate__fadeIn" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6 animate__animated animate__fadeInLeft">
                                    <label for="santri_id">Nama Santri</label>
                                    <select name="santri_id" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih Nama Santri --</option>
                                        @foreach($santris as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 animate__animated animate__fadeInRight">
                                    <label for="nama_ustadz">Nama Ustadz</label>
                                    <select name="nama_ustadz" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih Nama Ustadz --</option>
                                        <option value="Ustd. Rohman">Ustd. Rohman</option>
                                        <option value="Ustd. Solikhin">Ustd. Solikhin</option>
                                        <option value="Ustd. Muhaimin">Ustd. Muhaimin</option>
                                        <option value="Ustd. Bukhori">Ustd. Bukhori</option>
                                        <option value="Ustd. Ello">Ustd. Ello</option>
                                        <option value="Ustd. Mudrik">Ustd. Mudrik</option>
                                    </select>
                                </div>

                                <div class="col-md-6 animate__animated animate__fadeInLeft">
                                    <label for="waktu">Waktu</label>
                                    <select name="waktu" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih Waktu --</option>
                                        <option value="Subuh">Subuh</option>
                                        <option value="Dhuha">Dhuha</option>
                                        <option value="Dzuhur">Dzuhur</option>
                                        <option value="Ashar">Ashar</option>
                                        <option value="Maghrib">Maghrib</option>
                                        <option value="Isya">Isya</option>
                                    </select>
                                </div>
                                <div class="col-md-6 animate__animated animate__fadeInRight">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>

                                <div class="col-md-6 animate__animated animate__fadeInLeft">
                                    <label for="surat">Surat</label>
                                    <input type="text" name="surat" class="form-control" placeholder="Masukkan Nama Surat" required>
                                </div>
                                <div class="col-md-6 animate__animated animate__fadeInRight">
                                    <label for="ayat">Ayat</label>
                                    <input type="text" name="ayat" class="form-control" placeholder="Masukkan Ayat" required>
                                </div>

                                <div class="col-md-6 animate__animated animate__fadeInLeft">
                                    <label for="jumlah_juzz">Jumlah Juz</label>
                                    <input type="number" name="jumlah_juzz" class="form-control" placeholder="Masukkan Jumlah Juz" required>
                                </div>
                                <div class="col-md-6 animate__animated animate__fadeInRight">
                                    <label for="keterangan">Keterangan (Opsional)</label>
                                    <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan"></textarea>
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
            backButton.classList.add('animate__animated', 'animate__rubberBand');
        });
        backButton.addEventListener('mouseleave', () => {
            backButton.classList.remove('animate__animated', 'animate__rubberBand');
        });
    });
</script>
@endsection
