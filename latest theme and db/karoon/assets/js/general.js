/* Footer always bottom */
function footerAdj() {
    var footerH = $("footer").outerHeight();
    $("footer").css({ "margin-top": -footerH });
    $(".wrapper").css({ "padding-bottom": footerH });
}

function rowDetection(){
    var top = 0;
    $(".multiple-reports .annual_reports li").each(function() {
        var _this = $(this);
        var thistop = $(this).offset().top;
        if (thistop > top) {
            top = thistop;
            if($(this).is(':not(:first-child)')){
                $(".multiple-reports .annual_reports li").removeClass("col-trigger");
                setTimeout(function(){
                    _this.addClass("col-trigger").nextAll("li").addClass("col-trigger");
                }, 700);
            }
        }
    })
}


function smoothScroll() {

    var headerHeight;
    if ($(window).width() > 1199) {
        headerHeight = 121;
    } else if ($(window).width() > 1023) {
        headerHeight = 93;

    } else if ($(window).width() > 767) {
        headerHeight = 67;
    } else {
        headerHeight = 57;
    }

    $("nav  a").on("click touchstart", function(e) {
        setTimeout(function(){
            // console.log(window.location.hash, "ABC");
            if (window.location.hash) {
                var linkHref = window.location.hash.substr(1);
        
                if(linkHref == "environmental-stewardship"){
                    $('html, body').animate({ scrollTop: $("#environmental-stewardship-frigatebird-project").offset().top - ($(window).innerHeight() / 2) }, 1000, function(){
                        $('html, body').animate({ scrollTop: $("#environmental-stewardship-frigatebird-project").offset().top - ($(window).innerHeight() / 2) }, 350)
                    });
                }
            }
        }, 400)
        $(this).closest(".primary-menu-wrap").find("li").removeClass("active-menu-item");
        $(this).parent("li").addClass("active-menu-item");
        var link = $(this).attr('href');
        if (link == "#news") {
            if (!$(".blank-news-title").length) {
                $(".page-title").after("<h2 class='blank-news-title'></h2>");
            }
            link = $(".blank-news-title");
            var targetDivOffset = link.offset().top;
            var targetDivHeight = link.outerHeight(true);
        } else {
            link = $(link);
            var targetDivOffset = link.find("> h2").offset().top;
            var targetDivHeight = link.find("> h2").outerHeight(true);
        }
        var windowHeight = $(window).height();
        var offset;
        if (targetDivHeight < windowHeight) {
            offset = targetDivOffset - ((windowHeight / 2) - (targetDivHeight / 2) + headerHeight / 2);
        } else {
            offset = targetDivOffset;
        }
        $('html, body').animate({ scrollTop: offset }, 1000);
        if ($(window).width() < 768) {

            $(".menu-btn").click();
        }
    })


    if (window.location.hash) {
        var link = window.location.hash.substr(1);

        if (link == "news") {
            $(".page-title").after("<h2 class='blank-news-title'></h2>");
            link = $(".blank-news-title");
            var targetDivOffset = link.offset().top;
            var targetDivHeight = link.outerHeight(true);
        } else if(link == "investor-news"){
            $('html, body').animate({ scrollTop: $("#investornblock").offset().top - $("header").outerHeight() }, 1000, function(){
                $('html, body').animate({ scrollTop: $("#investornblock").offset().top - $("header").outerHeight() }, 350)
            });    
        } else if(link == "environmental-stewardship"){
            $('html, body').animate({ scrollTop: $("#environmental-stewardship-frigatebird-project").offset().top - ($(window).innerHeight() / 2) }, 1000, function(){
                $('html, body').animate({ scrollTop: $("#environmental-stewardship-frigatebird-project").offset().top - ($(window).innerHeight() / 2) }, 350)
            });
        } else {
            link = $("#" + link);
            var targetDivOffset = link.find("> h2").offset().top;
            var targetDivHeight = link.find("> h2").outerHeight(true);
        }
        var windowHeight = $(window).height();
        var offset;
        if (targetDivHeight < windowHeight) {
            offset = targetDivOffset - ((windowHeight / 2) - (targetDivHeight / 2) + headerHeight / 2);
        } else {
            offset = targetDivOffset;
        }
        $('html, body').animate({ scrollTop: offset }, 1000);
    }

}


//equalHeight
function eqHeight() {
    $.fn.extend({
        equalHeights: function() {
            var top = 0;
            var row = [];
            var classname = ('equalHeights' + Math.random()).replace('.', '');
            $(this).each(function() {
                var thistop = $(this).offset().top;
                if (thistop > top) {
                    $('.' + classname).removeClass(classname);
                    top = thistop;
                }
                $(this).addClass(classname);
                $(this).height('auto');
                var h = (Math.max.apply(null, $('.' + classname).map(function() {
                    return $(this).height();
                }).get()));
                $('.' + classname).height(h);
            }).removeClass(classname);
        }
    });

    $(".inner-page-list .text-wrap p").equalHeights();
    $(".corporate-policies .corporate-block a").equalHeights();
    //$(".sec__about-brief .img-thumb").equalHeights();
}


