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
                <form method="GET" action="/" id="form" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
                    <input id="s" name="search" itemprop="query-input" class="search-live" type="text"
                           placeholder="Tìm kiếm phim..." value="" />
                    <button type="button" id="submit-search" onclick="$(this).parent().submit()" aria-label="Tìm kiếm phim">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <nav id="main-menu" class="mm">
        @include('layouts.nav')
    </nav>
    <div id="content">
        <div class="wrapper">
            <div class="notf"> <img src="{{asset('img/404.png')}}"></div>
        </div>
    </div>
    <div id="footer">
        <footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter"
                role="contentinfo">
            <div class="footermenu">
                <div class="menu-foot-container">
                    <ul id="menu-foot" class="menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                href="mailto:kienhs.tech@gmail.com" itemprop="url">DMCA</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                href="mailto:kienhs.tech@gmail.com" itemprop="url">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="footercopyright">
                <div class="footer-az">
                    <span class="ftaz">{{env('APP_NAME')}}</span>
                    <span class="size-s">Xem phim miễn phí</span>
                    <div class="clear"></div>
                </div>
                <div class="copyright">
                    <div class="txt">
                        <p>This site <i>{{env('APP_NAME')}}</i> does not store any files on its server. All contents
                            are provided by non-affiliated third parties.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
