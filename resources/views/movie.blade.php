@extends('layouts.app')
@section('content')
    <div class="postbody">
        <article id="post-{{$movie->server_id}}" class="post-{{$movie->server_id}} hentry" itemscope="itemscope"
                 itemtype="http://schema.org/CreativeWorkSeries">
            <div class="ts-breadcrumb bixbox">
                <ol>
                    <li>
                        <a href="{{route('home')}}"><span itemprop="name">Xem phim</span></a>
                    </li>
                    <li>
                        <a href="{{route('movie', $movie->slug)}}">
                            <span itemprop="name">{{$movie->name}}</span>
                        </a>
                    </li>
                </ol>
            </div>
            <div class="bixbox animefull">
                <div class="bigcover">
                    <div class="ime">
                        <a href="{{route('movie', $movie->slug)}}" class="lnk" aria-label="Xem phim {{$movie->name}}"></a>
                        <img
                            decoding="async" data-type="lazy"
                            src="{{$movie->poster}}"
                            data-src="{{$movie->poster}}"
                            alt="{{$movie->name}}"/>
                    </div>
                    <a href="{{route('movie', $movie->slug)}}" class="gp" aria-label="Xem phim {{$movie->name}}"><i class="far fa-play-circle" aria-hidden="true"></i></a>
                </div>
                <div class="bigcontent">
                    <div class="thumbook">
                        <div class="thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <img data-type="lazy"
                                 src="{{$movie->thumb_url}}"
                                 data-src="{{$movie->thumb_url}}"
                                 decoding="async"
                                 class="ts-post-image wp-post-image attachment-post-thumbnail size-post-thumbnail"
                                 title="{{$movie->name}}" alt="{{$movie->origin_name}}"
                                 width="900" height="1594"/>
                            <meta itemprop="url" content="{{$movie->thumb_url}}">
                            <meta itemprop="width" content="900">
                            <meta itemprop="height" content="1594">
                        </div>
                        <div class="rt">
                            <div class="rating" hidden>
                                <strong>Rating 8.0</strong>
                                <div class="rating-prc" itemscope="itemscope" itemprop="aggregateRating" itemtype="//schema.org/AggregateRating">
                                    <meta itemprop="ratingValue" content="8.0">
                                    <meta itemprop="worstRating" content="1">
                                    <meta itemprop="bestRating" content="10">
                                    <meta itemprop="ratingCount" content="1">
                                    <div class="rtp"><div class="rtb"><span style="width:80%"></span></div></div>
                                </div>
                            </div>
                            <a style="display: block"
                               href="{{route('movie', $movie->slug)}}" class="bookmark">
                                <i class="far fa-play-circle" aria-hidden="true"></i> Xem Phim</a>
                        </div>
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
                <div class="bottom tags">
                    <a href="{{route('movie', $movie->slug)}}" title="Phim {{$movie->name}}" rel="tag">{{$movie->name}}</a>
                    <a href="{{route('movie', $movie->slug)}}"
                                     title="Phim {{$movie->origin_name}}" rel="tag">{{$movie->origin_name}}</a>
                </div>
            </div>
            <div class='socialts' hidden>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.xemphim.sbs/phim/phap-su-dai-tai&t=Pháp Sư Đại Tài"
                   target="_blank" class="fb"> <i class="fab fa-facebook-f"></i> <span>Facebook</span> </a> <a
                    href="https://www.twitter.com/intent/tweet?url=https://www.xemphim.sbs/phim/phap-su-dai-tai&text=Pháp Sư Đại Tài"
                    target="_blank" class="twt"> <i class="fab fa-twitter"></i> <span>Twitter</span> </a> <a
                    href="whatsapp://send?text=Pháp Sư Đại Tài https://www.xemphim.sbs/phim/phap-su-dai-tai"
                    target="_blank"
                    class="wa"> <i class="fab fa-whatsapp"></i> <span>WhatsApp</span> </a> <a
                    href="https://pinterest.com/pin/create/button/?url=https://www.xemphim.sbs/phim/phap-su-dai-tai&media=/storage/images/phap-su-dai-tai/phap-su-dai-tai-thumb.jpg&description=Pháp Sư Đại Tài"
                    target="_blank" class="pntrs"> <i class="fab fa-pinterest-p"></i> <span>Pinterest</span>
                </a>
            </div>
            <div class="bixbox synp">
                <div class="releases">
                    <h2>Thông tin phim {{$movie->name}}</h2>
                </div>
                <div class="entry-content" itemprop="description">
                    {!! $movie->description !!}
                </div>
            </div>
            <div class="bixbox">
                <div class="releases"><h3><span>Bình luận</span></h3></div>
                <div class="cmt commentx">
                    <div class="box-comment" id="tabs-facebook"
                         style="background: linear-gradient(to right, #ffff, #ffff);">
                        <div class="fb-comments" data-href="https://www.xemphim.sbs/phim/phap-su-dai-tai"
                             data-width="100%"
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
@endsection
