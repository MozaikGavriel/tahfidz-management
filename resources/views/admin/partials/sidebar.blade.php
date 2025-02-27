<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar navigation -->
    <nav class="sidebar-nav">
        <div class="sidebar-header" style="background: linear-gradient(45deg, #1a535c, #1a535c); padding: 20px;">
            <a class="navbar-brand" href="{{ route('dashboard') }}" style="padding: 0;">
                <b class="logo-icon">
                    <img src="{{ asset('assets/images/logo-icon.png') }}" 
                         alt="homepage" 
                         class="light-logo" 
                         width="50"
                         loading="lazy">
                </b>
                <span class="logo-text ms-2">
                    <img src="{{ asset('assets/images/logo.png') }}" 
                         alt="Tahfidz" 
                         class="light-logo" 
                         width="100" 
                         height="auto"
                         loading="lazy">
                </span>
            </a>
        </div>
        <ul id="sidebarnav" class="pt-3">
            <!-- Dashboard -->
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                   href="{{ route('dashboard') }}" 
                   aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <!-- Data Santri -->
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                   href="{{ route('santri.index') }}" 
                   aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="hide-menu">Data Santri</span>
                </a>
            </li>
            
            <!-- Tahfidz Management -->
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                   href="{{ route('tahfidz.index') }}" 
                   aria-expanded="false">
                    <i class="fa-solid fa-book-quran"></i>
                    <span class="hide-menu">Manajemen Tahfidz</span>
                </a>
            </li>

            <!-- WhatsApp Broadcast -->
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                   href="{{ route('whatsapp.index') }}" 
                   aria-expanded="false">
                    <i class="fab fa-whatsapp"></i>
                    <span class="hide-menu">Broadcast WhatsApp</span>
                </a>
            </li>

            <!-- Settings Section -->
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" 
                   href="javascript:void(0)" 
                   aria-expanded="false"
                   data-bs-toggle="collapse" 
                   data-bs-target="#settingsMenu">
                    <i class="fas fa-cog"></i>
                    <span class="hide-menu">Pengaturan</span>
                </a>
                <ul id="settingsMenu" class="collapse" aria-expanded="false">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('profile.edit') }}">
                            <i class="fas fa-user-cog"></i>
                            <span class="hide-menu">Profil</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">
                            <i class="fas fa-lock"></i>
                            <span class="hide-menu">Keamanan</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>

<style>
    /* Sidebar Animations */
    @keyframes slideInLeft {
        from {
            transform: translateX(-20px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes grow {
        from {
            transform: scale(0.95);
        }
        to {
            transform: scale(1);
        }
    }

    /* Sidebar Animation */
    .left-sidebar {
        animation: slideInLeft 0.5s ease-out;
        background: linear-gradient(45deg, #1a535c, #1a535c);
        margin: 0;
        padding: 0;
        z-index: 999;
        transition: all 0.3s ease;
    }

    /* Sidebar Items Animation */
    .sidebar-item {
        animation: grow 0.3s ease-out;
        animation-fill-mode: backwards;
    }

    .sidebar-item:nth-child(1) { animation-delay: 0.1s; }
    .sidebar-item:nth-child(2) { animation-delay: 0.2s; }
    .sidebar-item:nth-child(3) { animation-delay: 0.3s; }
    .sidebar-item:nth-child(4) { animation-delay: 0.4s; }
    .sidebar-item:nth-child(5) { animation-delay: 0.5s; }

    /* Hover Effects */
    .sidebar-link {
        color: #ffffff !important;
        transition: all 0.3s ease;
        outline: none !important;
        position: relative;
    }

    .sidebar-link:hover {
        transform: translateX(5px);
        background-color: rgba(255,255,255,0.1) !important;
        border-radius: 0.25rem;
    }

    .sidebar-link::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 2px;
        background: rgba(255,255,255,0.3);
        transition: width 0.3s ease;
    }

    .sidebar-link:hover::after {
        width: 100%;
    }

    /* Active State */
    .sidebar-item.active .sidebar-link {
        background-color: rgba(255,255,255,0.2) !important;
        border-radius: 0.25rem;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Collapse Animation */
    .collapse {
        background-color: rgba(0,0,0,0.1);
        border-radius: 0.5rem;
        margin: 0.5rem;
        padding-left: 1rem;
        transition: all 0.3s ease;
    }

    .collapse.show {
        display: block;
    }

    /* Logo Animation */
    .navbar-brand {
        display: flex;
        align-items: center;
        padding: 0 15px;
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
    }

    .logo-icon {
        margin-right: 500px;
    }

    .scroll-sidebar {
        height: calc(100vh - 60px);
        overflow-y: auto;
    }

    .sidebar-link:focus {
        background-color: transparent !important;
    }

    .has-arrow::after {
        border-color: #ffffff !important;
    }

    .has-arrow[aria-expanded="true"]::after {
        transform: rotate(-180deg);
    }

    /* Smooth Transitions */
    .left-sidebar {
        transition: all 0.3s ease;
    }

    /* Responsive Adjustments */
    @media (max-width: 767.98px) {
        .left-sidebar {
            position: fixed;
            top: 60px;
            left: -250px;
            animation: none;
        }
        .left-sidebar.active {
            left: 0;
        }
        
        .sidebar-item {
            animation: none;
        }
    }
</style>