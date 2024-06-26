<div   class="episodelist" id="episodelist-{{$movie->id}}">
    <ul>
        <li id="search-ep-no-result--{{$movie->id}}" style="display:none; text-align: center; padding: 10px 5px">Không thấy tập này</li>
        @foreach($episodes as $tap)
            <li data-name="{{$tap->name}}" data-id="{{$tap->id}}" class="{{$tap->id == $firstEpisode->id ? 'selected' : ''}}" {{$tap->id == $firstEpisode->id ?? 'selected'}}>
                <a href="{{route('movie.view', [$movie->slug, $tap->name] )}}" itemprop="url" title="{{$movie->name}} Tập {{$tap->name}}">
                    <div class="thumbnel">
                        <img data-type="lazy" src="{{renderMovieImage($movie, 'thumb')}}"
                             data-src="{{renderMovieImage($movie, 'thumb')}}"
                             decoding="async" class="ts-post-image wp-post-image attachment-post-thumbnail size-post-thumbnail"
                             itemprop="image" title="{{$movie->name}} Tập {{$tap->name}}"
                             alt="{{$movie->name}} Tập {{$tap->name}}" width="900" height="1332">
                        <div class="nowplay">
                            <i class="fa fa-play-circle"></i>
                        </div>
                    </div>
                    <div class="playinfo">
                        <h4>{{$movie->name}} Tập {{$tap->name}}</h4>
                        <span class="epname">Tập {{$tap->name}}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
