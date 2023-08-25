<!DOCTYPE html>
<html lang="vi">

@include('layouts.head')

<body data-rsssl=1 class='tsdefaultlayout' itemscope='itemscope' itemtype='http://schema.org/WebSite'>
<div id='shadow'></div>
<div class="mainholder">
    <div class="th">
        <div class="centernav bound">
            <div class="shme"><i class="fa fa-bars" aria-hidden="true"></i></div>
            <header class="mainheader" role="banner" itemscope itemtype="http://schema.org/WPHeader">
                <div class="site-branding logox">
                    <h1 class="logos">
                        <a href="/" itemprop="url" title="Xem Phim Mới | Phim HD | Phim VietSub | Thuyết Minh Hay Nhất">
                            Xem Phim Mới
                        </a>
                    </h1>
                </div>
            </header>
            <div class="searchx">
                <meta itemprop="url" content="https://www.xemphim.sbs"/>
                <form method="GET" action="/" id="form" itemprop="potentialAction" itemscope
                      itemtype="http://schema.org/SearchAction">
                    <meta itemprop="target" content="https://www.xemphim.sbs/?search={search}"/>
                    <input id="s" name="search" itemprop="query-input" class="search-live" type="text"
                           placeholder="Tìm kiếm phim..." value=""/>
                    <button type="button" id="submit-search" onclick="$(this).parent().submit()"
                            aria-label="Tìm kiếm phim">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div id="thememode"><label class="switch"> <input type="checkbox" aria-label="Chuyển đổi mode"> <span
                        class="slider round"></span>
                </label></div>
        </div>
    </div>
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