function collapse() {
    // Trigger open when load.

    $(".comp__collapse-block .coll-trigger").on("click", function(event) {
        var animateThis = $(this);
        var buttonText = $(this).attr("data-text");
        event.preventDefault();
        if ($(this).closest(".comp__collapse-block").find(".collapsable-content, .accordion-body").is(':visible')) {
            $(this).closest(".comp__collapse-block").find(".collapsable-content").slideUp();
            $(this).closest(".comp__collapse-block").removeClass("open");
            $(this).find(".button-text").text(buttonText);
            setTimeout(function() {
                var currentTop1 = animateThis.closest(".comp__collapse-block").offset().top;
                $('html, body').animate({
                    scrollTop: currentTop1 - ($("header").outerHeight() + 20)
                }, 850)
            }, 700);
        } else {
            $(".comp__collapse-block").removeClass("open").find(".collapsable-content").slideUp();
            $(".comp__collapse-block").find(".btn-toggle").each(function() {
                var revertText = $(this).attr("data-text");
                $(this).find(".button-text").text(revertText);
            })
            $(this).closest(".comp__collapse-block").addClass("open").find(".collapsable-content").slideDown();
            setTimeout(function() {
                var currentTop = animateThis.closest(".comp__collapse-block").offset().top;
                $('html, body').animate({
                    scrollTop: currentTop - ($("header").outerHeight() + 20)
                }, 850)
            }, 700);
            $(this).find(".button-text").text("Close");
            setTimeout(function() {
               // $(".sec__about-brief .img-thumb").equalHeights();
            }, 1500);
            
            if($(".annual_reports li.col-trigger").is(":visible")){
                $(".annual_reports li.col-trigger").slideUp();
                $(this).find(".button-text").text(buttonText);
                $(".comp__collapse-block.report-open").removeClass("open");
            }
            else{
                $(".annual_reports li.col-trigger").slideDown();
            }
            
        }
    });

    $(".comp__collapse-block.open").find(".coll-trigger").trigger("click");


    if ($(window).width() < 768) {
        // $(".mobile-accordion .coll-trigger").unbind("click");
        // $(".mobile-accordion .coll-trigger").click(function(){
        //     if($(this).closest(".mobile-accordion").find(".accordion-body").is(':visible')){
        //         $(this).closest(".mobile-accordion").find(".accordion-body").slideUp();
        //     } else {
        //         $(this).closest(".mobile-accordion").find(".accordion-body").slideDown();
        //     }
        //     // $(this).closest(".mobile-accordion").siblings().find(".accordion-body").stop(true,true).slideUp();
        //     // $(this).closest(".mobile-accordion").find(".accordion-body").stop(true,true).slideToggle();
        // })
    }
}

