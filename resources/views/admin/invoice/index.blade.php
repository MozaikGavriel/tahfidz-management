@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Kartu Laporan</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('report-cards.create') }}" class="btn tambah-data-btn">
                        <i class="fas fa-plus me-1"></i>Buat Baru
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
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="invoiceTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Sekolah</th>
                                        <th>NIS</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reportCards as $card)
                                    <tr class="animate__animated animate__fadeInUp">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $card->nama }}</td>
                                        <td>{{ $card->sekolah }}</td>
                                        <td>{{ $card->santri->nis ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('report-cards.view', $card->id) }}" class="btn btn-info btn-sm action-btn" data-bs-toggle="tooltip" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('report-cards.generate', $card->id) }}" class="btn btn-primary btn-sm action-btn" target="_blank" data-bs-toggle="tooltip" title="Download PDF">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                                <form action="{{ route('report-cards.destroy', $card->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm action-btn" onclick="return confirm('Yakin ingin menghapus?')" data-bs-toggle="tooltip" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
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

    /* Warna gradasi dark green untuk tombol Tambah Data */
    .tambah-data-btn {
        background: linear-gradient(45deg, #37acbe, #0d2e33);
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .tambah-data-btn:hover {
        background: linear-gradient(45deg, #0d2e33, #37acbe);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgb(255, 255, 255);
    }

    .tambah-data-btn:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgb(255, 255, 255);
    }

    .tambah-data-btn::after {
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

    .tambah-data-btn:hover::after {
        opacity: 1;
        transform: translate(-50%, -50%) rotate(45deg) scale(0);
    }

    /* Animasi tombol action */
    .action-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .action-btn::after {
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

    .action-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .action-btn:hover::after {
        opacity: 1;
        transform: translate(-50%, -50%) rotate(45deg) scale(0);
    }

    .action-btn:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .page-wrapper {
        margin-top: -70px;
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        min-height: 100vh;
        padding: 20px;
    }

    /* Enhanced Typography */
    .page-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 1.8rem;
        letter-spacing: -0.5px;
    }

    th {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 1rem;
        color: #34495e;
    }

    td {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 0.95rem;
        color: #2c3e50;
    }

    .btn {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
</style>

<script>
    $(document).ready(function () {
        $('#invoiceTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)"
            }
        });
        
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    document.addEventListener('DOMContentLoaded', function() {
        const tambahDataBtn = document.querySelector('.tambah-data-btn');
        const actionBtns = document.querySelectorAll('.action-btn');

        // Animasi saat tombol dihover
        tambahDataBtn.addEventListener('mouseenter', () => {
            tambahDataBtn.classList.add('animate__animated', 'animate__pulse');
        });

        tambahDataBtn.addEventListener('mouseleave', () => {
            tambahDataBtn.classList.remove('animate__animated', 'animate__pulse');
        });

        // Animasi saat tombol diklik
        tambahDataBtn.addEventListener('click', () => {
            tambahDataBtn.classList.add('animate__animated', 'animate__rubberBand');
            setTimeout(() => {
                tambahDataBtn.classList.remove('animate__animated', 'animate__rubberBand');
            }, 1000);
        });

        actionBtns.forEach(btn => {
            // Animasi saat tombol dihover
            btn.addEventListener('mouseenter', () => {
                btn.classList.add('animate__animated', 'animate__pulse');
            });

            btn.addEventListener('mouseleave', () => {
                btn.classList.remove('animate__animated', 'animate__pulse');
            });

            // Animasi saat tombol diklik
            btn.addEventListener('click', () => {
                btn.classList.add('animate__animated', 'animate__rubberBand');
                setTimeout(() => {
                    btn.classList.remove('animate__animated', 'animate__rubberBand');
                }, 1000);
            });
        });
    });
</script>
@endsection 