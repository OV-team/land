(function ($) {
    $(document).ready(function () {

        $(".sidebar-menu li").click(function () {
            console.log('sss');
            if ($(this).hasClass("active")) {
                $(this).find('.submenu').first().hide("1000");
                $(this).find('#switch').removeClass('fa fa-angle-down pull-right');
                $(this).find('#switch').addClass('fa fa-angle-left pull-right');
                $(this).removeClass("active");

            } else {
                $(this).find('.submenu').first().show("1000");
                $(this).find('#switch').removeClass('fa fa-angle-left pull-right');
                $(this).find('#switch').addClass('fa fa-angle-down pull-right');
                $(this).addClass("active");

            }
        });


        $(window).on('load', function () {

            var $preloader = $('#preloader'),
                $spinner = $preloader.find('.spinner');
            $spinner.fadeOut();
            $preloader.delay(350).fadeOut('slow');
        });

    });

})(jQuery);