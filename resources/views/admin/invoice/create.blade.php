@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Buat Kartu Laporan</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('report-cards.index') }}" class="btn btn-secondary">
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

                        <form action="{{ route('report-cards.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="santri_id" class="form-label">Nama Santri</label>
                                    <select name="santri_id" id="santri_id" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Santri --</option>
                                        @foreach($santris as $santri)
                                            <option value="{{ $santri->id }}" data-nis="{{ $santri->nis }}" data-sekolah="{{ $santri->sekolah }}">
                                                {{ $santri->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" id="nis" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="sekolah" class="form-label">Sekolah</label>
                                    <input type="text" name="sekolah" id="sekolah" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="ttd_pengasuh" class="form-label">TTD Pengasuh</label>
                                    <input type="text" name="ttd_pengasuh" class="form-control" required>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn simpan-btn">
                                        <i class="fas fa-save me-1"></i>Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .page-wrapper {
        margin-top: -70px;
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        min-height: 100vh;
        padding: 20px;
    }

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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const santriSelect = document.getElementById('santri_id');
        const nisInput = document.getElementById('nis');
        const sekolahInput = document.getElementById('sekolah');

        santriSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            nisInput.value = selectedOption.dataset.nis || '';
            sekolahInput.value = selectedOption.dataset.sekolah || '';
        });
    });
</script>
@endsection