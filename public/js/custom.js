$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        animateOut: 'fadeOutDown',
        animateIn: 'fadeInLeft'
    });

    $(window).scroll(function () {
        if ($(document).scrollTop() > 50) {
            $('.navbar-light').addClass('navbar-fixed-top');
        }else {
            $('.navbar-light').removeClass('navbar-fixed-top');
        }
    });
});