<!DOCTYPE html>
<html>
@include('website.layout.head')
<body>
    <div class="body_wrapper">
        @include('website.layout.navbar')
        @yield('content')
        @include('website.layout.footer')
    </div>
    @include('website.layout.script')
</body>

</html>
