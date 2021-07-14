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
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    @yield('body')

    <!-- BEGIN: JS Assets-->
    {{-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> --}}
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