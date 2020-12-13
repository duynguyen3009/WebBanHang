<!DOCTYPE html>
<html lang="en">
<head>
    @include('news.elements.head')
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
            {{-- @include('news.elements.header-top') --}}
            @include('news.elements.header-middle')
            @include('news.elements.menu')
        </header>
        @yield('content')                            
        @include('news.elements.footer')

    </div>
    <div class="mobile-menu-overlay"></div>
    @include('news.elements.mobile')
    {{-- @include('news.elements.newsletter') --}}
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
    @include('news.elements.script')
</body>
</html>