(function ($) {
    if ($ && $.fn && $.fn.jQuery) {
        $.fn.anchorscroll = function () {
            $(window).bind('hashchange', function (hash) {
                $('html,body').animate({
                    scrollTop:$("#" + hash).offset().top
                }, 'slow');
            });
        };
    }
})(jQuery || $);
