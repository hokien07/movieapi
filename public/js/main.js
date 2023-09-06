$(document).ready(function () {
    $(".shme").click(function () {
        console.log('okie');
        $(".mm").toggleClass("shwx");
    });
    $(".expand").click(function () {
        $(".megavid").toggleClass("xp");
        $(".pd-expand").toggleClass("sxp");
    });
    $('.expand').click(function () {
        if ($('.expand').hasClass('slamdown')) {
            $('.expand').removeClass('slamdown');
            jQuery(".mvelement").prependTo(jQuery(".megavid"));
        } else {
            $('.expand').addClass('slamdown');
            jQuery(".mvelement").appendTo(jQuery(".pd-expand"));
        }
    });
    $(".gnr").click(function () {
        $(".gnrx").toggleClass("shwgx");
    });
    $(".light").click(function () {
        $(".lowvid").toggleClass("highvid");
    });
    $(".colap").click(function () {
        $(".mindes").toggleClass("alldes");
    });
    $(".topmobile").click(function () {
        $(".topmobcon").toggleClass("topmobshow");
    });
});
