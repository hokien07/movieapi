<div class="headlist">
    <div class="thumb">
        <a href="{{route('movie', $movie->slug)}}">
            <img data-type="lazy" src="{{renderMovieImage($movie, 'thumb')}}" data-src="{{renderMovieImage($movie, 'thumb')}}"
                 decoding="async" class="ts-post-image wp-post-image attachment-medium size-medium"
                 title="{{$movie->name}}" alt="{{$movie->name}}" width="203" height="300">
        </a>
    </div>

    <div class="det">
        <h3><a href="{{route('movie', $movie->slug)}}">{{$movie->name}}</a></h3>
        <span><i>Đang xem tập {{$firstEpisode->name}}</i> -  {{$firstEpisode->server->name}}</span>
    </div>

    <div class="search-ep">
        <input type="text" class="search-ep-text" id="search-ep-text-0" value="" placeholder="Tìm tập nhanh...">
        <button type="button" class="search-ep-eraser" id="search-ep-eraser-0" style="display: none; top: 4px">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
    </div>
</div>
