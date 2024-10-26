<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="blob-1"></div>
    <div class="blob-2"></div>
    <div class="blob-3"></div>
    <div class="d-flex w-100">
        <nav id="sidebar" class="p-3" style="min-width: 250px;">
            <ul class="nav flex-column mt-4">
                <li class="nav-item mb-2">
                    <a href="{{ route('hospitals.index') }}" class="nav-link text-body-secondary">Hospitals</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('patients.index') }}" class="nav-link text-body-secondary">Patients</a>
                </li>
            </ul>
            <div class="mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn logout-btn">Logout</button>
                </form>
            </div>
        </nav>

        <main class="py-4 flex-grow-1">
            <div class="container-fluid">
                <div class="container">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
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
                </div>
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
