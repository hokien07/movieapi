@extends('layouts.app')
@section('content')
    <div class="postbody">
        <div class="bixbox bixboxarc bbnofrm">
            <div class="releases">
                <h1><span>{{$name}}</span></h1>
            </div>
            <div class="mrgn">
                <div class="clear"></div>
                <div class="listupd">
                    @foreach($movies as $phim)
                    <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="bsx">
                            <a href="{{route('movie', $phim->slug)}}"
                                            itemprop="url"
                                            title="{{$phim->name}} ({{$phim->origin_name}}) [{{$phim->year}}]"
                                            class="tip" rel="{{$phim->server_id}}">
                                <div class="limit">
                                    <div class="hotbadge"><i class="fa fa-fire" aria-hidden="true"></i></div>
                                    <div class="typez Drama">{{getMovieType($phim->type)}}</div>
                                    <div class="ply"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    <div class="bt"><span class="epx">{{getEpxStatus($phim->status)}}</span> <span class="sb Soft Sub">{{$phim->lang}}</span></div>
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
                                    <div class="tt"> {{$phim->name}}
                                        <h2 itemprop="headline">{{$phim->origin_name}}</h2>
                                    </div>
                                    <div class="timeago">{{$phim->origin_name}}</div>
                                </div>
                            </a></div>
                    </article>
                    @endforeach
                </div>
                {{$movies->withQueryString()->links()}}
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection
