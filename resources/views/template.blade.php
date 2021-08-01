<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('assets') }}/images/dian-logo.png" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>@yield('title')</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/app.css" />
        <link rel="stylesheet" href="{{ asset('assets') }}/css/font.css" />
        <link rel="stylesheet" href="{{ asset('assets') }}/css/datatables.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/css/buttons.dataTables.min.css">
        <!-- END: CSS Assets-->
        <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
    </head>
    <!-- END: Head -->
    @yield('body')

    @include('modalgantilogo')

    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('assets') }}/js/app.js"></script>
    <script>
        function closeNotification(){
            const notification = document.getElementById('notification');
            notification.classList.add('hidden');
        }
    </script>
    <!-- END: JS Assets-->
    
    <!-- BEGIN: Self Script-->
    @yield('script')
    <!-- END: Self Script-->
    
</html>