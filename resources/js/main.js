$(document).ready(function () {

    if ($(window).width() < 900) {
        if ($(window).width() < 450) {
            $('.overlay-navbar-item').css('top', '0px');
        } else {
            $('.overlay-navbar-item').css('top', '70px');
        }
        $("#nav-menu-container").addClass("overlay-navbar");
        $("#nav-item-list").addClass("overlay-navbar-item").removeClass("nav-dinamik-item");
    }

    $(window).resize(function () {
        if ($(window).width() < 900) {
            if ($(window).width() < 450) {
                $('.overlay-navbar-item').css('top', '0px');
            } else {
                $('.overlay-navbar-item').css('top', '70px');
            }
            $("#nav-menu-container").addClass("overlay-navbar");
            $("#nav-item-list").addClass("overlay-navbar-item").removeClass("nav-dinamik-item");
        } else {
            $("#nav-menu-container").removeClass("overlay-navbar");
            $("#nav-item-list").removeClass("overlay-navbar-item").addClass("nav-dinamik-item");
        }
    });

    $(".nav .nav-dinamik-item ul li.dinamik-dropdown").each(function () {

        var dropdown = $(this);

        dropdown.on("blur", function () {
            setTimeout(function () {
                dropdown.children("span").children("i").removeClass("rotate180");
                dropdown.children(".dinamik-dropdown-menu").css("display", "none");
            }, 200);
        });

        dropdown.on("focus, click", function () {
            dropdown.children("span").children("i").toggleClass("rotate180");
            if (dropdown.children(".dinamik-dropdown-menu").css("display") == 'none') {
                dropdown.children(".dinamik-dropdown-menu").css("display", "block");
            } else {
                dropdown.children(".dinamik-dropdown-menu").css("display", "none");
            }
        });

    });

    $(".navbar-toggle").click(function () {
        $("#nav-menu-container").css("display", "flex");
        setTimeout(function () {
            $(".overlay-navbar").css("height", "100vh");
            $(".close-btn-group").toggleClass("change");
            $("body").css("overflow", "hidden");
        }, 10);

    });

    $('.overlay-navbar-item ul li.dinamik-dropdown').each(function () {

        var dropdown = $(this);

        dropdown.on("focus, click", function () {
            if ($(window).width() < 450) {
                if (dropdown.children('.dinamik-dropdown-menu').css('max-height') == '0px') {
                    if (dropdown.hasClass('user')) {
                        $('.overlay-navbar-item').css('top', '30px');
                    } else {
                        $('.overlay-navbar-item').css('top', '100px');
                    }
                    dropdown.children('.dinamik-dropdown-menu').css({ 'max-height': '330px', 'margin-top': '20px' });
                    dropdown.children("span").children("i").css({ 'transform': 'translateY(-50%) rotate(180deg)', 'transition': '0.3s all ease' });
                } else {
                    $('.overlay-navbar-item').css('top', '0px');
                    dropdown.children('.dinamik-dropdown-menu').css({ 'max-height': '0px', 'margin-top': '0px' });
                    dropdown.children("span").children("i").css({ 'transform': 'translateY(-50%) rotate(0deg)', 'transition': '0.3s all ease' });
                }
            } else if ($(window).width() < 900) {
                if (dropdown.children('.dinamik-dropdown-menu').css('max-height') == '0px') {
                    if (dropdown.hasClass('user')) {
                        $('.overlay-navbar-item').css('top', '150px');
                    } else {
                        $('.overlay-navbar-item').css('top', '250px');
                    }
                    dropdown.children('.dinamik-dropdown-menu').css({ 'max-height': '330px', 'margin-top': '20px' });
                    dropdown.children("span").children("i").css({ 'transform': 'translateY(-50%) rotate(180deg)', 'transition': '0.3s all ease' });
                } else {
                    $('.overlay-navbar-item').css('top', '70px');
                    dropdown.children('.dinamik-dropdown-menu').css({ 'max-height': '0px', 'margin-top': '0px' });
                    dropdown.children("span").children("i").css({ 'transform': 'translateY(-50%) rotate(0deg)', 'transition': '0.3s all ease' });
                }
            }
        });

        dropdown.on("blur", function () {
            setTimeout(function () {
                dropdown.children('.dinamik-dropdown-menu').css({ 'max-height': '0px', 'margin-top': '0px' });
                dropdown.children("span").children("i").css({ 'transform': 'translateY(-50%) rotate(0deg)', 'transition': '0.3s all ease' });
                if ($(window).width() < 450) {
                    $('.overlay-navbar-item').css('top', '0px');
                } else if ($(window).width() < 900) {
                    $('.overlay-navbar-item').css('top', '70px');
                }
            }, 200);
        });
    });

    $(".close-btn-group").click(function () {
        $(".overlay-navbar").css("height", "0vh");
        $(".close-btn-group").toggleClass("change");
        $("body").css("overflow", "auto");
    });

    $(window).scroll(function () {

        if ($("#header-home").length) {
            if ($("#header-home").position().top > ($("#abstraction-section").position().top - 100)) {
                $(".header").css({ "background-color": "rgba(0,0,0,0.9)", "transition": "all ease 0.5s" });
            }
            else {
                $(".header").css({ "background-color": "rgba(0,0,0,0)", "transition": "all ease 0.5s" });
            }
        } else if ($("#header-top").length) {
            if ($("#header-top").position().top > 40) {
                $(".header").css({ "background-color": "rgba(0,0,0,0.9)", "transition": "all ease 0.5s" });
            }
            else {
                $(".header").css({ "background-color": "rgba(0,0,0,0)", "transition": "all ease 0.5s" });
            }
        }

    });

});

