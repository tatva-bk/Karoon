function footerAdj() {
    var e = $("footer").outerHeight();
    $("footer").css({
        "margin-top": - e
    }),
    $(".wrapper").css({"padding-bottom": e})
}
function rowDetection() {
    var e = 0;
    $(".multiple-reports .annual_reports li").each(function () {
        var t = $(this),
            o = $(this).offset().top;
        o > e && (e = o, $(this).is(":not(:first-child)") && ($(".multiple-reports .annual_reports li").removeClass("col-trigger"), setTimeout(function () {
            t.addClass("col-trigger").nextAll("li").addClass("col-trigger")
        }, 700)))
    })
}
function smoothScroll() {
    var e;
    if (e = $(window).width() > 1199 ? 121 : $(window).width() > 1023 ? 93 : $(window).width() > 767 ? 67 : 57, $("nav  a").on("click touchstart", function (t) {
        setTimeout(function () {
            window.location.hash && ("environmental-stewardship" == window.location.hash.substr(1) && $("html, body").animate({
                scrollTop: $("#environmental-stewardship-frigatebird-project").offset().top - $(window).innerHeight() / 2
            }, 1e3, function () {
                $("html, body").animate({
                    scrollTop: $("#environmental-stewardship-frigatebird-project").offset().top - $(window).innerHeight() / 2
                }, 350)
            }))
        }, 400),
        $(this).closest(".primary-menu-wrap").find("li").removeClass("active-menu-item"),
        $(this).parent("li").addClass("active-menu-item");
        var o = $(this).attr("href");
        if ("#news" == o) {
            $(".blank-news-title").length || $(".page-title").after("<h2 class='blank-news-title'></h2>");
            var i = (o = $(".blank-news-title")).offset().top,
                a = o.outerHeight(!0)
        } else 
            i = (o = $(o)).find("> h2").offset().top,
            a = o.find("> h2").outerHeight(!0);
        
        var n,
            l = $(window).height();
        n = a < l ? i -(l / 2 - a / 2 + e / 2) : i,
        $("html, body").animate({
            scrollTop: n
        }, 1e3),
        $(window).width() < 768 && $(".menu-btn").click()
    }), window.location.hash) {
        var t = window.location.hash.substr(1);
        if ("news" == t) {
            $(".page-title").after("<h2 class='blank-news-title'></h2>");
            var o = (t = $(".blank-news-title")).offset().top,
                i = t.outerHeight(!0)
        } else if ("investor-news" == t) 
            $("html, body").animate({
                scrollTop: $("#investornblock").offset().top - $("header").outerHeight()
            }, 1e3, function () {
                $("html, body").animate({
                    scrollTop: $("#investornblock").offset().top - $("header").outerHeight()
                }, 350)
            });
         else if ("environmental-stewardship" == t) 
            $("html, body").animate({
                scrollTop: $("#environmental-stewardship-frigatebird-project").offset().top - $(window).innerHeight() / 2
            }, 1e3, function () {
                $("html, body").animate({
                    scrollTop: $("#environmental-stewardship-frigatebird-project").offset().top - $(window).innerHeight() / 2
                }, 350)
            });
         else 
            o = (t = $("#" + t)).find("> h2").offset().top,
            i = t.find("> h2").outerHeight(!0);
        
        var a,
            n = $(window).height();
        a = i < n ? o -(n / 2 - i / 2 + e / 2) : o,
        $("html, body").animate({
            scrollTop: a
        }, 1e3)
    }
}
function eqHeight() {
    $.fn.extend({
        equalHeights: function () {
            var e = 0,
                t = ("equalHeights" + Math.random()).replace(".", "");
            $(this).each(function () {
                var o = $(this).offset().top;
                o > e && ($("." + t).removeClass(t), e = o),
                $(this).addClass(t),
                $(this).height("auto");
                var i = Math.max.apply(null, $("." + t).map(function () {
                    return $(this).height()
                }).get());
                $("." + t).height(i)
            }).removeClass(t)
        }
    }),
    $(".inner-page-list .text-wrap p").equalHeights(),
    $(".corporate-policies .corporate-block a").equalHeights()
}
function collapse() {
    $(".comp__collapse-block .coll-trigger").on("click", function (e) {
        var t = $(this),
            o = $(this).attr("data-text");
        e.preventDefault(),
        $(this).closest(".comp__collapse-block").find(".collapsable-content, .accordion-body").is(":visible") ? ($(this).closest(".comp__collapse-block").find(".collapsable-content").slideUp(), $(this).closest(".comp__collapse-block").removeClass("open"), $(this).find(".button-text").text(o), setTimeout(function () {
            var e = t.closest(".comp__collapse-block").offset().top;
            $("html, body").animate({
                scrollTop: e - ($("header").outerHeight() + 20)
            }, 850)
        }, 700)) : ($(".comp__collapse-block").removeClass("open").find(".collapsable-content").slideUp(), $(".comp__collapse-block").find(".btn-toggle").each(function () {
            var e = $(this).attr("data-text");
            $(this).find(".button-text").text(e)
        }), $(this).closest(".comp__collapse-block").addClass("open").find(".collapsable-content").slideDown(), setTimeout(function () {
            var e = t.closest(".comp__collapse-block").offset().top;
            $("html, body").animate({
                scrollTop: e - ($("header").outerHeight() + 20)
            }, 850)
        }, 700), $(this).find(".button-text").text("Close"), setTimeout(function () {}, 1500), $(".annual_reports li.col-trigger").is(":visible") ? ($(".annual_reports li.col-trigger").slideUp(), $(this).find(".button-text").text(o), $(".comp__collapse-block.report-open").removeClass("open")) : $(".annual_reports li.col-trigger").slideDown())
    }),
    $(".comp__collapse-block.open").find(".coll-trigger").trigger("click"),
    $(window).width()
}
function ajaxFilter(e, t, o, i) {
    jQuery("#loader").show(),
    jQuery("#communityNews").html(""),
    jQuery("#communityNewsImage").html(""),
    jQuery("#communityNewsPagination").html(""),
    jQuery.ajax({
        type: "POST",
        url: homeurl + "/wp-admin/admin-ajax.php",
        cache: !1,
        data: {
            action: "newsFilter",
            pagenumber: e,
            category: t,
            postperpage: o,
            postyear: i
        },
        success: function (e) {
            jQuery("#loader").hide(),
            jQuery("html, body").animate({
                scrollTop: 300
            }, "slow"),
            jQuery("#communityNews").html(e),
            jQuery(".comp__collapse-block .coll-trigger").on("click", function (e) {
                var t = jQuery(this).attr("data-text");
                e.preventDefault(),
                jQuery(this).closest(".comp__collapse-block").find(".collapsable-content, .accordion-body").is(":visible") ? (jQuery(this).closest(".comp__collapse-block").find(".collapsable-content").slideUp(), jQuery(this).closest(".comp__collapse-block").removeClass("open"), jQuery(this).find(".button-text").text(t)) : (jQuery(".comp__collapse-block").removeClass("open").find(".collapsable-content").slideUp(), jQuery(".comp__collapse-block").find(".btn-toggle").each(function () {
                    var e = jQuery(this).attr("data-text");
                    jQuery(this).find(".button-text").text(e)
                }), jQuery(this).closest(".comp__collapse-block").addClass("open").find(".collapsable-content").slideDown(), jQuery(this).find(".button-text").text(close))
            }),
            jQuery(".comp__collapse-block.open").find(".coll-trigger").trigger("click"),
            jQuery(".coll-trigger").click(function () {
                jQuerythis = jQuery(this).closest(".comp__collapse-block"),
                setTimeout(function () {
                    jQuery("html, body").animate({
                        scrollTop: jQuerythis.offset().top - jQuery("header").innerHeight() - 20
                    }, 1e3)
                }, 500)
            })
        },
        error: function (e) {
            jQuery("#loader").hide()
        }
    })
}
function ajaxInvesrtorFilter(e, t, o, i) {
    jQuery("#investornblock #loader").show(),
    jQuery("#investornblock #communityNews").html(""),
    jQuery.ajax({
        type: "POST",
        url: homeurl + "/wp-admin/admin-ajax.php",
        cache: !1,
        data: {
            action: "investorFilter",
            pagenumber: e,
            category: t,
            postperpage: o,
            postyear: i
        },
        success: function (e) {
            jQuery("#investornblock #loader").hide(),
            jQuery("#investornblock #communityNews").html(e)
        },
        error: function (e) {
            jQuery("#investornblock #loader").hide()
        }
    })
}
function ajaxPresentationFilter(e, t, o, i) {
    jQuery("#presentationblock #loader").show(),
    jQuery("#presentationblock #communityNews").html(""),
    jQuery.ajax({
        type: "POST",
        url: homeurl + "/wp-admin/admin-ajax.php",
        cache: !1,
        data: {
            action: "investorFilter",
            pagenumber: e,
            category: t,
            postperpage: o,
            postyear: i
        },
        success: function (e) {
            jQuery("#presentationblock #loader").hide(),
            jQuerythis = jQuery("#presentations"),
            jQuery("html, body").animate({
                scrollTop: jQuerythis.offset().top - jQuery("header").innerHeight() - 20
            }, "slow"),
            jQuery("#presentationblock #communityNews").html(e)
        },
        error: function (e) {
            jQuery("#presentationblock #loader").hide()
        }
    })
}
var $karoonHomeBaner;
$(document).ready(function () {
    rowDetection(),
    "ontouchstart" in document.documentElement && $("body").addClass("touch-device"),
    $("a.article-images-wrap").fancybox(),
    FastClick.attach(document.body),
    footerAdj(),
    eqHeight(),
    collapse(),
    $("a[href='#']").click(function (e) {
        e.preventDefault()
    }),
    $(".menu-btn").click(function () {
        $("html,body").toggleClass("menu-open")
    }),
    $("header nav > ul >li:has(ul)").each(function () {
        $(this).find("> a").after("<em></em>")
    }),
    $(".custom_dropdown").dropkick({
        mobile: !0
    }),
    $("header nav>ul>li").on("touchstart", function (e) {
        $("body").hasClass("touch-device") && ($(this).hasClass("focused") ? $(this).removeClass("focused") : ($("nav > ul > li").removeClass("focused"), $(this).addClass("focused")))
    }),
    $("body").on("touchstart", "nav em", function (e) {
        $(this).hasClass("active") ? ($(this).removeClass("active").next("ul").stop(!0, !1).slideUp(), $(this).closest("li").removeClass("active focused")) : ($("nav  > ul > li > ul").stop(!0, !1).slideUp(), $("nav em").removeClass("active"), $("nav li").removeClass("active focused"), $(this).addClass("active").next("ul").stop(!0, !1).slideDown(), $(this).closest("li").addClass("active focused"))
    }),
    $(".inner-page-list .col-sm-4").hover(function () {
        $(this).addClass("hovered")
    }),
    $(".inner-page-list .col-sm-4").mouseleave(function () {
        $(this).removeClass("hovered")
    }),
    $(".search-wrap a").click(function () {
        $("body").toggleClass("search-open"),
        setTimeout(function () {
            $(".search-wrap .form-control").focus()
        }, 400)
    }),
    $(".top-scroll-btn").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, "slow")
    });
    $karoonHomeBaner = $("#homepage-banner").owlCarousel({
        animateOut: "fadeOut",
        items: 1,
        nav: !1,
        smartSpeed: 450,
        touchDrag: !1,
        mouseDrag: !1,
        pullDrag: !1,
        loop: !0,
        autoplay: 0,
        autoplayTimeout: 5e3
    });
    $(".inner-page-list .image-wrap").css("height", $(".inner-page-list .image-wrap").width() / 1.17),
    $(".left-bg-image").length && $(".left-bg-image").css("width", $(".news-list").offset().left + $(".news-list").innerWidth()),
    $(".right-bg-image").length && $(".right-bg-image").css("width", $(window).width() - $(".map-wrapper").offset().left),
    $(window).width()
}),
$(window).on("load", function () {
    footerAdj(),
    eqHeight(),
    setTimeout(function () {
        smoothScroll()
    }, 500),
    $(".karoon-home-banner .owl-item").length && $(".karoon-home-banner .owl-item").css("height", $('.karoon-home-banner .owl-stage').height()),
    $("body").on("click", "header ul li a", function () {
        $("html,body").removeClass("menu-open")
    })
}),
$(window).resize(function () {
    footerAdj(),
    eqHeight(),
    rowDetection(),
    $(".karoon-home-banner .owl-item").length && $(".karoon-home-banner .owl-item").css("height", $('.karoon-home-banner .owl-stage').height()),
    $(".left-bg-image").length && $(".left-bg-image").css("width", $(".news-list").offset().left + $(".news-list").innerWidth()),
    $(".right-bg-image").length && $(".right-bg-image").css("width", $(window).width() - $(".map-wrapper").offset().left),
    $(".inner-page-list .image-wrap").length && $(".inner-page-list .image-wrap").css("height", $(".inner-page-list .image-wrap").width() / 1.17);
    $karoonHomeBaner.trigger('refresh.owl.carousel');
}),
$(window).scroll(function (e) {
    $(window).scrollTop() > 0 && !$("body").hasClass("menu-open") ? $(".wrapper").addClass("small-header") : $(".wrapper").removeClass("small-header"),
    $(window).scrollTop() > 100 ? $(".top-scroll-btn").fadeIn() : $(".top-scroll-btn").fadeOut()
}),
jQuery(document).ready(function () {
    jQuery("[data-fancybox]").fancybox({
        youtube: {
            autoplay: 0
        },
        vimeo: {
            autoplay: 0
        }
    }),
    jQuery("body").on("click", ".communityBlock ul.page-numbers a.page-numbers", function (e) {
        e.preventDefault();
        ajaxFilter(jQuery(this).data("id"), jQuery("#communityNews").data("id"), "2", jQuery("#year-list :selected").text())
    }),
    jQuery("body").on("change", "#commyear-list", function (e) {
        e.preventDefault();
        var t = jQuery("#commyear-list :selected").text();
        ajaxFilter(1, jQuery("#communityNews").data("id"), "5", t)
    }),
    jQuery("body").on("click", "#investornblock ul.page-numbers a.page-numbers", function (e) {
        e.preventDefault();
        var t = jQuery(this).data("id"),
            o = jQuery("#investornblock #communityNews").data("id"),
            i = jQuery("#investornblock #investyear-list :selected").text();
        "Year" === i && (i = ""),
        ajaxInvesrtorFilter(t, o, "5", i)
    }),
    jQuery("body").on("change", "#investyear-list", function (e) {
        e.preventDefault();
        var t = jQuery("#investyear-list :selected").text(),
            o = jQuery("#investornblock #communityNews").data("id");
        "Year" === t && (t = ""),
        ajaxInvesrtorFilter(1, o, "5", t)
    }),
    jQuery("body").on("click", "#presentationblock ul.page-numbers a.page-numbers", function (e) {
        e.preventDefault();
        var t = jQuery(this).data("id"),
            o = jQuery("#presentationblock #communityNews").data("id"),
            i = jQuery("#presyear-list :selected").text();
        "Year" === i && (i = ""),
        ajaxPresentationFilter(t, o, "5", i)
    }),
    jQuery("body").on("change", "#presyear-list", function (e) {
        e.preventDefault();
        var t = jQuery("#presyear-list :selected").text(),
            o = jQuery("#presentationblock #communityNews").data("id");
        "Year" === t && (t = ""),
        ajaxPresentationFilter(1, o, "5", t)
    }),
    jQuery(".filter-outer #dk0-").text("All"),
    jQuery(".filter-outer #dk1-").text("All"),
    jQuery(".page-template-template-about .overview-class").addClass("open-overview"),
    jQuery(".open-overview .collapsable-content").show(),
    jQuery(".page-template-template-about .comp__collapse-block.overview-class").find(".button-text").text("Close"),
    jQuery(".comp__collapse-block.overview-class .coll-trigger").click(function () {
        jQuery(".comp__collapse-block.overview-class").removeClass("open-overview")
    })
});
