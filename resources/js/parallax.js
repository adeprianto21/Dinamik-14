$(document).ready(function () {
    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();

        $('.layer').each(function () {
            var layer = $(this);
            var dataSpeed = layer.data('speed');
            var offsetY = -(scrollTop * dataSpeed);
            layer.css('transform', 'translateY(' + offsetY + 'px)');
        });
    });
});