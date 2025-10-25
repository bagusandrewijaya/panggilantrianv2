@if(Route::currentRouteName( ) != 'auth' )
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS UMMI - Telemedicine Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

 <livewire:components.headers>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
         <livewire:components.sidebars>
            @endif
    <!-- Spacer -->
    <div class="d-block" role="separator" aria-hidden="true" style="height:var(--app-spacer,24px);"></div>

    <style>
    :root{--app-spacer:24px}
    @media (min-width:768px){:root{--app-spacer:32px}}
    @media (min-width:1200px){:root{--app-spacer:40px}}
    </style>
       <div style="padding: 16px;">
         {{ $slot }}
       </div>
    </div>
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth <= 992) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>