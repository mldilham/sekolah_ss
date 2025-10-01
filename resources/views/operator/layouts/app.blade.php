<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KitaSchool</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1030;
        background: #4e73df;
        color: #fff;
        height: 56px;
        display: flex;
        align-items: center;
        padding: 0 1rem;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 220px;
        padding-top: 1rem;
        background: linear-gradient(180deg, #33A1E0 0%, #2c2f54 100%);
        color: #fff;
        overflow-y: auto;
        transition: all 0.3s;
        z-index: 1030;
    }

    /* Toggle sidebar desktop */
    #sidebarDesktopToggle {
        display: none;
    }

    #sidebarDesktopToggle:checked ~ .sidebar {
        width: 70px;
    }

    #sidebarDesktopToggle:checked ~ .sidebar .sidebar-brand-text,
    #sidebarDesktopToggle:checked ~ .sidebar .sidebar-text {
        display: none;
    }

    #sidebarDesktopToggle:checked ~ .sidebar .nav-link i {
        margin-right: 0;
        text-align: center;
        width: 100%;
    }

    #sidebarDesktopToggle:checked ~ #main-content {
        margin-left: 70px;
    }

    .sidebar.collapsed {
        width: 70px;
    }

    .sidebar.collapsed .sidebar-brand-text,
    .sidebar.collapsed .sidebar-text {
        display: none;
    }

    .sidebar.collapsed .nav-link i {
        margin-right: 0;
        text-align: center;
        width: 100%;
    }

    .sidebar .nav-link {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        margin: 0.25rem 0;
        display: flex;
        align-items: center;
        transition: all 0.3s;
    }

    .sidebar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
        transform: translateX(5px);
    }

    .sidebar .nav-item.active .nav-link {
        background-color: rgba(255, 255, 255, 0.25);
        font-weight: 600;
        color: #fff;
    }

    .sidebar .nav-link i {
        margin-right: 10px;
        font-size: 1.1rem;
    }

    #main-content {
        margin-left: 220px;
        margin-top: 0;
        padding: 2rem;
        min-height: 100vh;
        transition: margin-left 0.3s;
    }

    .sidebar.collapsed ~ #main-content {
        margin-left: 70px;
    }

    .toggle-btn {
        position: fixed;
        top: 15px;
        left: 235px;
        z-index: 1040;
        background: linear-gradient(135deg, #33A1E0, #2c2f54);
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .sidebar.collapsed ~ .toggle-btn {
        left: 85px;
    }

    .toggle-btn:hover {
        background: linear-gradient(135deg, #2c2f54, #33A1E0);
        transform: scale(1.1);
    }

    .btn-logout {
        width: calc(100% - 3rem);
        margin: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        padding: 0.5rem;
    }

    /* Responsive untuk mobile */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            width: 250px;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        #main-content {
            margin-left: 0;
            padding: 1rem;
        }

        .sidebar.collapsed ~ #main-content,
        .sidebar.show ~ #main-content {
            margin-left: 0;
        }

        .toggle-btn {
            left: 15px;
            display: block !important;
        }

        .sidebar.collapsed ~ .toggle-btn,
        .sidebar.show ~ .toggle-btn {
            left: 15px;
        }

        .navbar {
            padding-left: 60px; /* Space for toggle button */
        }
    }

    /* Overlay untuk mobile */
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        z-index: 1029;
    }

    /* Checkbox untuk toggle sidebar */
    #sidebarToggle {
        display: none;
    }

    #sidebarToggle:checked ~ .sidebar {
        transform: translateX(0);
    }

    #sidebarToggle:checked ~ .sidebar-overlay {
        display: block;
    }

    @media (max-width: 768px) {
        .sidebar-overlay {
            display: none;
        }

        #sidebarToggle:checked ~ .sidebar-overlay {
            display: block;
        }
    }
</style>
</head>
<body>
    <div class="d-flex">
        @include('operator.layouts.sidebar')

        <main class="flex-grow-1" id="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>
