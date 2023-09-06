<div id="footer">
    @include('layouts.footer_content')
</div>

<script src='{{asset('js/jquery.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/main.js')}}'></script>
<script type='text/javascript' src='{{asset('js/owl.carousel.min.js')}}'></script>
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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BVD4D1VNTV"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-BVD4D1VNTV');
</script>
