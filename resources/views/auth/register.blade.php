<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Gudang Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url('/build/images/dalemgudang.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px 0;
        }

        .register-container {
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.85);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .card-body {
            padding: 48px 40px 36px;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 24px;
        }

        .logo-section h1 {
            font-size: 24px;
            font-weight: 400;
            color: white;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .logo-section p {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 400;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-floating > .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 8px;
            height: 56px;
            padding: 16px;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .form-floating > label {
            color: rgba(255, 255, 255, 0.6);
            padding: 16px;
            font-size: 16px;
        }

        .form-floating > .form-control:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: #4285f4;
            box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.2);
            color: white;
        }

        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            color: #4285f4;
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            font-size: 12px;
            margin-top: 4px;
            color: #ff6b6b;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4285f4 0%, #1967d2 100%);
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            width: 100%;
            height: 48px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5294ff 0%, #2776e6 100%);
            box-shadow: 0 4px 12px rgba(66, 133, 244, 0.5);
            transform: translateY(-2px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .login-section {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-section p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 12px;
        }

        .btn-secondary {
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 500;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
            transform: translateY(-2px);
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            font-size: 18px;
            padding: 4px;
            z-index: 10;
            transition: color 0.2s ease;
        }

        .password-toggle:hover {
            color: white;
        }

        .form-floating.password-field {
            position: relative;
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 32px 24px;
            }

            .register-container {
                padding: 16px;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeIn 0.5s ease;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="card">
            <div class="card-body">
                <div class="logo-section">
                    <h1>Gudang Barang</h1>
                    <p>Buat akun baru Anda</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-floating">
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            placeholder="Name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus>
                        <label for="name">Nama Lengkap</label>
                        @error('name')
                            <div class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            placeholder="Email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email">
                        <label for="email">Alamat Email</label>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating password-field">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="Password"
                            required
                            autocomplete="new-password">
                        <label for="password">Kata Sandi</label>
                        <button type="button" class="password-toggle" onclick="togglePassword('password', 'toggleIcon1')">
                            <i class="bi bi-eye" id="toggleIcon1"></i>
                        </button>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating password-field">
                        <input id="password-confirm" type="password"
                            class="form-control"
                            name="password_confirmation"
                            placeholder="Confirm Password"
                            required
                            autocomplete="new-password">
                        <label for="password-confirm">Konfirmasi Kata Sandi</label>
                        <button type="button" class="password-toggle" onclick="togglePassword('password-confirm', 'toggleIcon2')">
                            <i class="bi bi-eye" id="toggleIcon2"></i>
                        </button>
                    </div>

                    <input type="hidden" name="role" value="user">

                    <button type="submit" class="btn btn-primary">
                        Daftar
                    </button>

                    <div class="login-section">
                        <p>Sudah punya akun?</p>
                        <a href="{{ route('login') }}" class="btn btn-secondary">
                            Masuk
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>

</html>
