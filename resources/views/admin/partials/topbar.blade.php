<nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background: linear-gradient(45deg, #1a535c, #0d2e33);">
    <div class="container-fluid">
        <!-- Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/logo-icon.png') }}" 
                 alt="Logo" 
                 class="me-2" 
                 width="40"
                 loading="lazy">
            <span class="fw-bold text-white">Tahfidz</span>
        </a>

        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side -->
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Invoice Button -->
                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center" href="{{ route('report-cards.index') }}" style="height: 100%;">
                        <i class="fas fa-file-invoice me-2" style="font-size: 1.2rem;"></i>
                        <span>Invoice</span>
                    </a>
                </li>

                <!-- Notification Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="height: 100%;">
                        <i class="fas fa-bell" style="font-size: 1.2rem;"></i>
                        <span class="badge bg-danger rounded-pill notification-badge" style="position: relative; top: -8px; right: -5px;">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                        <li><h6 class="dropdown-header">Notifikasi Terbaru</h6></li>
                        <li><a class="dropdown-item" href="#">Setoran Baru dari Ahmad</a></li>
                        <li><a class="dropdown-item" href="#">Pengingat Evaluasi Bulanan</a></li>
                        <li><a class="dropdown-item" href="#">Update Sistem Tahfidz</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-primary" href="#">Lihat Semua Notifikasi</a></li>
                    </ul>
                </li>

                <!-- User Profile Dropdown -->
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="height: 100%;">
                            @if (Auth::user()->profile && Auth::user()->profile->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->profile->avatar) }}" 
                                     alt="Foto Profil" 
                                     class="rounded-circle shadow-sm" 
                                     width="31"
                                     loading="lazy">
                            @else
                                <i class="fas fa-user-circle fa-lg text-white"></i>
                            @endif
                            <span class="ms-2">
                                {{ Auth::user()->profile->full_name ?? Auth::user()->name }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="fas fa-user me-2"></i>Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Add Bootstrap JS for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .navbar {
        padding: 0.5rem 1rem;
        z-index: 1000;
    }
    .navbar-brand {
        font-size: 1.25rem;
        color: #ffffff !important;
    }
    .nav-link {
        color: rgba(255,255,255,0.8) !important;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }
    .nav-link:hover,
    .nav-link.active {
        color: #ffffff !important;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 0.25rem;
    }
    .dropdown-menu {
        background-color: #1a535c;
        border: none;
    }
    .dropdown-item {
        color: rgba(255,255,255,0.8);
        transition: all 0.3s ease;
    }
    .dropdown-item:hover {
        color: #ffffff;
        background-color: rgba(255,255,255,0.1);
    }
    .navbar-toggler {
        border: none;
    }
    .navbar-toggler:focus {
        box-shadow: none;
    }

    /* Notification Icon Alignment */
    .fa-bell {
        position: relative;
        top: 2px;
    }

    .notification-badge {
        position: absolute;
        top: 5px;
        right: -5px;
        font-size: 0.7rem;
        padding: 0.25em 0.4em;
    }

    /* Responsive additions */
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1rem;
        }
        .navbar-brand img {
            width: 30px;
        }
        .nav-link {
            padding: 0.5rem;
        }
        .dropdown-menu {
            width: 100%;
            text-align: center;
        }
        .navbar-nav {
            margin-top: 1rem;
        }
        .nav-item {
            margin: 0.5rem 0;
        }
        .nav-link span {
            display: inline-block;
            max-width: 120px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    }

    @media (max-width: 576px) {
        .navbar-brand {
            font-size: 0.9rem;
        }
        .navbar-brand img {
            width: 25px;
        }
        .nav-link {
            font-size: 0.9rem;
        }
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideInDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* Navbar Animation */
    .navbar {
        animation: fadeIn 0.5s ease-in-out;
    }

    /* Notification Badge Animation */
    .notification-count {
        animation: pulse 1.5s infinite;
    }

    /* Dropdown Animation */
    .dropdown-menu {
        animation: slideInDown 0.3s ease-out;
    }

    /* Hover Effects */
    .nav-link {
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        transform: translateY(-2px);
    }

    .dropdown-item {
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        padding-left: 1.5rem;
    }

    /* Dark Mode Toggle Animation */
    #darkModeToggle {
        transition: transform 0.3s ease;
    }

    #darkModeToggle:hover {
        transform: rotate(15deg);
    }

    /* Smooth Dark Mode Transition */
    body {
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    .navbar {
        transition: background 0.5s ease;
    }

    .dropdown-menu {
        transition: background-color 0.5s ease;
    }

    /* New Features */
    .navbar-brand {
        position: relative;
        overflow: hidden;
    }

    .navbar-brand::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, #37acbe, #0d2e33);
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover::after {
        transform: translateX(0);
    }

    .notification-badge {
        animation: pulse 1.5s infinite;
        position: absolute;
        top: 5px;
        right: -5px;
    }

    .profile-dropdown {
        position: relative;
    }

    .profile-dropdown::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: scale(0);
        transition: transform 0.3s ease;
    }

    .profile-dropdown:hover::before {
        transform: scale(1);
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: white;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    .nav-link:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }
</style>