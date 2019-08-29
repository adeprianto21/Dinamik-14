$(document).ready(function () {

    $('.form-input').each(function () {
        var val = $(this).val().trim();
        if (val.length) {
            $(this).addClass('form-input-focus');
            $(this).prev('.form-label').addClass("form-label-focus");
            $(this).next('.show-pass').css({ "color": "#ffee00", "transition": "all 0.6s ease" });
        }
    });

    $(".form-input").each(function () {
        $(this).focus(function () {
            $(this).addClass('form-input-focus');
            $(this).prev('.form-label').addClass("form-label-focus");
            $(this).next('.show-pass').css({ "color": "#ffee00", "transition": "all 0.6s ease" });
        });

        $(this).focusout(function () {
            if ($(this).val() == 0) {
                $(this).removeClass('form-input-focus');
                $(this).prev('.form-label').removeClass("form-label-focus");
                $(this).next('.show-pass').css({ "color": "#d600ff", "transition": "all 0.6s ease" });
            }
        });
    });

    $(".show-pass").on("click", function () {

        $(this).children("i").toggleClass("fa-eye").toggleClass("fa-eye-slash");

        if ($(this).siblings("input").attr("type") == "password") {
            $(this).siblings("input").attr("type", "text");
        } else {
            $(this).siblings("input").attr("type", "password");
        }
    })

    $(".form-icon-error").each(function () {
        $(this).on("click", function () {
            $(this).siblings("input").removeClass("form-input-error");
            $(this).parent().next(".form-message-error").css("display", "none");
            $(this).css("display", "none");
        });
    });

});