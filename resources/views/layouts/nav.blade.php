<div class="centernav">
    <div class="bound">
        <span itemscope="itemscope" role="navigation">
                <ul id="menu-menu" class="menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-72">
                        <a href="{{route('home')}}" itemprop="url"><span itemprop="name">Trang chủ</span></a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom">
                        <a href="#" itemprop="url"><span itemprop="name">Thể loại</span></a>
                        <ul>
                            @foreach($categories as $cat)
                                <li><a href="{{route('category', $cat->slug)}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom">
                        <a href="#" itemprop="url"><span itemprop="name">Quốc gia</span></a>
                        <ul>
                             @foreach($countries as $country)
                                <li><a href="{{route('country', $country->slug)}}">{{$country->name}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom">
                        <a href="{{route('danhsach', 'phim-thuyet-minh')}}" itemprop="url"><span itemprop="name">Phim thuyết minh</span></a>
                    </li>
                </ul>
            </span>
        <div class="clear"></div>
    </div>
</div>
