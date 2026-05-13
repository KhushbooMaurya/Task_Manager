<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
        }

        .register-card {
            max-width: 450px;
            width: 100%;
            border-radius: 14px;
        }
    </style>
</head>

<body>

    <div class="min-vh-100 d-flex align-items-center justify-content-center">

        <div class="card shadow-lg border-0 register-card">

            <div class="card-body p-4">

                <div class="text-center mb-4">
                    <h3 class="fw-bold">Create Account</h3>
                    <p class="text-muted small">Sign up to get started</p>
                </div>

                {{-- VALIDATION ERRORS --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- NAME --}}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required
                            autofocus>
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit" class="btn btn-primary w-100">
                        Register
                    </button>

                </form>

                {{-- FOOTER --}}
                <div class="text-center mt-3">
                    <small class="text-muted">
                        Already registered?
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none">
                            Login here
                        </a>
                    </small>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
