jQuery(window).on('load',
    function(){

        jQuery('.row img').each(
            function(){
                jQuery(this).addClass('img-responsive');
                var wrapper = '<a href="' + jQuery(this).attr('src') + '" rel="lightbox"></a>';
                jQuery(this).wrap(wrapper);

                jQuery(document).ready(function(){ Mediabox.scanPage(); });
            });
    });
