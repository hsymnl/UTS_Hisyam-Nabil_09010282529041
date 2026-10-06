<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan')</title>
    <style>
        :root {
            --color-primary: #3B6FF5;
            --color-primary-hover: #315DD1;
            --color-primary-soft: #EEF3FF;
            --color-page: #F7F8FA;
            --color-surface: #FFFFFF;
            --color-text: #1F2937;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            --color-border-strong: #D1D5DB;
            --color-success: #2F855A;
            --color-success-soft: #EAF7F0;
            --color-success-border: #BFE6CE;
            --color-success-text: #276749;
            --color-warning: #B7791F;
            --color-warning-soft: #FFF7E6;
            --color-danger: #C94A4A;
            --color-danger-hover: #A83D3D;
            --color-danger-soft: #FDEEEE;
            --color-danger-border: #F3C3C3;
            --color-danger-text: #9B2C2C;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: var(--color-page);
            color: var(--color-text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar Layout */
        .navbar {
            background-color: var(--color-surface);
            border-bottom: 1px solid var(--color-border);
            height: 64px;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 40;
        }

        .navbar-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 36px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 17px;
            font-weight: 700;
            color: var(--color-text);
            text-decoration: none;
            letter-spacing: -0.01em;
        }

        .navbar-brand svg {
            width: 20px;
            height: 20px;
            color: var(--color-primary);
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 6px;
            list-style: none;
        }

        .nav-link {
            display: inline-block;
            font-size: 14px;
            font-weight: 500;
            color: var(--color-text-secondary);
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            transition: color 150ms ease, background-color 150ms ease;
        }

        .nav-link:hover {
            color: var(--color-text);
            background-color: #F3F4F6;
        }

        .nav-link.active {
            color: var(--color-primary);
            background-color: var(--color-primary-soft);
            font-weight: 600;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--color-text-secondary);
        }

        .btn-logout {
            background: none;
            border: 1px solid var(--color-border);
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            color: var(--color-text-secondary);
            cursor: pointer;
            transition: all 150ms ease;
        }

        .btn-logout:hover {
            color: var(--color-danger);
            border-color: var(--color-danger-border);
            background-color: var(--color-danger-soft);
        }

        /* Mobile Hamburger Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: 1px solid var(--color-border);
            border-radius: 6px;
            padding: 6px 10px;
            cursor: pointer;
            color: var(--color-text);
            font-size: 16px;
            align-items: center;
            justify-content: center;
            transition: background-color 150ms ease;
        }

        .mobile-menu-btn:hover {
            background-color: #F3F4F6;
        }

        .mobile-nav-panel {
            display: none;
            position: absolute;
            top: 64px;
            left: 0;
            width: 100%;
            background-color: var(--color-surface);
            border-bottom: 1px solid var(--color-border);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
            z-index: 50;
        }

        .mobile-nav-panel.is-open {
            display: block;
        }

        .mobile-nav-inner {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .mobile-nav-link {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--color-text-secondary);
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 6px;
        }

        .mobile-nav-link.active {
            color: var(--color-primary);
            background-color: var(--color-primary-soft);
            font-weight: 600;
        }

        .mobile-nav-divider {
            height: 1px;
            background-color: var(--color-border);
            margin: 6px 0;
        }

        .mobile-user-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 6px 14px;
        }

        /* Page Container */
        .main-content {
            flex: 1;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px;
        }

        /* Typography & Header */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 30px;
            font-weight: 700;
            line-height: 1.2;
            color: var(--color-text);
            letter-spacing: -0.015em;
        }

        .page-description {
            font-size: 14px;
            color: var(--color-text-secondary);
            line-height: 1.5;
            margin-top: 4px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            line-height: 1.3;
            color: var(--color-text);
            letter-spacing: -0.01em;
        }

        .section-link {
            font-size: 14px;
            font-weight: 500;
            color: var(--color-primary);
            text-decoration: none;
            transition: color 150ms ease;
        }

        .section-link:hover {
            color: var(--color-primary-hover);
            text-decoration: underline;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            height: 40px;
            padding: 0 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 150ms ease;
            white-space: nowrap;
            line-height: 1;
        }

        .btn-primary {
            background-color: var(--color-primary);
            color: #FFFFFF;
            border: 1px solid var(--color-primary);
        }

        .btn-primary:hover {
            background-color: var(--color-primary-hover);
            border-color: var(--color-primary-hover);
        }

        .btn-secondary {
            background-color: var(--color-surface);
            color: #374151;
            border: 1px solid var(--color-border-strong);
        }

        .btn-secondary:hover {
            background-color: #F7F8FA;
            border-color: #9CA3AF;
        }

        .btn-danger {
            background-color: var(--color-danger);
            color: #FFFFFF;
            border: 1px solid var(--color-danger);
        }

        .btn-danger:hover {
            background-color: var(--color-danger-hover);
            border-color: var(--color-danger-hover);
        }

        .btn-sm {
            height: 32px;
            padding: 0 12px;
            font-size: 13px;
            border-radius: 6px;
        }

        /* Action link button in tables */
        .btn-link-action {
            display: inline-flex;
            align-items: center;
            padding: 4px 8px;
            font-size: 13px;
            font-weight: 500;
            color: var(--color-text-secondary);
            text-decoration: none;
            border-radius: 4px;
            transition: all 150ms ease;
        }

        .btn-link-action:hover {
            color: var(--color-primary);
            background-color: var(--color-primary-soft);
        }

        .btn-link-danger {
            display: inline-flex;
            align-items: center;
            padding: 4px 8px;
            font-size: 13px;
            font-weight: 500;
            color: var(--color-danger);
            background: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 150ms ease;
        }

        .btn-link-danger:hover {
            color: #9B2C2C;
            background-color: var(--color-danger-soft);
        }

        /* Surface, Cards & Panels */
        .card, .panel {
            background-color: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
        }

        .panel {
            padding: 28px 32px;
        }

        /* Summary Cards */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .summary-card {
            background-color: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 20px 24px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
        }

        .summary-card-label {
            font-size: 14px;
            font-weight: 500;
            color: var(--color-text-secondary);
            margin-bottom: 8px;
        }

        .summary-card-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--color-text);
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        /* Forms */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .form-input, .form-select {
            width: 100%;
            height: 42px;
            padding: 0 14px;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            background-color: var(--color-surface);
            font-size: 14px;
            color: var(--color-text);
            outline: none;
            transition: border-color 150ms ease, box-shadow 150ms ease;
            font-family: inherit;
        }

        .form-input::placeholder {
            color: var(--color-text-muted);
        }

        .form-input:focus, .form-select:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(59, 111, 245, 0.12);
        }

        .form-input.is-invalid, .form-select.is-invalid {
            border-color: var(--color-danger);
        }

        .invalid-feedback {
            font-size: 13px;
            color: var(--color-danger);
            margin-top: 6px;
            line-height: 1.4;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
        }

        /* Tables & Lists */
        .table-card {
            background-color: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        .table th {
            background-color: #FAFAFA;
            color: var(--color-text-secondary);
            font-weight: 600;
            padding: 14px 16px;
            border-bottom: 1px solid var(--color-border);
            white-space: nowrap;
        }

        .table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--color-border);
            color: var(--color-text);
            vertical-align: middle;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr:hover td {
            background-color: #FAFBFC;
        }

        .table-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Category badge */
        .badge-category {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            background-color: var(--color-page);
            border: 1px solid var(--color-border);
            font-size: 13px;
            color: var(--color-text-secondary);
        }

        /* Empty state */
        .empty-state {
            padding: 56px 24px;
            text-align: center;
        }

        .empty-state-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: 6px;
        }

        .empty-state-desc {
            font-size: 14px;
            color: var(--color-text-secondary);
            margin-bottom: 20px;
        }

        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .alert-success {
            background-color: var(--color-success-soft);
            border: 1px solid var(--color-success-border);
            color: var(--color-success-text);
        }

        .alert-danger {
            background-color: var(--color-danger-soft);
            border: 1px solid var(--color-danger-border);
            color: var(--color-danger-text);
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(15, 23, 42, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 100;
            padding: 16px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 150ms ease;
        }

        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-dialog {
            background-color: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: 14px;
            width: 100%;
            max-width: 440px;
            padding: 28px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.1);
        }

        .modal-title {
            font-size: 18px;
            font-weight: 650;
            color: var(--color-text);
            margin-bottom: 8px;
        }

        .modal-body {
            font-size: 14px;
            color: var(--color-text-secondary);
            line-height: 1.5;
            margin-bottom: 24px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        /* Responsive Breakpoints */
        @media (max-width: 1024px) {
            .navbar-container {
                padding: 0 24px;
            }
            .main-content {
                padding: 24px;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                height: 60px;
            }

            .navbar-container {
                padding: 0 16px;
            }

            .desktop-nav {
                display: none !important;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .main-content {
                padding: 16px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
                gap: 12px;
                margin-bottom: 24px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                flex-direction: column;
                align-items: stretch;
            }

            .page-header .btn {
                width: 100%;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .form-actions .btn {
                width: 100%;
            }

            .modal-actions {
                flex-direction: column;
            }

            .modal-actions .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Global App Shell Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <a href="{{ route('dashboard') }}" class="navbar-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                        <path d="M6 6h10"></path>
                        <path d="M6 10h10"></path>
                    </svg>
                    <span>Perpustakaan</span>
                </a>

                <ul class="navbar-nav desktop-nav">
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('books.index') }}" class="nav-link {{ request()->routeIs('books*') ? 'active' : '' }}">
                            Buku
                        </a>
                    </li>
                </ul>
            </div>

            <div class="navbar-right desktop-nav">
                <span class="user-name">{{ Auth::user()->name ?? 'User' }}</span>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <button type="button" class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation" aria-expanded="false">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation Panel -->
        <div class="mobile-nav-panel" id="mobileNavPanel">
            <div class="mobile-nav-inner">
                <a href="{{ route('dashboard') }}" class="mobile-nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('books.index') }}" class="mobile-nav-link {{ request()->routeIs('books*') ? 'active' : '' }}">
                    Buku
                </a>
                <div class="mobile-nav-divider"></div>
                <div class="mobile-user-row">
                    <span class="user-name">{{ Auth::user()->name ?? 'User' }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        // Compact Mobile Navbar Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileNavPanel = document.getElementById('mobileNavPanel');

        if (mobileMenuBtn && mobileNavPanel) {
            mobileMenuBtn.addEventListener('click', function() {
                const isOpen = mobileNavPanel.classList.toggle('is-open');
                mobileMenuBtn.setAttribute('aria-expanded', isOpen);
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
