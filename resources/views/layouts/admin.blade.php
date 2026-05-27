<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - JobYaari</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
            margin: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background-color: #1e293b;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 1.75rem 1.5rem;
            font-size: 1.5rem;
            font-weight: 800;
            color: #f8fafc;
            display: flex;
            align-items: center;
            text-decoration: none;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .sidebar-brand i {
            margin-right: 0.75rem;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
            padding: 0 1rem;
        }

        .sidebar-nav-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.25rem;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-nav-link:hover {
            color: #38bdf8;
            background-color: rgba(56, 189, 248, 0.08);
        }

        .sidebar-nav-link.active {
            color: #f8fafc;
            background: linear-gradient(135deg, #38bdf8 0%, #6366f1 100%);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.25);
        }

        .sidebar-nav-link i {
            width: 24px;
            font-size: 1.1rem;
            margin-right: 0.75rem;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #818cf8 0%, #c084fc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 1.1rem;
        }

        .admin-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: #e2e8f0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 140px;
        }

        .admin-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 260px;
            flex-grow: 1;
            padding: 2.5rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #0f172a;
            transition: all 0.3s ease;
        }

        .header-title {
            font-weight: 800;
            font-size: 2rem;
            color: #f8fafc;
            margin-bottom: 0.25rem;
        }

        .header-subtitle {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }
            .sidebar-toggle {
                display: flex !important;
            }
        }

        .sidebar-toggle {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #38bdf8 0%, #6366f1 100%);
            color: white;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            z-index: 1010;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Sidebar Toggle Button for Mobile -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="/" class="sidebar-brand">
            <i class="fa-solid fa-briefcase"></i>JobYaari
        </a>
        
        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('admin.blogs.index') }}" class="sidebar-nav-link {{ Route::is('admin.blogs.index') || Route::is('admin.blogs.edit') ? 'active' : '' }}">
                    <i class="fa-solid fa-newspaper"></i>Manage Blogs
                </a>
            </li>
            <li>
                <a href="{{ route('admin.blogs.create') }}" class="sidebar-nav-link {{ Route::is('admin.blogs.create') ? 'active' : '' }}">
                    <i class="fa-solid fa-circle-plus"></i>Add New Blog
                </a>
            </li>
            <li>
                <a href="/" class="sidebar-nav-link" target="_blank">
                    <i class="fa-solid fa-globe"></i>View Live Site
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <div class="admin-profile">
                <div class="admin-avatar">
                    {{ substr(session('admin_name', 'A'), 0, 1) }}
                </div>
                <div>
                    <div class="admin-name">{{ session('admin_name', 'Administrator') }}</div>
                    <div class="admin-role">Super Admin</div>
                </div>
            </div>
            
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 btn-sm rounded-3">
                    <i class="fa-solid fa-right-from-bracket me-2"></i>Sign Out
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid p-0">
            @if(session('success'))
                <div class="alert alert-success border-0 bg-opacity-10 text-success rounded-4 p-3 mb-4 d-flex align-items-center">
                    <i class="fa-solid fa-circle-check fs-5 me-3"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger border-0 bg-opacity-10 text-danger rounded-4 p-3 mb-4 d-flex align-items-center">
                    <i class="fa-solid fa-circle-exclamation fs-5 me-3"></i>
                    <div>{{ $errors->first() }}</div>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle Sidebar on mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                const icon = sidebarToggle.querySelector('i');
                if (sidebar.classList.contains('active')) {
                    icon.className = 'fa-solid fa-xmark';
                } else {
                    icon.className = 'fa-solid fa-bars';
                }
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
