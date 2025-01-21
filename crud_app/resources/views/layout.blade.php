<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Film CRUD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px; /* Fixed width for sidebar */
            background-color: #343a40;
            padding-top: 20px;
            height: 100vh; /* Full height */
            overflow-y: auto; /* Allows scrolling if content exceeds screen height */
        }

        .sidebar ul {
            list-style-type: none;
            padding-left: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        /* Main content area */
        .main-content {
            margin-left: 200px; /* Make room for sidebar */
            padding: 20px;
            width: calc(100% - 200px); /* Ensure main content fills remaining space */
            min-height: 100vh; /* Ensure content area fills the screen */
        }

        /* Body and container padding */
        body {
            margin: 0;
            padding: 0;
            height: 100vh; /* Ensure the body covers the full viewport height */
        }

        .container {
            padding: 20px;
        }
    </style>
</head>
<body class="bg-dark text-white">

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar">
        <h3 class="text-white">Film CRUD</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-white">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('top-picks') }}" class="nav-link text-white">Top Picks</a>
            </li>
            <li class="nav-item">
                @auth
                    <a href="{{ route('recommendations', ['userId' => auth()->id()]) }}" class="nav-link text-white">Recommendations</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link text-white">Recommendations (Login Required)</a>
                @endauth
            </li>
            <!-- Show Films link only for admin -->
            @auth
                @if (auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a href="{{ route('films.index') }}" class="nav-link text-white">Films</a>
                    </li>
                @endif
            @endauth
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
    <div class="main-content">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
