// {\rtf1}
function equalHeight() {
    jQuery.fn.extend({
        equalHeight: function() {
            var top = 0;
            var row = [];
            var classname = ('equalHeight' + Math.random()).replace('.', '');
            jQuery(this).each(function() {
                var thistop = jQuery(this).offset().top;
                if (thistop > top) {
                    jQuery('.' + classname).removeClass(classname);
                    top = thistop;
                }
                jQuery(this).addClass(classname);
                jQuery(this).height('auto');
                var h = (Math.max.apply(null, jQuery('.' + classname).map(function() {
                    return jQuery(this).outerHeight();
                }).get()));
                jQuery('.' + classname).height(h);
            }).removeClass(classname);
        }
    });
    jQuery('.karoon-grid-wrapper .karoon-grid-item .karoon-grid-inner .karoon-grid-inner-title .karoon-grid-title ').equalHeight();
    jQuery('.karoon-grid-wrapper .karoon-grid-item .karoon-grid-inner p').equalHeight();
    jQuery('.karoon-grid-wrapper .karoon-grid-item .karoon-grid-inner .karoon-grid-inner-equal').equalHeight();
}

jQuery(document).ready(function(){
    setTimeout(function(){
        equalHeight();        
    },300);
    jQuery(".karoon-home-banner .homepage-new-banner").owlCarousel({
        animateOut: "fadeOut",
        items: 1,
        nav: false,
        smartSpeed: 450,
        touchDrag: false,
        mouseDrag: false,
        pullDrag: false,
        loop: false,
        autoplay: 0,
        responsive: {
            0: {
                touchDrag: true,
                pullDrag: true,
                autoHeight:true,
                mouseDrag: true,
            },
        
            768: {
                touchDrag: false,
                mouseDrag: false,
                pullDrag: false,
                autoHeight:false

            },
        }
    
    });
});

jQuery(window).resize(function() {
    equalHeight();
});   