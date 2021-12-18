<!DOCTYPE html>
<html lang="">
<head>
    <base href="public/">
    @include('adminmets.classes.head')
</head>
<body>
<div class="app-admin-wrap layout-sidebar-large">
@include('adminmets.classes.header')
@include('adminmets.classes.sidebar')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
    @yield('meeting')
    @include('adminmets.classes.footer')
    </div>
    <script src="{{ mix('js/admin.js') }}"></script>
    @yield('script')
    @include('sweetalert::alert')

</div>
</body>
</html>