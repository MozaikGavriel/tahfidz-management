@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Data Hafalan</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('tahfidz.create') }}" class="btn tambah-data-btn">
                        <i class="fas fa-plus me-1"></i>Tambah Data
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
                        <div class="mb-4">
                            <form action="{{ route('tahfidz.store') }}" method="GET" class="d-flex animate__animated animate__fadeInLeft">
                                <input type="text" name="search" class="form-control rounded-pill me-2" placeholder="Cari Data...">
                                <button type="submit" class="btn btn-success rounded-pill cari-btn">
                                    <i class="fas fa-search me-1"></i>Cari
                                </button>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="tahfidzTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Nama Santri</th>
                                        <th>Nama Ustadz</th>
                                        <th>Surat</th>
                                        <th>Ayat</th>
                                        <th>Jumlah Juzz</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tahfidz as $key => $item)
                                        <tr class="animate__animated animate__fadeInUp">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->waktu }}</td>
                                            <td>{{ optional($item->santri)->nama }}</td>
                                            <td>{{ $item->nama_ustadz }}</td>
                                            <td>{{ $item->surat }}</td>
                                            <td>{{ $item->ayat }}</td>
                                            <td>{{ $item->jumlah_juzz }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('tahfidz.edit', $item->id) }}" class="btn btn-sm btn-warning action-btn" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('tahfidz.destroy', $item->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger action-btn" onclick="return confirm('Yakin ingin menghapus?')" data-bs-toggle="tooltip" title="Hapus">
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

    /* Warna gradasi dark green untuk tombol Cari */
    .cari-btn {
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .cari-btn:hover {
        background: linear-gradient(45deg, #0d2e33, #1a535c);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .cari-btn:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .cari-btn::after {
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

    .cari-btn:hover::after {
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

    .table-hover tbody tr:hover {
        background-color: rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .page-wrapper {
        margin-top: -70px;
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        min-height: 100vh;
        padding: 20px;
    }
</style>

<script>
    $(document).ready(function () {
        $('#tahfidzTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)"
            }
        });
        
        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    document.addEventListener('DOMContentLoaded', function() {
        const tambahDataBtn = document.querySelector('.tambah-data-btn');
        const cariBtn = document.querySelector('.cari-btn');
        const actionBtns = document.querySelectorAll('.action-btn');

        // Animasi tombol Tambah Data
        tambahDataBtn.addEventListener('mouseenter', () => {
            tambahDataBtn.classList.add('animate__animated', 'animate__pulse');
        });

        tambahDataBtn.addEventListener('mouseleave', () => {
            tambahDataBtn.classList.remove('animate__animated', 'animate__pulse');
        });

        tambahDataBtn.addEventListener('click', () => {
            tambahDataBtn.classList.add('animate__animated', 'animate__rubberBand');
            setTimeout(() => {
                tambahDataBtn.classList.remove('animate__animated', 'animate__rubberBand');
            }, 1000);
        });

        // Animasi tombol Cari
        cariBtn.addEventListener('mouseenter', () => {
            cariBtn.classList.add('animate__animated', 'animate__pulse');
        });

        cariBtn.addEventListener('mouseleave', () => {
            cariBtn.classList.remove('animate__animated', 'animate__pulse');
        });

        cariBtn.addEventListener('click', () => {
            cariBtn.classList.add('animate__animated', 'animate__rubberBand');
            setTimeout(() => {
                cariBtn.classList.remove('animate__animated', 'animate__rubberBand');
            }, 1000);
        });

        // Animasi tombol action
        actionBtns.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.classList.add('animate__animated', 'animate__pulse');
            });

            btn.addEventListener('mouseleave', () => {
                btn.classList.remove('animate__animated', 'animate__pulse');
            });

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
