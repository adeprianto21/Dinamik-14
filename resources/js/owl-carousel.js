$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        stagePadding: 50,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplaySpeed: 1000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 0
            },
            450: {
                items: 1
            },
            680: {
                items: 2,
                stagePadding: 0
            },
            980: {
                items: 3
            }
        }
    });

    $('#prev-competition-carousel').click(function () {
        $(".owl-carousel").trigger('prev.owl.carousel');
    })

    $('#next-competition-carousel').click(function () {
        $(".owl-carousel").trigger('next.owl.carousel');
    })
});