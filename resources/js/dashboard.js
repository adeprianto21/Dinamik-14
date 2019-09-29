$(document).ready(function () {

    if (($(window).width() > 450) && ($(window).width() < 900)) {

        $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/qdWM0PC/dinamik.png").css("width", "45px");

        $(".dashboard-fullscreen").css("display", "none");

        $(".nav-side-bar").css("width", "13%");

        $(".nav-side-list-item a span").css("display", "none");

        $(".username-bar").css("display", "none");

        $(".hide-dashboard").css("display", "none");

        $(".show-dashboard").on("click", function () {
            $(".nav-side-bar").css("width", "60%");
            $(".dashboard-fullscreen").css("display", "block");
            $(".username-bar").css("display", "inline-block");
            $(".nav-side-list-item").css("text-align", "left");
            setTimeout(function () {
                $(".nav-side-list-item a span").css("display", "inline");
            }, 200);
            $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "150px");
            $(".hide-dashboard").css("display", "block");
        });

        $(".hide-dashboard").on("click", function () {
            $(".nav-side-bar").css("width", "13%");
            $(".dashboard-fullscreen").css("display", "none");
            $(".username-bar").css("display", "none");
            $(".nav-side-list-item").css("text-align", "center");
            setTimeout(function () {
                $(".nav-side-list-item a span").css("display", "none");
            }, 200);
            $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/qdWM0PC/dinamik.png").css("width", "45px");
            $(".hide-dashboard").css("display", "none");
        });

    } else if ($(window).width() < 450) {

        $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "150px");

        $(".dashboard-fullscreen").css("display", "none");

        $(".nav-side-list-item a span").css("display", "none");

        $(".nav-side-bar").css("width", "0%");

        $(".username-bar").css("display", "inline-block");

        $(".hide-dashboard").css("display", "none");

        $(".show-dashboard").on("click", function () {
            $(".nav-side-bar").css("width", "75%");
            $(".dashboard-fullscreen").css("display", "block");
            setTimeout(function () {
                $(".nav-side-list-item a span").css("display", "inline");
            }, 200);
            $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "150px");
            $(".username-bar").css("display", "inline-block");
            $(".hide-dashboard").css("display", "block");
        });

        $(".hide-dashboard").on("click", function () {
            $(".nav-side-bar").css("width", "0%");
            $(".dashboard-fullscreen").css("display", "none");
            setTimeout(function () {
                $(".nav-side-list-item a span").css("display", "none");
            }, 100);
            $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "150px");
            $(".username-bar").css("display", "inline-block");
            $(".hide-dashboard").css("display", "none");
        });

    }

    var lastWidth = $(window).width();

    $(window).resize(function () {

        if ($(window).width() != lastWidth) {

            if (($(window).width() > 450) && ($(window).width() < 900)) {

                $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/qdWM0PC/dinamik.png").css("width", "45px");

                $(".dashboard-fullscreen").css("display", "none");

                $(".nav-side-bar").css("width", "13%");

                $(".nav-side-list-item a span").css("display", "none");

                $(".username-bar").css("display", "none");

                $(".hide-dashboard").css("display", "none");

                $(".show-dashboard").on("click", function () {
                    $(".nav-side-bar").css("width", "60%");
                    $(".dashboard-fullscreen").css("display", "block");
                    $(".username-bar").css("display", "inline-block");
                    $(".nav-side-list-item").css("text-align", "left");
                    setTimeout(function () {
                        $(".nav-side-list-item a span").css("display", "inline");
                    }, 200);
                    $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "150px");
                    $(".hide-dashboard").css("display", "block");
                });

                $(".hide-dashboard").on("click", function () {
                    $(".nav-side-bar").css("width", "13%");
                    $(".dashboard-fullscreen").css("display", "none");
                    $(".username-bar").css("display", "none");
                    $(".nav-side-list-item").css("text-align", "center");
                    setTimeout(function () {
                        $(".nav-side-list-item a span").css("display", "none");
                    }, 200);
                    $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/qdWM0PC/dinamik.png").css("width", "45px");
                    $(".hide-dashboard").css("display", "none");
                });

            }
            else if ($(window).width() < 450) {

                $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "150px");

                $(".dashboard-fullscreen").css("display", "none");

                $(".nav-side-list-item a span").css("display", "none");

                $(".nav-side-bar").css("width", "0%");

                $(".username-bar").css("display", "inline-block");

                $(".hide-dashboard").css("display", "none");

                $(".show-dashboard").on("click", function () {
                    $(".nav-side-bar").css("width", "75%");
                    $(".dashboard-fullscreen").css("display", "block");
                    setTimeout(function () {
                        $(".nav-side-list-item a span").css("display", "inline");
                    }, 200);
                    $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "150px");
                    $(".username-bar").css("display", "inline-block");
                    $(".hide-dashboard").css("display", "block");
                });

                $(".hide-dashboard").on("click", function () {
                    $(".nav-side-bar").css("width", "0%");
                    $(".dashboard-fullscreen").css("display", "none");
                    setTimeout(function () {
                        $(".nav-side-list-item a span").css("display", "none");
                    }, 100);
                    $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "150px");
                    $(".username-bar").css("display", "inline-block");
                    $(".hide-dashboard").css("display", "none");
                });

            }
            else {
                $(".dashboard-fullscreen").css("display", "none");

                $(".nav-side-brand").children("a").children("img").attr("src", "https://i.ibb.co/0Ymq7qy/layer3.png").css("width", "180px");

                $('.nav-side-bar').css({ 'display': 'block', 'text-align': 'center', 'width': '250px' });

                $(".nav-side-list-item a span").css("display", "inline");

                $(".username-bar").css("display", "inline-block");

                $(".hide-dashboard").css("display", "none");
            }

            lastWidth = $(window).width();
        }
    });

    $('#modal-submit').on('click', function () {
        $('#data-team-form').submit();
    });

});