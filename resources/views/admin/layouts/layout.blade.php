<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    @include('admin.layouts.header')
    @yield('page_css')
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    @include('admin.layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden ">
        @include('admin.layouts.navbar')


        @yield('content')

    </main>

    @include('admin.layouts.scripts')
    @yield('page_js')
</body>

</html>
