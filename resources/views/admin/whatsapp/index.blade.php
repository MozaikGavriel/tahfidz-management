@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Broadcast WhatsApp</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row animate__animated animate__fadeInUp">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success animate__animated animate__fadeIn">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('whatsapp.store') }}" method="POST" class="animate__animated animate__fadeInUp">
                            @csrf
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="santri_id" class="form-label">Nama Santri</label>
                                    <select id="santri_id" name="santri_id" class="form-select" required>
                                        <option value="" disabled selected>Pilih Nama Santri</option>
                                        @foreach ($santris as $santri)
                                            <option value="{{ $santri->id }}" data-phone="{{ $santri->wali_no_hp }}">{{ $santri->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label">Nomor HP</label>
                                    <input type="tel" id="phone_number" name="nomor_wa" class="form-control" placeholder="Enter Number" pattern="^\+?\d{10,15}$" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter message" readonly required></textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn send-broadcast-btn">
                                        <i class="fas fa-paper-plane me-2"></i>Send Broadcast
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr class="my-4">

                        <h4 class="mb-3 animate__animated animate__fadeIn">Broadcast History</h4>
                        <div class="table-responsive animate__animated animate__fadeInUp">
                            <table class="table table-hover table-striped" id="whatsappTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Santri</th>
                                        <th>Nomor HP</th>
                                        <th>Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($whatsapps as $whatsapp)
                                        <tr class="animate__animated animate__fadeInUp">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $whatsapp->santri->nama }}</td>
                                            <td>{{ $whatsapp->nomor_wa }}</td>
                                            <td>{{ $whatsapp->message }}</td>
                                            <td>
                                                <form action="{{ route('whatsapp.destroy', $whatsapp) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .form-control:read-only {
        background-color: #f8f9fa;
    }

    /* Warna gradasi dark green untuk tombol Send Broadcast */
    .send-broadcast-btn {
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .send-broadcast-btn:hover {
        background: linear-gradient(45deg, #0d2e33, #1a535c);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .send-broadcast-btn:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .send-broadcast-btn::after {
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

    .send-broadcast-btn:hover::after {
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
    document.getElementById('santri_id').addEventListener('change', function () {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('phone_number').value = selectedOption.getAttribute('data-phone');

        // Ambil data tahfidz berdasarkan santri_id
        let santriId = selectedOption.value;
        fetch(`/get-tahfidz-data/${santriId}`)
            .then(response => response.json())
            .then(data => {
                let message = `Ananda ${selectedOption.text} Telah Menyelesaikan Rutinan Setoran Tahfidz :\n` +
                              `Surat : ${data.surat}\n` +
                              `Ayat : ${data.ayat}\n` +
                              `Jumlah Juzz : ${data.jumlah_juzz}\n` +
                              `Waktu : ${data.waktu}\n` +
                              `Tanggal : ${data.tanggal}\n` +
                              `Ustadz : ${data.nama_ustadz}\n` +
                              `Keterangan : ${data.keterangan}`;
                document.getElementById('message').value = message;
            });
    });

    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Animasi tombol Send Broadcast
        const sendBroadcastBtn = document.querySelector('.send-broadcast-btn');
        sendBroadcastBtn.addEventListener('mouseenter', () => {
            sendBroadcastBtn.classList.add('animate__animated', 'animate__rubberBand');
        });
        sendBroadcastBtn.addEventListener('mouseleave', () => {
            sendBroadcastBtn.classList.remove('animate__animated', 'animate__rubberBand');
        });

        // Animasi tombol hapus
        const deleteButtons = document.querySelectorAll('.btn-danger');
        deleteButtons.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.classList.add('animate__animated', 'animate__rubberBand');
            });
            btn.addEventListener('mouseleave', () => {
                btn.classList.remove('animate__animated', 'animate__rubberBand');
            });
        });
    });
</script>
@endsection
