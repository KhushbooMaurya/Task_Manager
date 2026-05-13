<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Task Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand"
           href="{{ route('tasks.index') }}">

            Task Manager

        </a>

        <div class="d-flex">

            @auth

                <span class="text-white me-3 mt-2">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Logout
                    </button>

                </form>

            @endauth

        </div>

    </div>

</nav>

<div class="container mt-4">

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    @yield('content')

</div>

</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@yield('scripts')
</html>