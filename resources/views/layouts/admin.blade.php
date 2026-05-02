<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">
    <style>
        .app-main {
            min-height: calc(100vh - 114px);
        }
        .brand-link {
            text-decoration: none;
        }
         .badge-soft-success {
            background-color: #28a745 !important;
            color: #fff !important;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 4px;
            display: inline-block;
            min-width: 80px;
            text-align: center;
        }

        .badge-soft-danger {
            background-color: #dc3545 !important;
            color: #fff !important;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 4px;
            display: inline-block;
            min-width: 80px;
            text-align: center;
        }

        .badge-soft-primary {
            background-color: #007bff !important;
            color: #fff !important;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 4px;
            display: inline-block;
            min-width: 80px;
            text-align: center;
        }

        .badge-soft-warning {
            background-color: #ffc107 !important;
            color: #212529 !important;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 4px;
            display: inline-block;
            min-width: 80px;
            text-align: center;
        }
    </style>

    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex align-items-center me-3">
                    <span class="text-muted small">
                        {{ auth()->user()->name }}
                    </span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="fas fa-power-off me-1"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <span class="brand-text fw-light"> Admin</span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-gauge-high"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">MANAGEMENT</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Pages</p>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Modules <span class="badge text-bg-primary ms-2">Soon</span></p>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-gear"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">@yield('page_title', 'Dashboard')</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Laravel 11 Admin</div>
        <strong>&copy; {{ date('Y') }}  Backend</strong>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>

@stack('scripts')
</body>
</html>