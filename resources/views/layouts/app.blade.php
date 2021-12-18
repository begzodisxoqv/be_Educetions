<!DOCTYPE html>
<html lang="en">

        @include('site.classes.head')

    <body>
        @include('site.classes.header')

        @yield('content')
        @include('sweetalert::alert')

        @include('site.classes.script')
    </body>

</body>
</html>
