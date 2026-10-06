<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Perpustakaan</title>
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
            --color-danger: #C94A4A;
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
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            -webkit-font-smoothing: antialiased;
        }

        .login-card {
            background-color: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
            width: 100%;
            max-width: 880px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
        }

        /* Left Info Panel (Editorial & Tenang) */
        .info-panel {
            background-color: #FAFAFC;
            border-right: 1px solid var(--color-border);
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            font-weight: 700;
            color: var(--color-text);
            letter-spacing: -0.01em;
        }

        .brand-icon {
            width: 22px;
            height: 22px;
            color: var(--color-primary);
        }

        .info-body {
            margin: 40px 0;
        }

        .info-heading {
            font-size: 24px;
            font-weight: 650;
            line-height: 1.3;
            color: var(--color-text);
            margin-bottom: 12px;
            letter-spacing: -0.01em;
        }

        .info-text {
            font-size: 14px;
            line-height: 1.6;
            color: var(--color-text-secondary);
        }

        .info-divider {
            height: 1px;
            background-color: var(--color-border);
            margin: 20px 0;
        }

        .info-caption {
            font-size: 13px;
            color: var(--color-text-muted);
            line-height: 1.5;
        }

        /* Right Form Panel */
        .form-panel {
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-heading {
            font-size: 24px;
            font-weight: 650;
            color: var(--color-text);
            line-height: 1.25;
            margin-bottom: 6px;
            letter-spacing: -0.01em;
        }

        .form-subheading {
            font-size: 14px;
            color: var(--color-text-secondary);
            margin-bottom: 24px;
        }

        .alert-error {
            background-color: var(--color-danger-soft);
            border: 1px solid var(--color-danger-border);
            color: var(--color-danger-text);
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 14px;
            line-height: 1.4;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .form-input {
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

        .form-input:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(59, 111, 245, 0.12);
        }

        .form-input.is-invalid {
            border-color: var(--color-danger);
        }

        .form-input::placeholder {
            color: var(--color-text-muted);
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 42px;
            margin-top: 6px;
            background-color: var(--color-primary);
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 600;
            border: 1px solid var(--color-primary);
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 150ms ease, border-color 150ms ease;
            font-family: inherit;
        }

        .btn-submit:hover {
            background-color: var(--color-primary-hover);
            border-color: var(--color-primary-hover);
        }

        .btn-submit:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
        }

        /* Responsive Mobile Layout */
        @media (max-width: 768px) {
            .login-card {
                grid-template-columns: 1fr;
                max-width: 440px;
            }

            .info-panel {
                border-right: none;
                border-bottom: 1px solid var(--color-border);
                padding: 28px 24px;
            }

            .info-body {
                margin: 16px 0;
            }

            .info-heading {
                font-size: 20px;
            }

            .form-panel {
                padding: 32px 24px;
            }

            .form-heading {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <!-- Area Informasi (Left Panel) -->
        <div class="info-panel">
            <div class="brand">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                    <path d="M6 6h10"></path>
                    <path d="M6 10h10"></path>
                </svg>
                <span>Perpustakaan</span>
            </div>

            <div class="info-body">
                <h1 class="info-heading">Kelola data buku dengan rapi dan mudah.</h1>
                <p class="info-text">Sistem pengelolaan data buku perpustakaan untuk memantau koleksi, kategori, dan informasi buku secara terstruktur.</p>
                <div class="info-divider"></div>
                <p class="info-caption">Sistem pengelolaan data buku</p>
            </div>

            <div>
                <!-- Spacer -->
            </div>
        </div>

        <!-- Area Form Login (Right Panel) -->
        <div class="form-panel">
            <h2 class="form-heading">Selamat datang kembali</h2>
            <p class="form-subheading">Masuk untuk melanjutkan ke aplikasi.</p>

            @if ($errors->any())
                <div class="alert-error" role="alert">
                    Email atau password tidak valid.
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" novalidate>
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        required
                        autofocus
                        autocomplete="email"
                    >
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    >
                </div>

                <button type="submit" class="btn-submit">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</body>
</html>
