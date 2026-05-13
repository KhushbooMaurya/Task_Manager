<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap (optional but recommended) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
        }

        .login-card {
            max-width: 420px;
            width: 100%;
            border-radius: 14px;
        }
    </style>
</head>

<body>

    <div class="min-vh-100 d-flex align-items-center justify-content-center">

        <div class="card shadow-lg border-0 login-card">

            <div class="card-body p-4">

                <div class="text-center mb-4">
                    <h3 class="fw-bold">Welcome Back</h3>
                    <p class="text-muted small">Login to your account</p>
                </div>

                {{-- STATUS --}}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required
                            autofocus>

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>

                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- REMEMBER --}}
                    <div class="form-check mb-3">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember_me">

                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit" class="btn btn-primary w-100">
                        Login
                    </button>

                </form>

                {{-- FOOTER --}}
                <div class="text-center mt-3">
                    <p class="mb-1 text-muted small">Don’t have an account?</p>

                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">
                        Create Account
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
