(function($) {
    $(document).ready(function(){
        $('.menu-trigger').on('click', function() {
            $('.top-bar').toggle();
            $('.top-bar').toggleClass('menu-trigger--active');
        });
    });
}(jQuery));