
<!DOCTYPE html>
<html lang="vi">

@include('layouts.head')
<body data-rsssl=1 class='tsdefaultlayout' itemscope='itemscope' itemtype='http://schema.org/WebSite'>
<div id='shadow'></div>
<div class="mainholder">
    @include('layouts.header')
    <nav id="main-menu" class="mm">
        @include('layouts.nav')
    </nav>
    <div id="content">
        <div class="wrapper">
            <div class="pd-expand"></div>
            <div class="postbody">
                <article id="post-{{$movie->server_id}}" class="post-{{$movie->server_id}} hentry" itemscope="itemscope"
                         itemtype="http://schema.org/Episode">
                    <div class="ts-breadcrumb bixbox">
                        <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="{{route('home')}}"><span itemprop="name">Xem phim</span></a>
                                <meta itemprop="position" content="1">
                            </li>
                            ›
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="{{route('movie', $movie->slug)}}"><span itemprop="name">{{ $movie->name}}</span></a>
                                <meta itemprop="position" content="2">
                            </li>
                            ›
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <span itemprop="name">Tập 1</span>
                                <meta itemprop="position" content="3">
                            </li>
                        </ol>
                    </div>

                    <div class="megavid">
                        <div class="mvelement">
                            <div class="item meta">
                                <div class="tb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                    <img src="{{ $movie->thumb_url}}" data-src="{{ $movie->thumb_url}}"
                                         decoding="async" class="ts-post-image wp-post-image attachment-medium size-medium" width="169"
                                         height="300" />
                                    <meta itemprop="url"
                                          content="{{ $movie->thumb_url}}">
                                    <meta itemprop="width" content="190">
                                    <meta itemprop="height" content="260">
                                </div>
                                <div class="lm">
                                    <h1 class="entry-title" itemprop="name">{{ $movie->name}}</h1>
                                    <div class="box-rating" hidden>
                                        <div class="rate-title">
                                            <span class="rate-lable"></span>
                                        </div>
                                        <div id="div_average" style="">
                                        <span class="average" id="average" itemprop="ratingValue">8.0</span>điểm / <span id="rate_count" itemprop="reviewCount">1</span> lượt đánh giá
                                        </div>
                                        <div id="star" data-score="8.0"
                                             style="cursor: pointer;">
                                        </div>
                                        <div>
                                            <span id="hint"></span>
                                            <meta itemprop="bestRating" content="10" />
                                            <meta itemprop="worstRating" content="1" />
                                            <meta itemprop="ratingValue" content="8.0" />
                                            <meta itemprop="ratingCount" content="1" />
                                        </div>
                                    </div>
                                    <span class="epx">
                                        <span class="lg">{{$movie->lang}}</span>
                                    </span>
                                    <span class="year">
                                        <i class="status Hard Sub">{{$movie->lang}}</i>
                                        Updated on <span class="updated">{{$movie->updated_at}}</span> · <span id="ts-ep-view">{{$movie->view}} lượt xem</span></span>
                                </div>
                                <div class="sosmed" hidden><a
                                        href="https://www.facebook.com/sharer/sharer.php?u=https://www.xemphim.sbs/phim/vao-cuoi-dem&t=Vào Cuối Đêm"
                                        aria-label="Share on Facebook"><span class="fab fa-facebook-f" aria-hidden="true"></span></a> <a
                                        href="https://www.twitter.com/intent/tweet?url=https://www.xemphim.sbs/phim/vao-cuoi-dem&text=Vào Cuối Đêm"
                                        aria-label="Share on Twitter"><span class="fab fa-twitter" aria-hidden="true"></span></a> <a
                                        href="whatsapp://send?text=Vào Cuối Đêm https://www.xemphim.sbs/phim/vao-cuoi-dem"
                                        aria-label="Share on Whatsapp"><span class="fab fa-whatsapp" aria-hidden="true"></span></a>
                                </div>
                            </div>

                            <div class="video-content">
                                <div class="lowvid">
                                    <div class="media-player" id="pembed">
                                        <p style="text-align: center;">Đang tải, đợi tí nhé ...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item video-nav">
                                <div class="mobius">
                                    <div class="iconx">
                                        <div class="icol report">
                                            <i class="fa fa-bug"></i>
                                            <span>Báo Lỗi</span>
                                        </div>
                                        <div class="icol expand">
                                            <i class="fa fa-expand" aria-hidden="true"></i>
                                            <span>Expand</span>
                                        </div>
                                        <div class="icol light">
                                            <i class="far fa-lightbulb"></i>
                                            <span>Turn Off Light</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="change-server">
                        <center>
                            <ul class="server-list">
                                <li class="backup-server"> <span class="server-title">Đổi Nguồn Phát</span>
                                    <ul class="list-episode">
                                        <li class="episode">
                                            @foreach($movie->episodes as $episode)
                                            <a data-id="{{$episode->id}}" data-link="{{$episode->link_m3u8}}"
                                               data-type="m3u8" onclick="chooseStreamingServer(this)"
                                               class="streaming-server btn-link-backup btn-episode black episode-link">{{$episode->server->name}}</a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </center>
                    </div>
                    <div id="mobilepisode"></div>
                    <div class="single-info bixbox">
                        <div class="thumb">
                            <img data-type="lazy" src="{{$movie->thumb_url}}"
                                 data-src="{{$movie->thumb_url}}"
                                 decoding="async" class="ts-post-image wp-post-image attachment-medium size-medium" itemprop="image"
                                 title="{{$movie->name}}" alt="{{$movie->name}}" width="169" height="300" />
                        </div>
                        <div class="infox">
                            <h1 class="entry-title" itemprop="name">{{$movie->name}}</h1>
                            <div class="ninfo">
                                <span class="alter">Tên khác: {{$movie->origin_name}}</span>
                                <div class="info-content">
                                    <div class="spe">
                                    <span>
                                        <b>Status:</b> {{$movie->status}}
                                    </span>
                                        <span class="split">
                                        <b>Năm phát hành:</b> {{$movie->year}}
                                    </span>
                                        <span>
                                        <b>Thời lượng:</b> {{$movie->time}}
                                    </span>
                                        <span>
                                        <b>Quốc gia:</b>
                                        @foreach($movie->countries as $country)
                                                <a href="{{route('country', $country->slug)}}" title="Phim {{$country->name}}" rel="tag">{{$country->name}}</a>{{$loop->last ? "" : ","}}
                                            @endforeach
                                    </span>
                                        <span><b>Định dạng:</b> {{getMovieType($movie->type)}} </span>
                                        <span><b>Số tập:</b> {{getEpxStatus($movie->status)}} </span>
                                        <span class="split">
                                    <b>Đạo diễn:</b>
                                        @foreach($movie->directors as $director)
                                                <a href="{{route('director', $director->id)}}"
                                                   title="Đạo diễn {{$director->name}}" rel="tag">{{$director->name}}</a>{{$loop->last ? "" : ","}}
                                            @endforeach
                                </span>
                                        <span class="split">
                                    <b>Diễn viên:</b>
                                         @foreach($movie->actors as $actor)
                                                <a href="{{route('actor', $actor->id)}}" title="diễn viên {{$actor->name}}" rel="
                                            tag"> {{$actor->name}}</a>{{$loop->last ? "" : ","}}
                                            @endforeach
                                </span>
                                        <span class="split">
                                    <b>Chất lượng:</b>{{$movie->quality}}
                                </span>
                                    </div>
                                    <div class="genxed">
                                        @foreach($movie->categories as $cat)
                                            <a href="{{route('category', $cat->slug)}}" title="Phim {{$cat->name}}" rel="tag">{{$cat->name}}</a>
                                        @endforeach
                                    </div>
                                    <div class="desc">{!! $movie->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bixbox">
                        <div class="releases"><h3><span>Bình luận</span></h3></div>
                        <div class="cmt commentx">
                            <div class="box-comment" id="tabs-facebook" style="background: linear-gradient(to right, #ffff, #ffff);">
                                <div class="fb-comments" data-href="https://www.xemphim.sbs/phim/vao-cuoi-dem" data-width="100%"
                                     data-numposts="10" data-order-by="reverse_time" data-colorscheme="light">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bixbox">
                        <div class="releases"><h3>Phim cùng thể loại</h3></div>
                        <div class="series-gen">
                            <div class="listupd">
                                <div id="series-390" class="tab-pane active">
                                    @foreach($movies as $movie)
                                        <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                                            <div class="bsx">
                                                <a href="{{route('movie', $movie->slug)}}" itemprop="url"
                                                   title="{{$movie->name}} ({{$movie->origin_name}}) [{{$movie->year}}]"
                                                   class="tip" rel="{{$movie->server_id}}">
                                                    <div class="limit">
                                                        <div class="status Completed">{{getEpxStatus($movie->status)}}</div>
                                                        <div class="typez Drama">{{getMovieType($movie->type)}}</div>
                                                        <div class="ply"><i class="far fa-play-circle"></i></div>
                                                        <div class="bt"><span class="epx">{{getMovieType($movie->type)}}</span> <span
                                                                class="sb Soft Sub">{{$movie->lang}}</span></div>
                                                        <img data-type="lazy"
                                                             src="{{$movie->thumb_url}}"
                                                             data-src="{{$movie->thumb_url}}"
                                                             class="ts-post-image wp-post-image attachment-medium size-medium"
                                                             decoding="async" itemprop="image"
                                                             title="{{$movie->name}} ({{$movie->origin_name}}) [{{$movie->year}}]"
                                                             alt="{{$movie->name}} ({{$movie->origin_name}}) [{{$movie->year}}]"
                                                             width="240" height="300"/>
                                                    </div>
                                                    <div class="ttt">
                                                        <div class="tt">{{$movie->name}}
                                                            <h2 itemprop="headline">{{$movie->origin_name}} {{getEpxStatus($movie->type)}}</h2>
                                                        </div>
                                                        <div class="timeago">{{$movie->origin_name}}</div>
                                                    </div>
                                                </a></div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div id="sidebar">
                <div id="mainepisode">
                    <div id="singlepisode">
                        <div class="headlist">
                            <div class="thumb">
                                <a href="{{route('movie', $mMovie->slug)}}">
                                    <img data-type="lazy" src="{{$mMovie->thumb_url}}" data-src="{{$mMovie->thumb_url}}"
                                         decoding="async" class="ts-post-image wp-post-image attachment-medium size-medium"
                                         title="{{$mMovie->name}}" alt="{{$mMovie->name}}" width="203" height="300">
                                </a>
                            </div>

                            <div class="det">
                                <h3><a href="{{route('movie', $mMovie->slug)}}">{{$mMovie->name}}</a></h3>
                                <span><i>Đang xem tập 1</i> -  Vietsub #1</span>
                            </div>

                            <div class="search-ep">
                                <input type="text" class="search-ep-text" id="search-ep-text-0" value="" placeholder="Tìm tập nhanh...">
                                <button type="button" class="search-ep-eraser" id="search-ep-eraser-0" style="display: none; top: 4px">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        @dd($mMovie->episodes)
                        <div class="episodelist" id="episodelist-0">
                            <ul>
                                <li id="search-ep-no-result-0" style="display:none; text-align: center; padding: 10px 5px">Không thấy tập này</li>
                                @foreach($mMovie->episodes()->groupBy('name') as $episode)
                                <li data-server="0" data-name="{{$episode->name}}" data-id="{{$episode->id}}" >
                                    <a href="{{route('movie.view', $mMovie->slug)}}" itemprop="url" title="{{$mMovie->name}} Tập {{$episode->name}}">
                                        <div class="thumbnel">
                                            <img data-type="lazy" src="{{$mMovie->thumb_url}}"
                                                 data-src="{{$mMovie->thumb_url}}"
                                                 decoding="async" class="ts-post-image wp-post-image attachment-post-thumbnail size-post-thumbnail"
                                                 itemprop="image" title="{{$mMovie->name}} Tập {{$episode->name}}"
                                                 alt="{{$mMovie->name}} Tập {{$episode->name}}" width="900" height="1332">
                                            <div class="nowplay">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                        </div>
                                        <div class="playinfo">
                                            <h4>{{$mMovie->name}} Tập {{$episode->name}}</h4>
                                            <span class="epname">Tập {{$episode->name}}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="releases">
                        <h3>Mới cập nhật</h3>
                    </div>
                   <div class='ongoingseries'>
                        <ul>
                            @foreach($phimSapChieu as $phim)
                                <li>
                                    <a href="{{route('movie', $phim->slug)}}"
                                       title="{{$phim->name}}">
                                        <span class="l"><i class="fas fa-angle-right"></i>{{$phim->name}}</span>
                                        <span class="r"> {{$phim->year}} </span>
                                    </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="section">
                    <div class="releases">
                        <h3><span>Top phim lẻ</span></h3>
                    </div>
                    <div class='serieslist'>
                        <ul>
                            @foreach($phimLe as $phim)
                                <li>
                                    <div class="imgseries">
                                        <a class="series" href="{{route('movie', $phim->slug)}}" rel="">
                                            <img data-type="lazy" src="{{$phim->thumb_url}}" data-src="{{$phim->thumb_url}}"
                                                 decoding="async"
                                                 class="ts-post-image wp-post-image attachment-medium size-medium"
                                                 itemprop="image"
                                                 title="{{$phim->name}} ({{$phim->year}})"
                                                 alt="{{$phim->name}} ({{$phim->year}})"
                                                 width="200" height="300"/>
                                        </a>
                                    </div>
                                    <div class="leftseries">
                                        <h4><a class="series" href="{{route('movie', $phim->slug)}}"
                                               rel="{{$phim->server_id}}">{{$phim->name}} ({{$phim->year}}) </a>
                                        </h4>
                                        <span>{{$phim->origin_name}} ({{$phim->year}})</span>
                                        <span><b>Thể loại</b>:
                               @foreach($phim->categories as $cat)
                                                <a href="{{route('category', $cat->slug)}}" title="{{$cat->name}}" rel="tag">{{$cat->name}}</a>{{$loop->last ? "" : ","}}
                                            @endforeach
                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="section">
                    <div class="releases">
                        <h3><span>Top phim bộ</span></h3>
                    </div>
                    <div class='serieslist'>
                        <ul>
                            @foreach($phimBo as $phim)
                                <li>
                                    <div class="imgseries">
                                        <a class="series" href="{{route('movie', $phim->slug)}}" rel="">
                                            <img data-type="lazy" src="{{$phim->thumb_url}}" data-src="{{$phim->thumb_url}}"
                                                 decoding="async"
                                                 class="ts-post-image wp-post-image attachment-medium size-medium"
                                                 itemprop="image"
                                                 title="{{$phim->name}} ({{$phim->year}})"
                                                 alt="{{$phim->name}} ({{$phim->year}})"
                                                 width="200" height="300"/>
                                        </a>
                                    </div>
                                    <div class="leftseries">
                                        <h4><a class="series" href="{{route('movie', $phim->slug)}}"
                                               rel="{{$phim->server_id}}">{{$phim->name}} ({{$phim->year}}) </a>
                                        </h4>
                                        <span>{{$phim->origin_name}} ({{$phim->year}})</span>
                                        <span><b>Thể loại</b>:
                               @foreach($phim->categories as $cat)
                                                <a href="{{route('category', $cat->slug)}}" tite="{{$cat->name}}" rel="tag">{{$cat->name}}</a>{{$loop->last ? "" : ","}}
                                            @endforeach
                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="footer">
        <footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter"
                role="contentinfo">
            <div class="footermenu">
                <div class="menu-foot-container">
                    <ul id="menu-foot" class="menu">
                        <li id="menu-item-17253"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17253"><a
                                href="mailto:admin@xemphim.sbs" itemprop="url">DMCA</a></li>
                        <li id="menu-item-17256"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17256"><a
                                href="mailto:admin@xemphim.sbs" itemprop="url">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="footercopyright">
                <div class="footer-az"><span class="ftaz">XEMPHIM</span><span class="size-s">Xem phim miễn phí</span>
                    <ul class="ulclear az-list">
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                        <li><a href="/">Text Link</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="copyright">
                    <div class="txt">
                        <p>This site <i>XEMPHIM</i> does not store any files on its server. All contents
                            are provided by non-affiliated third parties.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
