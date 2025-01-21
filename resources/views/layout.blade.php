<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Film CRUD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="bg-secondary vh-100 p-3" style="width: 200px;">
        <h3 class="text-white">Film CRUD</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('films.index') }}" class="nav-link text-white">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('top-picks') }}" class="nav-link text-white">Top Picks</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('recommendations') }}" class="nav-link text-white">Recommendations</a>
            </li>
            <li class="nav-item mt-3">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm w-100">Login</a>
                @else
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm w-100">Logout</button>
                    </form>
                @endguest
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid p-4" style="margin-left: 200px;">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
