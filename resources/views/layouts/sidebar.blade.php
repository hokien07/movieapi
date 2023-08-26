<div id="sidebar">
    <div class="section">
        <div class="releases">
            <h3>Mới cập nhật</h3>
        </div>
        <span class="ts-ajax-cache">
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
    </span>
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
                                <a href="{{route('category', $cat->slug)}}" tite="{{$cat->name}}" rel="tag">{{$cat->name}}</a>{{$loop->last ? "" : ","}}
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
