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

    if ($("select#kategori_lomba").val() == '') {
        $("tr#jumlah_anggota").css('display', 'none');
        if ($("tr#error_jumlah_anggota").length) {
            $("tr#error_jumlah_anggota").css('display', 'none');
        }
    }

    $("select#kategori_lomba").change(function () {
        if ($("select#kategori_lomba").val() == 4 || $("select#kategori_lomba").val() == 5) {
            $("tr#jumlah_anggota").css('display', 'table-row');
            $("select#select_jumlah_anggota").val('');
            if ($("tr#error_jumlah_anggota").length) {
                $("tr#error_jumlah_anggota").css('display', 'table-row');
            }
        } else {
            $("tr#jumlah_anggota").css('display', 'none');
            $("select#select_jumlah_anggota").val(1);
            if ($("tr#error_jumlah_anggota").length) {
                $("tr#error_jumlah_anggota").css('display', 'none');
            }
        }
    });

    $('#modal-submit-team').on('click', function () {
        $('#data-team-form').submit();
    });

    $('#modal-submit-participant').on('click', function () {
        $('#data-participant-form').submit();
    });

    $(".upload-button").each(function () {
        $(this).on('click', function (event) {

            event.preventDefault();

            var input = $(this).siblings("input");

            input.click();

            input.change(function () {

                if (input[0].files && input[0].files[0]) {
                    var reader = new FileReader();

                    reader.addEventListener("load", function () {
                        input.parent().siblings("img").attr("src", reader.result);
                    });

                    reader.readAsDataURL(input[0].files[0]);
                }

                if (input.val()) {
                    input.siblings("span.file-name").text(input.val().match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1]);
                } else {
                    input.siblings("span.file-name").text("No File Choosen, Yet.");
                }
            });
        });
    });
});