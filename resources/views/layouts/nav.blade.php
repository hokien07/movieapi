<div class="centernav">
    <div class="bound">
        <span itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
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
                        <a href="{{route('danhsach', 'phim-long-tieng')}}" itemprop="url"><span itemprop="name">Phim lồng tiếng</span></a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom">
                        <a href="{{route('danhsach', 'phim-thuyet-minh')}}" itemprop="url"><span itemprop="name">Phim thuyết minh</span></a>
                    </li>
                </ul>
            </span>
        <div class="surprise1">
            <a href="https://go.isclix.com/deep_link/v5/4573041870385972192/5384285971240929121?url_enc=aHR0cHM6Ly9hcHAuYWRqdXN0LmNvbS8xM3ZudGgzZA%3D%3D" target="_blank">
                <img src="{{asset('img/icons-app-store-32.png')}}" alt="">
            </a>
            <a href="https://go.isclix.com/deep_link/v5/4573041870385972192/5384459630016244301?url_enc=aHR0cHM6Ly9wbGF5Lmdvb2dsZS5jb20vc3RvcmUvYXBwcy9kZXRhaWxzP2lkPXZuLmZpbXBsdXMuYXBwLmFuZA%3D%3D" target="_blank">
                <img src="{{asset('img/icons-android-32.png')}}" alt="">
            </a>
        </div>
        <div class="clear"></div>
    </div>
</div>
