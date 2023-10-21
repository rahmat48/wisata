<!DOCTYPE html>
<html lang="en">

<head>
    <title>HALAMAN ADMIN</title>
    @include('TemplateAdmin.head')
    
</head>

<body id="page-top">
    @include('sweetalert::alert')
    <link rel="stylesheet" href="{{asset('/fontawesome/css/all.min.css')}}">
    <!-- Page Wrapper -->
    <div id="wrapper">
    
        <!-- Sidebar -->
       @include('TemplateAdmin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Navbar -->
                @include('TemplateAdmin.navbar')
                <!-- End of Navbar -->


                @yield('content')
                <!-- Begin Page Content -->
                

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('TemplateAdmin.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('TemplateAdmin.script')
</body>

</html>