<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pergudangan Lek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/build/images/dalemgudang.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .layout {
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.9) 0%, rgba(30, 30, 40, 0.95) 50%, rgba(0, 0, 0, 0.9) 100%);
            color: #fefefe;
            transition: transform 0.3s ease, width 0.3s ease;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1030;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.5);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(0, 0, 0, 0.3);
        }

        .sidebar-header h4 {
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.7);
            padding: 0.75rem 1.5rem;
            border-radius: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.2s ease;
            margin: 0.25rem 0.5rem;
            border-radius: 8px;
        }

        .sidebar .nav-link .sidebar-icon {
            display: inline-flex;
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            color: inherit;
        }

        .sidebar .nav-link .sidebar-label {
            flex: 1;
        }

        .sidebar .nav-link svg {
            width: 20px;
            height: 20px;
            display: block;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: linear-gradient(135deg, #4285f4 0%, #1967d2 100%);
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
        }

        .sidebar .dropdown-menu {
            background-color: rgba(0, 0, 0, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            margin-top: 0.5rem;
        }

        .sidebar .dropdown-item {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.5rem 1rem;
        }

        .sidebar .dropdown-item:hover {
            background: linear-gradient(135deg, #4285f4 0%, #1967d2 100%);
            color: #ffffff;
        }

        .content {
            margin-left: 260px;
            transition: margin-left 0.3s ease;
        }

        .topbar {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.85) 0%, rgba(30, 30, 40, 0.9) 100%);
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .topbar .btn {
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.2);
            transition: all 0.2s ease;
        }

        .topbar .btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .content-inner {
            padding: 2rem;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1020;
        }

        .sidebar-user .btn {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            transition: all 0.2s ease;
        }

        .sidebar-user .btn:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .badge {
            background: linear-gradient(135deg, #4285f4 0%, #1967d2 100%) !important;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            body.sidebar-open .sidebar {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }

            body.sidebar-open .sidebar-overlay {
                display: block;
            }
        }

        @media (min-width: 992px) {
            body.sidebar-collapsed .sidebar {
                width: 80px;
            }

            body.sidebar-collapsed .content {
                margin-left: 80px;
            }

            body.sidebar-collapsed .sidebar .nav-link {
                justify-content: center;
            }

            body.sidebar-collapsed .sidebar .sidebar-label,
            body.sidebar-collapsed .sidebar .sidebar-header h4,
            body.sidebar-collapsed .sidebar .sidebar-user {
                display: none;
            }
        }
    </style>
</head>

<body class="sidebar-open">
    <div class="layout d-flex">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="/build/images/gudang.png" alt="Gudang" class="me-2" style="height: 30px;">
                    <h4 class="mb-0">Gudang☭Kyta</h4>
                </div>
                <button class="btn btn-sm btn-outline-light d-lg-none" id="sidebarClose">×</button>
            </div>
            <div class="sidebar-nav">
                <ul class="nav flex-column">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">
                                <span class="sidebar-icon">
                                    <i class="bi bi-house-door"></i>
                                </span>
                                <span class="sidebar-label">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}"
                                href="{{ route('kategori.index') }}">
                                <span class="sidebar-icon">
                                    <i class="bi bi-grid"></i>
                                </span>
                                <span class="sidebar-label">Kategori</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}"
                                href="{{ route('barang.index') }}">
                                <span class="sidebar-icon">
                                    <i class="bi bi-box-seam"></i>
                                </span>
                                <span class="sidebar-label">Barang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('laporans.*') ? 'active' : '' }}"
                                href="{{ route('laporans.index') }}">
                                <span class="sidebar-icon">
                                    <i class="bi bi-bar-chart-line"></i>
                                </span>
                                <span class="sidebar-label">Laporan</span>
                            </a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">
                                <span class="sidebar-icon">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                </span>
                                <span class="sidebar-label">Login</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                                href="{{ route('register') }}">
                                <span class="sidebar-icon">
                                    <i class="bi bi-person-plus"></i>
                                </span>
                                <span class="sidebar-label">Register</span>
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
            @auth
                <div class="px-3 pb-4 sidebar-user">
                    <div class="dropdown">
                        <button class="btn btn-outline-light w-100 d-flex justify-content-between align-items-center"
                            type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>{{ Auth::user()->name }}</span>
                            @if (Auth::user()->role != 'user')
                                <span class="badge bg-primary ms-2">{{ Auth::user()->role }}</span>
                            @endif
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="document.getElementById('logout-form').submit(); return false;">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
        </div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>
        <div class="content flex-grow-1">
            <header class="topbar d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-light me-3" id="sidebarToggle"><i class="bi bi-list"></i></button>
                    <h5 class="mb-0">Gudang Barang</h5>
                </div>
                @auth
                    <span class="text-white-50 d-none d-lg-inline">{{ now()->translatedFormat('d F Y') }}</span>
                @endauth
            </header>
            <main class="content-inner">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        @method('POST')
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleButton = document.getElementById('sidebarToggle');
        const closeButton = document.getElementById('sidebarClose');
        const overlay = document.getElementById('sidebarOverlay');
        toggleButton.addEventListener('click', () => {
            if (window.innerWidth >= 992) {
                document.body.classList.toggle('sidebar-collapsed');
            } else {
                document.body.classList.toggle('sidebar-open');
            }
        });
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 992) {
                    document.body.classList.remove('sidebar-open');
                }
            });
        });
        if (closeButton) {
            closeButton.addEventListener('click', () => {
                document.body.classList.remove('sidebar-open');
            });
        }
        if (overlay) {
            overlay.addEventListener('click', () => {
                document.body.classList.remove('sidebar-open');
            });
        }
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 992) {
                document.body.classList.add('sidebar-open');
            } else {
                document.body.classList.remove('sidebar-collapsed');
            }
        });
        if (window.innerWidth < 992) {
            document.body.classList.remove('sidebar-open');
        }
    </script>
</body>

</html>
