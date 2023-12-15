<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <title>Demo</title>
    <link rel="icon" type="image/x-icon" href="#" />
    @vite('resources/sass/app.scss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('partial.top-navbar')
        @include('partial.asidebar')
        @yield('content')
        @include('partial.footer')
    </div>

    <script> 
        var base_url = "{{ url('admin/') }}";
    </script>
    @vite('resources/js/app.js')
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables.min.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" defer></script>
    <script src="{{ asset('js/select2.min.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
{{-- http://127.0.0.1:8000/admin/report/get-report?start_date=2023-08-17&end_date=2023-08-17 --}}