$(document).ready(function() {
    rowDetection();

    if ("ontouchstart" in document.documentElement)
{
$("body").addClass('touch-device')
}

    //
    /*var table_length = $(".glossary-conversation #collapseThree .column-stacks table").length
    var table_source;
    $(".glossary-conversation #collapseThree .column-stacks table").each(function(){
        table_source = table_source + $(this).clone();
    })*/
    //$(".glossary-conversation #collapseThree").appendTo(table_source)
    // Fancybox for image lighbox
    $("a.article-images-wrap").fancybox();

    //fast click
    FastClick.attach(document.body);

    footerAdj();
    eqHeight();

    // Collapse 
    collapse();

    $("a[href='#']").click(function(e) {
        e.preventDefault();
    });
    //remove initial open class
    // $(".comp__collapse-block").removeClass("open")

    /*mobile menu*/
    $(".menu-btn").click(function() {
        $("html,body").toggleClass('menu-open');
    })
    /*sub menu arrow*/
    $("header nav > ul >li:has(ul)").each(function() {
        $(this).find("> a").after('<em></em>')
    })

    $(".custom_dropdown").dropkick({
        mobile: true
    });


    //touch screen second click
    $("header nav>ul>li").on("touchstart", function(event) {
        if ($("body").hasClass("touch-device")) {
            if($(this).hasClass('focused')){
                    $(this).removeClass('focused')
            }else{
                    $("nav > ul > li").removeClass('focused')
                    $(this).addClass('focused')
            }
        }
    })


    $("body").on("touchstart", "nav em", function(event) {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active').next('ul').stop(true, false).slideUp();
            $(this).closest("li").removeClass('active focused')
        } else {
            $("nav  > ul > li > ul").stop(true, false).slideUp();
            $("nav em").removeClass('active');
            $("nav li").removeClass('active focused');
            $(this).addClass('active').next('ul').stop(true, false).slideDown();
            $(this).closest("li").addClass('active focused');
        }
    });

    /*thumb hover*/
    $(".inner-page-list .col-sm-4").hover(function() {
        $(this).addClass('hovered');
    })

    $(".inner-page-list .col-sm-4").mouseleave(function() {
        $(this).removeClass('hovered');
    })
    /*search button*/
    $(".search-wrap a").click(function() {
        $("body").toggleClass('search-open')
        setTimeout(function() {
        $(".search-wrap .form-control").focus();        
    }, 400);

    })

    /*scroll top button*/
    $(".top-scroll-btn").click(function() {
        $("html,body").animate({
            scrollTop: 0
        }, 'slow');
    })

    /*Landing page carousel*/
    $('#homepage-banner').owlCarousel({
        animateOut: 'fadeOut',
        items: 1,
        nav: false,
        smartSpeed: 450,
        touchDrag: false,
        mouseDrag: false,
        pullDrag: false,
        loop:true,
        autoplay:true,
        autoplayTimeout:5000
    })

    /*thumb height*/
    $(".inner-page-list .image-wrap").css("height", $(".inner-page-list .image-wrap").width() / 1.17)

    /*
            $(".card-header").click(function(){
                $this = $(this).closest(".card");
                setTimeout(function(){
                    $('html, body').animate({ scrollTop: $this.offset().top - $("header").innerHeight() - 20}, 1000);
                },500)
            })
            $(".coll-trigger").click(function(){
              $this = $(this).closest(".comp__collapse-block");
              setTimeout(function(){
                $('html, body').animate({ scrollTop: $this.offset().top - $("header").innerHeight() - 20}, 1000);
            },500)  
        })*/

    if ($(".left-bg-image").length) {
        /*left-bg-image*/
        $(".left-bg-image").css("width", $(".news-list").offset().left + $(".news-list").innerWidth())
    }
    if ($(".right-bg-image").length) {
        /*right-bg-image*/
        $(".right-bg-image").css("width", $(window).width() - $(".map-wrapper").offset().left)
    }


    /**/
    if ($(window).width() < 768) {
        // $(".comp__accordion-block .card:first-child .card-header").click();
    }
    // if ($(window).innerWidth() < 768) {
    //     $('.corporate-policies .corporate-block a').attr('target', '_blank');
    // } else {
    //     $('.corporate-policies .corporate-block a').removeAttr('target');
    // }
    
    
    
    

});

$(window).on('load', function() {
    footerAdj();
    eqHeight();
    setTimeout(function() {
        smoothScroll();
    }, 500);
    /*banner height*/
    // $(".home-page .banner").css("height", $(window).height() - $("header").innerHeight())
    $(".homepage-banner .item").css("height", $(window).height() - $("header").innerHeight())

    $("body").on("click", "header ul li a", function() {
        $("html,body").removeClass('menu-open')
    })

})

$(window).resize(function() {
    footerAdj();
    eqHeight();
    rowDetection();

    /*banner height*/
    if ($(".home-page .banner").length) {
        $(".home-page .banner").css("height", $(window).height() - $("header").innerHeight())
    }
    if ($(".homepage-banner .item").length) {
        $(".homepage-banner .item").css("height", $(window).height() - $("header").innerHeight())
    }
    /*left-bg-image*/
    if ($(".left-bg-image").length) {
        $(".left-bg-image").css("width", $(".news-list").offset().left + $(".news-list").innerWidth())
    }

    /*right-bg-image*/
    if ($(".right-bg-image").length) {
        $(".right-bg-image").css("width", $(window).width() - $(".map-wrapper").offset().left)
    }

    /*thumb height*/
    if ($(".inner-page-list .image-wrap").length) {
        $(".inner-page-list .image-wrap").css("height", $(".inner-page-list .image-wrap").width() / 1.17)
    }
    // if ($(window).innerWidth() < 768) {
    //     $('.corporate-policies .corporate-block a').attr('target', '_blank');
    // } else {
    //     $('.corporate-policies .corporate-block a').removeAttr('target');
    // }



})

/* Window scroll */
$(window).scroll(function(e) {

    /*Small Header*/
    if ($(window).scrollTop() > 0 && (!$("body").hasClass("menu-open"))) {
        $(".wrapper").addClass('small-header');
    } else {
        $(".wrapper").removeClass('small-header');
    }


    /*Small Header*/
    var height = $(window).scrollTop();
    if (height > 100) {
        $(".top-scroll-btn").fadeIn();
    } else {
        $(".top-scroll-btn").fadeOut();
    }

});

