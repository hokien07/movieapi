<div class="th">
    <div class="centernav bound">
        <div class="shme"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <header class="mainheader" role="banner" itemscope>
            <div class="site-branding logox">
                <h1 class="logos">
                    <a href="{{route('home')}}" itemprop="url" title="{{isset($title) ?  $title : config()->get('seo.default_title')}}">{{env("APP_NAME")}}</a>
                </h1>
            </div>
        </header>
        <div class="searchx">
            <form method="GET" action="{{route('search')}}" id="form">
                <input id="s" name="search" itemprop="query-input" class="search-live" type="text" placeholder="Tìm kiếm phim..." value="{{request()->input('search')}}"/>
                <button type="button" id="submit-search" onclick="$(this).parent().submit()"
                        aria-label="Tìm kiếm phim">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
</div>
