<!DOCTYPE html>
<html lang="vi">

@include('layouts.head')

<body data-rsssl=1 class='tsdefaultlayout' itemscope='itemscope'>
<div id='shadow'></div>
<div class="mainholder">
    @include('layouts.header')
    <nav id="main-menu" class="mm">
        @include('layouts.nav')
    </nav>
    <div id="content">
        <div class="wrapper">
            <div class="pd-expand"></div>
            @yield('content')
            @include('layouts.sidebar')
            <div class="clear"></div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
