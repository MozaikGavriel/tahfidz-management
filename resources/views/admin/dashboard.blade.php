@extends('admin.layout')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Quick Access Cards -->
        <div class="row mb-4">
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('dashboard') }}">
                    <div class="card card-hover animate__animated animate__fadeInLeft">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-gradient-cyan">
                                <i class="mdi mdi-view-dashboard text-white"></i>
                            </div>
                            <h5 class="mt-3 mb-0">Dashboard</h5>
                            <p class="text-muted mb-0">Overview System</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('santri.index') }}">
                    <div class="card card-hover animate__animated animate__fadeInLeft animate__delay-1s">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-gradient-warning">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <h5 class="mt-3 mb-0">Data Santri</h5>
                            <p class="text-muted mb-0">Manage Students</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('tahfidz.index') }}">
                    <div class="card card-hover animate__animated animate__fadeInLeft animate__delay-2s">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-gradient-danger">
                                <i class="fa-solid fa-book-quran text-white"></i>
                            </div>
                            <h5 class="mt-3 mb-0">Tahfidz</h5>
                            <p class="text-muted mb-0">Quran Memorization</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('whatsapp.index') }}">
                    <div class="card card-hover animate__animated animate__fadeInLeft animate__delay-3s">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-gradient-info">
                                <i class="fab fa-whatsapp text-white"></i>
                            </div>
                            <h5 class="mt-3 mb-0">Whatsapp</h5>
                            <p class="text-muted mb-0">Broadcast Messages</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="row animate__animated animate__fadeInUp">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title text-dark fw-bold mb-4"><i class="fas fa-chart-line me-2"></i>System Statistics</h4>
                        <div class="row mt-4">
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 shadow-sm h-100 animate__animated animate__jackInTheBox">
                                    <div class="card-body p-4">
                                        <h5 class="card-title text-dark fw-bold mb-4"><i class="fas fa-users me-2"></i>Santri Overview</h5>
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <div class="stat-card bg-light-hover p-3 rounded-3 animate__animated animate__swing">
                                                    <h6 class="text-muted">Total</h6>
                                                    <h3 class="text-primary count-up" data-count="150">0</h3>
                                                </div>
                                            </div>
                                            <div class="col-4 text-center">
                                                <div class="stat-card bg-light-hover p-3 rounded-3 animate__animated animate__swing animate__delay-1s">
                                                    <h6 class="text-muted">Active</h6>
                                                    <h3 class="text-success count-up" data-count="135">0</h3>
                                                </div>
                                            </div>
                                            <div class="col-4 text-center">
                                                <div class="stat-card bg-light-hover p-3 rounded-3 animate__animated animate__swing animate__delay-2s">
                                                    <h6 class="text-muted">Inactive</h6>
                                                    <h3 class="text-danger count-up" data-count="15">0</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 shadow-sm h-100 animate__animated animate__jackInTheBox">
                                    <div class="card-body p-4">
                                        <h5 class="card-title text-dark fw-bold mb-4"><i class="fas fa-quran me-2"></i>Quran Progress</h5>
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <div class="stat-card bg-light-hover p-3 rounded-3 animate__animated animate__tada">
                                                    <h6 class="text-muted">Completed</h6>
                                                    <h3 class="text-success count-up" data-count="8">0</h3>
                                                </div>
                                            </div>
                                            <div class="col-4 text-center">
                                                <div class="stat-card bg-light-hover p-3 rounded-3 animate__animated animate__tada animate__delay-1s">
                                                    <h6 class="text-muted">In Progress</h6>
                                                    <h3 class="text-warning count-up" data-count="12">0</h3>
                                                </div>
                                            </div>
                                            <div class="col-4 text-center">
                                                <div class="stat-card bg-light-hover p-3 rounded-3 animate__animated animate__tada animate__delay-2s">
                                                    <h6 class="text-muted">Target</h6>
                                                    <h3 class="text-info count-up" data-count="30">0</h3>
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
        </div>

        <!-- WhatsApp Broadcast History -->
        <div class="row animate__animated animate__fadeInUp mt-4">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title text-dark fw-bold mb-4">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp Broadcast History
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Santri</th>
                                        <th>Nomor HP</th>
                                        <th>Pesan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($whatsapps as $history)
                                    <tr class="animate__animated animate__fadeInUp">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $history->santri->nama }}</td>
                                        <td>{{ $history->nomor_wa }}</td>
                                        <td>{{ Str::limit($history->message, 50) }}</td>
                                        <td>{{ $history->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
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

    <style>
        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        .bg-gradient-cyan { background: linear-gradient(45deg, #00bcd4, #0097a7); }
        .bg-gradient-warning { background: linear-gradient(45deg, #ffc107, #ff9800); }
        .bg-gradient-danger { background: linear-gradient(45deg, #f44336, #d32f2f); }
        .bg-gradient-info { background: linear-gradient(45deg, #00bcd4, #0097a7); }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: scale(1.05);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .page-wrapper {
            margin-top: -70px;
            background: linear-gradient(45deg, #1a535c, #0d2e33);
            min-height: 100vh;
            padding: 20px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animated Counter
            const counters = document.querySelectorAll('.count-up');
            const speed = 200;

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    const inc = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });

            // Enhanced Animation Settings
            const animationSettings = {
                card: {
                    enter: 'animate__jackInTheBox',
                    leave: 'animate__fadeOut'
                },
                statCard: {
                    student: {
                        enter: 'animate__swing',
                        leave: 'animate__fadeOut'
                    },
                    quran: {
                        enter: 'animate__tada',
                        leave: 'animate__fadeOut'
                    }
                },
                delay: {
                    student: [0, 1000, 2000],
                    quran: [0, 1000, 2000]
                }
            };

            // Card Animation
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.classList.add('animate__animated', animationSettings.card.enter);
                card.addEventListener('mouseenter', () => {
                    card.classList.remove(animationSettings.card.leave);
                    card.classList.add(animationSettings.card.enter);
                });
                card.addEventListener('mouseleave', () => {
                    card.classList.remove(animationSettings.card.enter);
                    card.classList.add(animationSettings.card.leave);
                });
            });

            // Stat Card Animation
            const studentStatCards = document.querySelectorAll('.stat-card.animate__swing');
            const quranStatCards = document.querySelectorAll('.stat-card.animate__tada');

            studentStatCards.forEach((card, index) => {
                card.style.animationDelay = `${animationSettings.delay.student[index]}ms`;
                card.addEventListener('mouseenter', () => {
                    card.classList.remove(animationSettings.statCard.student.leave);
                    card.classList.add(animationSettings.statCard.student.enter);
                });
                card.addEventListener('mouseleave', () => {
                    card.classList.remove(animationSettings.statCard.student.enter);
                    card.classList.add(animationSettings.statCard.student.leave);
                });
            });

            quranStatCards.forEach((card, index) => {
                card.style.animationDelay = `${animationSettings.delay.quran[index]}ms`;
                card.addEventListener('mouseenter', () => {
                    card.classList.remove(animationSettings.statCard.quran.leave);
                    card.classList.add(animationSettings.statCard.quran.enter);
                });
                card.addEventListener('mouseleave', () => {
                    card.classList.remove(animationSettings.statCard.quran.enter);
                    card.classList.add(animationSettings.statCard.quran.leave);
                });
            });
        });
    </script>
</div>

@endsection