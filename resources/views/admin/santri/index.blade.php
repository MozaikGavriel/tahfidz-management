@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Data Santri</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('santri.create') }}" class="btn tambah-data-btn">
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
                            <form action="{{ route('santri.store') }}" method="GET" class="d-flex animate__animated animate__fadeInLeft">
                                <input type="text" name="search" class="form-control rounded-pill me-2" placeholder="Cari Data...">
                                <button type="submit" class="btn btn-success rounded-pill cari-btn">
                                    <i class="fas fa-search me-1"></i>Cari
                                </button>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="santriTable">
                                <thead class="table-light">
                                    <tr>
                                        <th><input type="checkbox" id="select-all"></th>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Asal</th>
                                        <th>Kategori</th>
                                        <th>Kelas</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($santris as $s)
                                        <tr class="animate__animated animate__fadeInUp">
                                            <td><input type="checkbox" name="ids[]" class="select-checkbox" value="{{ $s->id }}"></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->nis }}</td>
                                            <td>{{ $s->nama }}</td>
                                            <td>{{ $s->asal }}</td>
                                            <td>{{ $s->kategori }}</td>
                                            <td>{{ $s->kelas }}</td>
                                            <td>
                                                @if ($s->foto)
                                                    <img src="{{ asset('storage/' . $s->foto) }}" alt="Foto" class="rounded-circle" width="50" height="50">
                                                @else
                                                    <span class="badge bg-secondary">Tidak Ada Foto</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('santri.edit', $s->id) }}" class="btn btn-sm btn-warning action-btn" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('santri.show', $s->id) }}" class="btn btn-sm btn-info action-btn" data-bs-toggle="tooltip" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <form action="{{ route('santri.destroy', $s->id) }}" method="POST" class="d-inline">
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
    .table-hover tbody tr:hover {
        background-color: rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .rounded-circle {
        object-fit: cover;
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

    .card-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 1.5rem;
        color: #2c3e50;
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

    .form-control {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
    }

    .badge {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }

    /* Add Poppins font from Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
</style>

<script>
    $(document).ready(function () {
        $('#santriTable').DataTable({
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
        const cariBtn = document.querySelector('.cari-btn');
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

        // Animasi saat tombol dihover
        cariBtn.addEventListener('mouseenter', () => {
            cariBtn.classList.add('animate__animated', 'animate__pulse');
        });

        cariBtn.addEventListener('mouseleave', () => {
            cariBtn.classList.remove('animate__animated', 'animate__pulse');
        });

        // Animasi saat tombol diklik
        cariBtn.addEventListener('click', () => {
            cariBtn.classList.add('animate__animated', 'animate__rubberBand');
            setTimeout(() => {
                cariBtn.classList.remove('animate__animated', 'animate__rubberBand');
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

        const selectAll = document.getElementById('select-all');
        const checkboxes = document.querySelectorAll('.select-checkbox');
        const deleteSelectedBtn = document.getElementById('delete-selected');

        // Select All
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
            toggleDeleteButton();
        });

        // Toggle Delete Button
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', toggleDeleteButton);
        });

        function toggleDeleteButton() {
            const checkedBoxes = document.querySelectorAll('.select-checkbox:checked');
            deleteSelectedBtn.disabled = checkedBoxes.length === 0;
        }

        // Delete Selected
        deleteSelectedBtn.addEventListener('click', function() {
            const selectedIds = Array.from(document.querySelectorAll('.select-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (selectedIds.length > 0 && confirm('Yakin ingin menghapus data terpilih?')) {
                fetch("{{ route('santri.delete-multiple') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ ids: selectedIds })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert('Gagal menghapus data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
</script>
@endsection
