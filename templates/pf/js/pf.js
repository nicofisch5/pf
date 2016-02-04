jQuery(window).on('load',
    function(){

        jQuery('#content img').each(
            function(){
                // Compatibility sigplus plugin
                if (! jQuery(this).attr('data-thumb')) {
                    jQuery(this).addClass('img-responsive');
                    var wrapper = '<a href="' + jQuery(this).attr('src') + '" rel="lightbox"></a>';
                    jQuery(this).wrap(wrapper);
                }
            });

        jQuery(document).ready(function () {
            Mediabox.scanPage();
        });
    });
