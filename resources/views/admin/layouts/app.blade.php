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
        top: 56px;
        left: 0;
        bottom: 0;
        width: 220px;
        padding-top: 1rem;
        background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
        color: #fff;
        overflow-y: auto;
        transition: all 0.3s;
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
        margin-top: 56px;
        padding: 2rem;
        min-height: calc(100vh - 56px);
    }


    .btn-logout {
        width: calc(100% - 3rem);
        margin: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        padding: 0.5rem;
    }
</style>
</head>
<body>
    <div class="d-flex">

        @include('admin.layouts.sidebar')


        <main class="flex-grow-1" id="main-content">
            @yield('content')
        </main>
    </div>

    @include('admin.layouts.footer')

</body>
</html>

