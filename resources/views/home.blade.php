@extends('layouts.app')
@section('content')
    <div class="postbody">
        <div class="slidtop">
            <div class="loop owl-carousel full">
                @foreach($slider as $phim)
                <div class="slide-item full">
                    <div class="slide-bg">
                        <img data-type="lazy"
                               src="{{renderMovieImage($phim, 'thumb')}}"
                               data-src="{{renderMovieImage($phim, 'thumb')}}"
                               decoding="async"
                               class="ts-post-image wp-post-image attachment-medium size-medium"
                               itemprop="image"
                               title="{{$phim->name}}" alt="{{$phim->name}}" width="212"
                               height="300"/>
                    </div>
                    <div class="slide-shadow"></div>
                    <div class="slide-content">
                        <div class="poster" style="position:relative">
                            <a href="{{route('movie', $phim->slug)}}">
                                <img data-type="lazy"
                                    src="{{renderMovieImage($phim, 'thumb')}}"
                                    data-src="{{renderMovieImage($phim, 'thumb')}}"
                                    decoding="async"
                                    class="ts-post-image wp-post-image attachment-medium size-medium"
                                    itemprop="image" title="{{$phim->name}}" alt="{{$phim->name}}" width="212" height="300"/>
                            </a>
                        </div>
                        <div class="info-left">
                            <div class="title">
                                <span class="ellipsis"><a href="{{route('movie', $phim->slug)}}">{{$phim->name}}</a></span>
                                <span class="release-year ellipsis">{{$phim->name}} ({{$phim->year}})</span>
                            </div>
                            <div class="extras">
                                <div class="extra-category">
                                    @foreach($phim->categories as $cat)
                                        <a href="{{route('category', $cat->slug)}}" title="{{$cat->name}}" rel="tag">{{$cat->name}}</a> {{$loop->last ? "" : ","}}
                                    @endforeach
                                </div>
                            </div>
                            <div class="excerpt"><span class="title">Nội dung</span>
                                <p class="story">{!! $phim->description !!}</p>
                            </div>
                            <div class="cast"><span class="director"><strong>Tình trạng:</strong>{{getEpxStatus($phim->status)}}</span>
                                <span class="actor"><strong>Định dạng:</strong> {{getMovieType($phim->type)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if($trending)
            <div class="trending">
                <div class="tdb">
                    <a href="{{route('movie', $trending->slug)}}">
                        <div class="crown"></div>
                        <div class="textbg blxc">
                            <div class="bghover"><span class="numa"><b>Trending</b> This Week</span>
                                <span class="numb"><b>{{$trending->name}}</b></span>
                            </div>
                        </div>
                        <div class="imgxa">
                            <img class="imgxb" alt="{{$trending->name}}" decoding="async" data-type="lazy"
                                 src="{{renderMovieImage($trending, 'thumb')}}"
                                 data-src="{{renderMovieImage($trending, 'thumb')}}"/>

                        </div>
                    </a></div>
            </div>
            @endif
        </div>
        <div class="bixbox">
            <div class="releases latesthome">
                <h3>Phim chiếu rạp mới</h3><a class="vl" href="{{route('danhsach', 'phim-chieu-rap')}}">Xem thêm</a>
            </div>
            <div class="listupd normal">
                <div class="excstf">
                    @foreach($phimRap as $phim)
                    <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="bsx">
                            <a href="{{route('movie', $phim->slug)}}" itemprop="url" title="{{$phim->name}}" class="tip" rel="{{$phim->server_id}}">
                                <div class="limit">
                                    <div class="typez Movie">{{getMovieType($phim->type)}}</div>
                                    <div class="ply"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    <div class="bt"><span class="epx">{{getEpxStatus($phim->status)}}</span> <span class="sb Soft Sub">{{$phim->lang}}</span></div>
                                    <img data-type="lazy"
                                         src="{{renderMovieImage($phim, 'thumb')}}"
                                         data-src="{{renderMovieImage($phim, 'thumb')}}"
                                         class="ts-post-image wp-post-image attachment-medium size-medium"
                                         itemprop="image"
                                         decoding="async" title="{{$phim->name}}"
                                         alt="{{$phim->origin_name}}"
                                         width="240" height="300"/>
                                </div>
                                <div class="ttt">
                                    <div class="tt">{{$phim->name}}<h2 itemprop="headline">{{$phim->origin_name}}</h2></div>
                                    <div class="timeago">{{$phim->origin_name}}</div>
                                </div>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bixbox">
            <div class="releases latesthome">
                <h3>Phim bộ mới</h3><a class="vl" href="{{route('danhsach', 'phim-bo')}}">Xem thêm</a>
            </div>
            <div class="listupd normal">
                <div class="excstf">
                    @foreach($phimBo as $phim)
                        <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                            <div class="bsx">
                                <a href="{{route('movie', $phim->slug)}}" itemprop="url" title="{{$phim->name}}" class="tip" rel="{{$phim->server_id}}">
                                    <div class="limit">
                                        <div class="typez Movie">{{getMovieType($phim->type)}}</div>
                                        <div class="ply"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                        <div class="bt"><span class="epx">{{getEpxStatus($phim->status)}}</span> <span class="sb Soft Sub">{{$phim->lang}}</span></div>
                                        <img data-type="lazy"
                                             src="{{renderMovieImage($phim, 'thumb')}}"
                                             data-src="{{renderMovieImage($phim, 'thumb')}}"
                                             class="ts-post-image wp-post-image attachment-medium size-medium"
                                             itemprop="image"
                                             decoding="async" title="{{$phim->name}}"
                                             alt="{{$phim->origin_name}}"
                                             width="240" height="300"/>
                                    </div>
                                    <div class="ttt">
                                        <div class="tt">{{$phim->name}}<h2 itemprop="headline">{{$phim->origin_name}}</h2></div>
                                        <div class="timeago">{{$phim->origin_name}}</div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bixbox">
            <div class="releases latesthome">
                <h3>Phim lẻ mới</h3><a class="vl" href="{{route('danhsach', 'phim-le')}}">Xem thêm</a>
            </div>
            <div class="listupd normal">
                <div class="excstf">
                    @foreach($phimLe as $phim)
                        <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                            <div class="bsx">
                                <a href="{{route('movie', $phim->slug)}}" itemprop="url" title="{{$phim->name}}" class="tip" rel="{{$phim->server_id}}">
                                    <div class="limit">
                                        <div class="typez Movie">{{getMovieType($phim->type)}}</div>
                                        <div class="ply"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                        <div class="bt"><span class="epx">{{getEpxStatus($phim->status)}}</span> <span class="sb Soft Sub">{{$phim->lang}}</span></div>
                                        <img data-type="lazy"
                                             src="{{renderMovieImage($phim, 'thumb')}}"
                                             data-src="{{renderMovieImage($phim, 'thumb')}}"
                                             class="ts-post-image wp-post-image attachment-medium size-medium"
                                             itemprop="image"
                                             decoding="async" title="{{$phim->name}}"
                                             alt="{{$phim->origin_name}}"
                                             width="240" height="300"/>
                                    </div>
                                    <div class="ttt">
                                        <div class="tt">{{$phim->name}}<h2 itemprop="headline">{{$phim->origin_name}}</h2></div>
                                        <div class="timeago">{{$phim->origin_name}}</div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bixbox">
            <div class="releases latesthome">
                <h3>Phim hoạt hình</h3><a class="vl" href="{{route('danhsach', 'hoat-hinh')}}">Xem thêm</a>
            </div>
            <div class="listupd normal">
                <div class="excstf">
                    @foreach($phimHoatHinh as $phim)
                        <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                            <div class="bsx">
                                <a href="{{route('movie', $phim->slug)}}" itemprop="url" title="{{$phim->name}}" class="tip" rel="{{$phim->server_id}}">
                                    <div class="limit">
                                        <div class="typez Movie">{{getMovieType($phim->type)}}</div>
                                        <div class="ply"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                        <div class="bt"><span class="epx">{{getEpxStatus($phim->status)}}</span> <span class="sb Soft Sub">{{$phim->lang}}</span></div>
                                        <img data-type="lazy"
                                             src="{{renderMovieImage($phim, 'thumb')}}"
                                             data-src="{{renderMovieImage($phim, 'thumb')}}"
                                             class="ts-post-image wp-post-image attachment-medium size-medium"
                                             itemprop="image"
                                             decoding="async" title="{{$phim->name}}"
                                             alt="{{$phim->origin_name}}"
                                             width="240" height="300"/>
                                    </div>
                                    <div class="ttt">
                                        <div class="tt">{{$phim->name}}<h2 itemprop="headline">{{$phim->origin_name}}</h2></div>
                                        <div class="timeago">{{$phim->origin_name}}</div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
