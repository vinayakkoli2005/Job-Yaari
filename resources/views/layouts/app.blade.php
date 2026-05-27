<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Govt Job Updates, Admit Cards & Results') - JobYaari</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Premium Navbar */
        .navbar-custom {
            background-color: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand-custom {
            font-size: 1.75rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            text-decoration: none;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .navbar-brand-custom i {
            margin-right: 0.5rem;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link-custom {
            color: #94a3b8;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .nav-link-custom:hover {
            color: #38bdf8;
            background-color: rgba(56, 189, 248, 0.05);
        }

        .btn-admin-login {
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.1) 0%, rgba(99, 102, 241, 0.1) 100%);
            border: 1px solid rgba(99, 102, 241, 0.2);
            color: #cbd5e1;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-admin-login:hover {
            background: linear-gradient(135deg, #38bdf8 0%, #6366f1 100%);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
            transform: translateY(-1px);
        }

        /* Footer */
        .footer {
            background-color: #0b0f19;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding: 2.5rem 0;
            margin-top: auto;
            color: #64748b;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
            margin-bottom: 1rem;
            display: inline-block;
        }
        
        .footer-logo i {
            margin-right: 0.5rem;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .footer-links a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: #38bdf8;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand-custom" href="/">
                <i class="fa-solid fa-briefcase"></i>JobYaari
            </a>
            
            <div class="ms-auto">
                @if(session('admin_logged_in'))
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-admin-login me-2">
                        <i class="fa-solid fa-gauge-high me-2"></i>Admin Dashboard
                    </a>
                @else
                    <a href="{{ route('admin.login.form') }}" class="btn btn-admin-login">
                        <i class="fa-solid fa-user-shield me-2"></i>Admin Login
                    </a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="flex-grow-1">
        @yield('content')
    </div>

    <!-- Footer Area -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <div class="footer-logo">
                        <i class="fa-solid fa-briefcase"></i>JobYaari
                    </div>
                    <p class="mb-0" style="font-size: 0.9rem;">Your single portal for fast notifications on recruitment rally, exams, syllabus updates, admit cards & results.</p>
                </div>
                <div class="col-md-6 text-center text-md-end footer-links">
                    <p class="mb-0" style="font-size: 0.85rem;">
                        &copy; {{ date('Y') }} JobYaari. All rights reserved. Made with <i class="fa-solid fa-heart text-danger"></i> for Indian Job Aspirants.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>
