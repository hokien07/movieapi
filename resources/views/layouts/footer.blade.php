<div id="footer">
    <footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter"
            role="contentinfo">
        <div class="footermenu">
            <div class="menu-foot-container">
                <ul id="menu-foot" class="menu">
                    <li id="menu-item-17253"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17253"><a
                            href="mailto:admin@xemphim.sbs" itemprop="url">DMCA</a></li>
                    <li id="menu-item-17256"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17256"><a
                            href="mailto:admin@xemphim.sbs" itemprop="url">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="footercopyright">
            <div class="footer-az"><span class="ftaz">XEMPHIM</span><span class="size-s">Xem phim miễn phí</span>
                <div class="clear"></div>
            </div>
            <div class="copyright">
                <div class="txt">
                    <p>This site <i>XEMPHIM</i> does not store any files on its server. All contents
                        are provided by non-affiliated third parties.</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src='{{asset('js/jquery.min.js')}}'></script>
<script type='text/javascript' data-type='lazy' data-src='{{asset('js/main.js')}}'></script>
<script type='text/javascript' src='{{asset('js/owl.carousel.min.js')}}' id='owl-carousel-js'></script>
<script>
    $(document).ready(function () {
        $('.loop').owlCarousel({
            center: true,
            loop: true,
            nav: true,
            navText: ["<span class='prev icon-angle-left'></span>",
                "<span class='next icon-angle-right'></span>"
            ],
            margin: 0,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 0,
                }
            }
        });
    });
</script>
