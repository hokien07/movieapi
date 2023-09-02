
<!DOCTYPE html>
<html lang="vi">

@include('layouts.head')
<body class='tsdefaultlayout' itemscope='itemscope' itemtype='http://schema.org/WebSite'>
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
                                <span itemprop="name">Tập {{$firstEpisode->name}}</span>
                                <meta itemprop="position" content="3">
                            </li>
                        </ol>
                    </div>

                    <div class="megavid">
                        <div class="mvelement">
                            <div class="item meta">
                                <div class="tb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                    <img src="{{renderMovieImage($movie, 'thumb')}}" data-src="{{renderMovieImage($movie, 'thumb')}}"
                                         decoding="async" class="ts-post-image wp-post-image attachment-medium size-medium" width="169"
                                         height="300" />
                                    <meta itemprop="url"
                                          content="{{ renderMovieImage($movie, 'thumb')}}">
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
                    <div id="mobilepisode"></div>
                    <div class="single-info bixbox">
                        <div class="thumb">
                            <img data-type="lazy" src="{{renderMovieImage($movie, 'thumb')}}"
                                 data-src="{{renderMovieImage($movie, 'thumb')}}"
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
                                <div class="fb-comments" data-href="{{route('movie', $movie->slug)}}" data-width="100%"
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
                                    @foreach($movies as $phim)
                                        <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                                            <div class="bsx">
                                                <a href="{{route('movie', $phim->slug)}}" itemprop="url"
                                                   title="{{$phim->name}} ({{$phim->origin_name}}) [{{$phim->year}}]"
                                                   class="tip" rel="{{$phim->server_id}}">
                                                    <div class="limit">
                                                        <div class="status Completed">{{getEpxStatus($phim->status)}}</div>
                                                        <div class="typez Drama">{{getMovieType($phim->type)}}</div>
                                                        <div class="ply"><i class="far fa-play-circle"></i></div>
                                                        <div class="bt"><span class="epx">{{getMovieType($phim->type)}}</span> <span
                                                                class="sb Soft Sub">{{$phim->lang}}</span></div>
                                                        <img data-type="lazy"
                                                             src="{{renderMovieImage($phim, 'thumb')}}"
                                                             data-src="{{renderMovieImage($phim, 'thumb')}}"
                                                             class="ts-post-image wp-post-image attachment-medium size-medium"
                                                             decoding="async" itemprop="image"
                                                             title="{{$phim->name}} ({{$phim->origin_name}}) [{{$phim->year}}]"
                                                             alt="{{$phim->name}} ({{$phim->origin_name}}) [{{$phim->year}}]"
                                                             width="240" height="300"/>
                                                    </div>
                                                    <div class="ttt">
                                                        <div class="tt">{{$phim->name}}
                                                            <h2 itemprop="headline">{{$phim->origin_name}} {{getEpxStatus($phim->type)}}</h2>
                                                        </div>
                                                        <div class="timeago">{{$phim->origin_name}}</div>
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
            @include('layouts.sidebar')
            <div class="clear"></div>
        </div>
    </div>
    <div id="footer">
        @include('layouts.footer_content')
    </div>
</div>
<script src='{{asset('js/jquery.min.js')}}'></script>
<script src="{{asset('js/p2p-media-loader-core.min.js')}}"></script>
<script src="{{asset('js/p2p-media-loader-hlsjs.min.js')}}"></script>
<script src="{{asset('js/jwplayer-8.9.3.js')}}"></script>
<script src="{{asset('js/hls.min.js')}}"></script>
<script src="{{asset('js/jwplayer.hlsjs.min.js')}}"></script>
<script src="{{asset('js/player.js')}}"></script>
<script>
    episode.setId("{{$firstEpisode->id}}")
    episode.setM3U8("{{$firstEpisode->link_m3u8}}");
    episode.setEmbed("{{$firstEpisode->link_embed}}")
    episode.setThumb("{{$movie->thumb_url}}")
</script>
</body>
</html>
