<!DOCTYPE html>
<html lang="en">

        @include('meetings.classes.head')

    <body>
        @include('meetings.classes.header')

        @yield('meetings')
        @include('sweetalert::alert')

        @include('meetings.classes.script')
    </body>

</body>
</html>
