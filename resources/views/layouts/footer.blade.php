<div id="footer">
    @include('layouts.footer_content')
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