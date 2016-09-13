(function ($) {
    $.fn.dfn = function (selector, targets) {
        selector = selector || 'document';
        targets = targets || '*';
        return $(document).find(selector).each(function () {

        });
    };
})(jQuery);
