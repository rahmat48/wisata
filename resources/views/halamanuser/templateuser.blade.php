<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home User</title>
        {{-- Logo Website --}}
        <link rel="icon" type="image/x-icon" href="{{asset('/homeuser/assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{asset('/homeuser/css/styles.css')}}">
        @include('TemplateAdmin.script')
    </head>
    <body id="page-top">
        <!-- Navbar-->
        @include('sweetalert::alert')
        @include('halamanuser.navbar')
        {{-- end of navbar --}}

        {{-- konten --}}
        @yield('kontenuser')    
        {{-- end of konten --}}

        <!-- Footer-->
        @include('halamanuser.footer')
        {{-- end of navbar --}}

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('/homeuser/js/scripts.js')}}"></script>
    </body>
</html>
