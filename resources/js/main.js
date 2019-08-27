$(document).ready(function () {

    if ($(window).width() < 900) {
        $("#nav-menu-container").addClass("overlay-navbar");
        $("#nav-item-list").addClass("overlay-navbar-item").removeClass("nav-dinamik-item");
    }

    $(window).resize(function () {
        if ($(window).width() < 900) {
            $("#nav-menu-container").addClass("overlay-navbar");
            $("#nav-item-list").addClass("overlay-navbar-item").removeClass("nav-dinamik-item");
        } else {
            $("#nav-menu-container").removeClass("overlay-navbar");
            $("#nav-item-list").removeClass("overlay-navbar-item").addClass("nav-dinamik-item");
        }
    });

    $(".navbar-toggle").click(function () {
        $("#nav-menu-container").css("display", "flex");
        setTimeout(function () {
            $(".overlay-navbar").css("height", "100%");
            $(".close-btn-group").toggleClass("change");
            $("body").css("overflow", "hidden");
        }, 10);

    });

    $(".close-btn-group").click(function () {
        $(".overlay-navbar").css("height", "0%");
        $(".close-btn-group").toggleClass("change");
        $("body").css("overflow", "auto");
    });

    $(window).scroll(function () {

        var scrollTop = $(window).scrollTop();

        $('.layer').each(function () {
            var layer = $(this);
            var dataSpeed = layer.data('speed');
            var offsetY = -(scrollTop * dataSpeed);
            layer.css('transform', 'translateY(' + offsetY + 'px)');
        });

        if ($("header").position().top > ($("#abstraction-section").position().top - 100)) {
            $("header").css({ "background-color": "rgba(0,0,0,0.9)", "transition": "all ease 0.5s" });
        } else {
            $("header").css({ "background-color": "rgba(0,0,0,0)", "transition": "all ease 0.5s" });
        }

    });

    $(".form-input").each(function () {
        $(this).focus(function () {
            $(this).css("border-bottom", "2px solid #ffee00");
            $(this).prev().addClass("form-label-focus");
            $(this).next().css({ "color": "#ffee00", "transition": "all 0.6s ease" });
        });

        $(this).focusout(function () {
            if ($(this).val() == 0) {
                $(this).css("border-bottom", "2px solid #d600ff");
                $(this).prev().removeClass("form-label-focus");
                $(this).next().css({ "color": "#d600ff", "transition": "all 0.6s ease" });
            }
        });
    });

    $(".show-pass").on("click", function () {

        $(this).children("i").toggleClass("fa-eye").toggleClass("fa-eye-slash");

        if ($(this).prev().attr("type") == "password") {
            $(this).prev().attr("type", "text");
        } else {
            $(this).prev().attr("type", "password");
        }
    })

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
                items: 2
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

