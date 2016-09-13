;
!function () {
    jQuery(document).ready(function ($) {
        var is_func = function (fn) {
            return fn && {}.toString.call(fn) == '[object Function]';
        };

        var send = function () {
            try {
                var $this = $(this),
                    success = $this.data('success'),
                    error = $this.data('error');

                $this.data('val', $this.val());
                $.ajax({
                    url:'{{ domain }}{{ subdir }}ajax', data:$this.data() // the set
                    , cache:false, success:function () {
                        $this.css('background-color', '#efe');
                        return is_func(success) ? success() : success;
                    }, error:function () {
                        $this.css('background-color', '#fee');
                        return is_func(error) ? error() : error;
                    }
                });
            } catch (e) {
            }
        };

        $('input.ajax, textarea.ajax').on('blur', send);
    });
}();
