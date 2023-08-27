<div   class="episodelist" id="episodelist-{{$movie->id}}">
    <ul>
        <li id="search-ep-no-result--{{$movie->id}}" style="display:none; text-align: center; padding: 10px 5px">Không thấy tập này</li>
        @foreach($episodes as $tap)
            <li data-server="0" data-name="{{$tap->name}}" data-id="{{$tap->id}}" class="{{$tap->id == $firstEpisode->id ? 'selected' : ''}}" {{$tap->id == $firstEpisode->id ?? 'selected'}}>
                <a href="{{route('movie.view', [$tap->slug, $tap->name] )}}" itemprop="url" title="{{$movie->name}} Tập {{$tap->name}}">
                    <div class="thumbnel">
                        <img data-type="lazy" src="{{$movie->thumb_url}}"
                             data-src="{{$movie->thumb_url}}"
                             decoding="async" class="ts-post-image wp-post-image attachment-post-thumbnail size-post-thumbnail"
                             itemprop="image" title="{{$movie->name}} Tập {{$tap->name}}"
                             alt="{{$movie->name}} Tập {{$tap->name}}" width="900" height="1332">
                        <div class="nowplay">
                            <i class="far fa-play-circle"></i>
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
