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

    $("nav .nav-dinamik-item ul li.dropdown").each(function () {
        $(this).on("click", function () {
            $(this).children("i").toggleClass("rotate180");
            if ($(this).children(".dropdown-menu").css("display") == 'none') {
                $(this).children(".dropdown-menu").css("display", "block");
            } else {
                $(this).children(".dropdown-menu").css("display", "none");
            }
        })
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

        if ($("#header-home").length) {
            if ($("#header-home").position().top > ($("#abstraction-section").position().top - 100)) {
                $("header").css({ "background-color": "rgba(0,0,0,0.9)", "transition": "all ease 0.5s" });
            }
            else {
                $("header").css({ "background-color": "rgba(0,0,0,0)", "transition": "all ease 0.5s" });
            }
        } else if ($("#header-top").length) {
            if ($("#header-top").position().top > 50) {
                $("header").css({ "background-color": "rgba(0,0,0,0.9)", "transition": "all ease 0.5s" });
            }
            else {
                $("header").css({ "background-color": "rgba(0,0,0,0)", "transition": "all ease 0.5s" });
            }
        }

    });

});

