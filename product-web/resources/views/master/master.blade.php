<!DOCTYPE html>
<html lang="en">
@include('master.head')

<body>
    @include('master.navbar')
    @yield('content')
    @include('master.js')
</body>

</html>
