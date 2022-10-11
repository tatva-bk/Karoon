/*var geocoder;
var map;
var bounds = new google.maps.LatLngBounds();
var markerSize = {
    x: 22,
    y: 40
};
google.maps.Marker.prototype.setLabel = function (label) {
    this.label = new MarkerLabel({
        map: this.map,
        marker: this,
        text: label
    });
    this.label.bindTo('position', this, 'position');
};
var MarkerLabel = function (options) {
    this.setValues(options);
    this.span = document.createElement('span');
    this.span.className = 'map-marker-label';
};
MarkerLabel.prototype = jQuery.extend(new google.maps.OverlayView(), {
    onAdd: function () {
        this.getPanes().overlayImage.appendChild(this.span);
        var self = this;
        this.listeners = [
            google.maps.event.addListener(this, 'position_changed', function () {
                self.draw();
            })
        ];
    },
    draw: function () {
        var text = String(this.get('text'));
        var position = this.getProjection().fromLatLngToDivPixel(this.get('position'));
        this.span.innerHTML = text;
        this.span.style.left = (position.x - (markerSize.x / 2)) - (text.length * 3) + 10 + 'px';
        this.span.style.top = (position.y - markerSize.y + 40) + 'px';
    }
});

function initialize() {
    map = new google.maps.Map(document.getElementById("map_canvas"), {
        zoom: 1.9,
        //minZoom: 2,
        center: new google.maps.LatLng(18.491389, 11.031641),
        gestureHandling: 'none',
        zoomControl: false,
        styles: [
            {
                elementType: 'geometry.fill',
                stylers: [
                    {visibility: 'off'}
                ]
            }, {
                featureType: 'landscape.natural.landcover',
                elementType: 'geometry.fill',
                stylers: [
                    {"visibility": 'on'},
                    { "color": "#BED5DD"}
                ]
            }, {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            }, {
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#BED5DD"
                    }
                ]
            }
        ],
        backgroundColor: 'hsla(0, 0%, 0%, 0)',
        mapTypeId: google.maps.MapTypeId.satellite,
    });
    geocoder = new google.maps.Geocoder();


    for (i = 0; i < locations.length; i++) {
        geocodeAddress(locations, i);
    }
}



function geocodeAddress(locations, i) {

    var infowindow = new google.maps.InfoWindow();
    //var service = new google.maps.places.PlacesService(map);

    var address = locations[i];
    geocoder.geocode({
        'address': locations[i]
    },
            function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    var location = locations[i];
                    var basin = location.split(',');



                    var marker = new MarkerWithLabel({
                        map: map,
                        animation: google.maps.Animation.DROP,
                        position: results[0].geometry.location,
                        icon: siteUrl + '/assets/images/map-marker.png',
                        labelContent: basin[0] + " Basin",
                        labelAnchor: new google.maps.Point(60, 15),
                        labelClass: "my-custom-class-for-label" + i, // the CSS class for the label
//                            labelInBackground: true                            
                    });

                    if (jQuery(window).width() < 1000) {
                        var position = new google.maps.LatLng(results[0].geometry.location.lat() - 10, results[0].geometry.location.lng());
                        bounds.extend(position);
                        map.fitBounds(bounds);
                    }

                    google.maps.event.addListener(marker, 'click', function () {
                        //infowindow.setContent('<div><strong>' + marker.labelContent + '</strong></div>');
                        //infowindow.open(map, this);
                        window.location.href = homeurl + '/projects#' + locationsProject[i];
                    });


                } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {

                } else {
                    alert("geocode of " + address + " failed:" + status);
                }
            });
}

if (typeof google !== 'undefined') {
    google.maps.event.addDomListener(window, "load", initialize);
} */

/*
 * Ajax for Community News
 */
function ajaxFilter(pageNumber, category, postPerPage, postYear) {
  jQuery("#loader").show();
  jQuery("#communityNews").html("");
  jQuery("#communityNewsImage").html("");
  jQuery("#communityNewsPagination").html("");
  jQuery.ajax({
    type: "POST",
    url: homeurl + "/wp-admin/admin-ajax.php",
    cache: false,
    data: {
      action: "newsFilter",
      pagenumber: pageNumber,
      category: category,
      postperpage: postPerPage,
      postyear: postYear
    },
    success: function(data) {
      jQuery("#loader").hide();
      jQuery("html, body").animate({ scrollTop: 300 }, "slow");
      jQuery("#communityNews").html(data);

      jQuery(".comp__collapse-block .coll-trigger").on("click", function(
        event
      ) {
        var buttonText = jQuery(this).attr("data-text");
        event.preventDefault();
        if (
          jQuery(this)
            .closest(".comp__collapse-block")
            .find(".collapsable-content, .accordion-body")
            .is(":visible")
        ) {
          jQuery(this)
            .closest(".comp__collapse-block")
            .find(".collapsable-content")
            .slideUp();
          jQuery(this)
            .closest(".comp__collapse-block")
            .removeClass("open");
          jQuery(this)
            .find(".button-text")
            .text(buttonText);
        } else {
          jQuery(".comp__collapse-block")
            .removeClass("open")
            .find(".collapsable-content")
            .slideUp();
          jQuery(".comp__collapse-block")
            .find(".btn-toggle")
            .each(function() {
              var revertText = jQuery(this).attr("data-text");
              jQuery(this)
                .find(".button-text")
                .text(revertText);
            });
          jQuery(this)
            .closest(".comp__collapse-block")
            .addClass("open")
            .find(".collapsable-content")
            .slideDown();
          jQuery(this)
            .find(".button-text")
            .text(close);
        }
      });
      jQuery(".comp__collapse-block.open")
        .find(".coll-trigger")
        .trigger("click");

      jQuery(".coll-trigger").click(function() {
        jQuerythis = jQuery(this).closest(".comp__collapse-block");
        setTimeout(function() {
          jQuery("html, body").animate(
            {
              scrollTop:
                jQuerythis.offset().top - jQuery("header").innerHeight() - 20
            },
            1000
          );
        }, 500);
      });
    },
    error: function(data) {
      jQuery("#loader").hide();
    }
  });
}

/*
 * Ajax for Investor News
 */
function ajaxInvesrtorFilter(pageNumber, category, postPerPage, postYear) {
  jQuery("#investornblock #loader").show();
  jQuery("#investornblock #communityNews").html("");
  jQuery.ajax({
    type: "POST",
    url: homeurl + "/wp-admin/admin-ajax.php",
    cache: false,
    data: {
      action: "investorFilter",
      pagenumber: pageNumber,
      category: category,
      postperpage: postPerPage,
      postyear: postYear
    },
    success: function(data) {
      jQuery("#investornblock #loader").hide();
      //jQuery("html, body").animate({scrollTop: 300}, "slow");
      jQuery("#investornblock #communityNews").html(data);
    },
    error: function(data) {
      jQuery("#investornblock #loader").hide();
    }
  });
}

/*
 * Ajax for Presentation News
 */
function ajaxPresentationFilter(pageNumber, category, postPerPage, postYear) {
  jQuery("#presentationblock #loader").show();
  jQuery("#presentationblock #communityNews").html("");
  jQuery.ajax({
    type: "POST",
    url: homeurl + "/wp-admin/admin-ajax.php",
    cache: false,
    data: {
      action: "investorFilter",
      pagenumber: pageNumber,
      category: category,
      postperpage: postPerPage,
      postyear: postYear
    },
    success: function(data) {
      jQuery("#presentationblock #loader").hide();

      jQuerythis = jQuery("#presentations");
      jQuery("html, body").animate(
        {
          scrollTop:
            jQuerythis.offset().top - jQuery("header").innerHeight() - 20
        },
        "slow"
      );
      jQuery("#presentationblock #communityNews").html(data);
    },
    error: function(data) {
      jQuery("#presentationblock #loader").hide();
    }
  });
}

jQuery(document).ready(function() {
  jQuery("[data-fancybox]").fancybox({
    youtube: {
      autoplay: 0
    },
    vimeo: {
      autoplay: 0
    }
  });

  // Coommunity News
  jQuery("body").on(
    "click",
    ".communityBlock ul.page-numbers a.page-numbers",
    function(e) {
      e.preventDefault();
      var pageNumber = jQuery(this).data("id");
      var category = jQuery("#communityNews").data("id");
      var postPerPage = "2";
      var postYear = jQuery("#year-list :selected").text();
      ajaxFilter(pageNumber, category, postPerPage, postYear);
    }
  );
  jQuery("body").on("change", "#commyear-list", function(e) {
    e.preventDefault();
    var postYear = jQuery("#commyear-list :selected").text();
    var pageNumber = 1;
    var category = jQuery("#communityNews").data("id");
    var postPerPage = "5";
    ajaxFilter(pageNumber, category, postPerPage, postYear);
  });

  // Investor News
  jQuery("body").on(
    "click",
    "#investornblock ul.page-numbers a.page-numbers",
    function(e) {
      e.preventDefault();
      var pageNumber = jQuery(this).data("id");
      var category = jQuery("#investornblock #communityNews").data("id");
      var postPerPage = "5";
      var postYear = jQuery(
        "#investornblock #investyear-list :selected"
      ).text();
      if (postYear === "Year") {
        postYear = "";
      }
      ajaxInvesrtorFilter(pageNumber, category, postPerPage, postYear);
    }
  );
  jQuery("body").on("change", "#investyear-list", function(e) {
    e.preventDefault();
    var postYear = jQuery("#investyear-list :selected").text();
    var pageNumber = 1;
    var category = jQuery("#investornblock #communityNews").data("id");
    var postPerPage = "5";
    if (postYear === "Year") {
      postYear = "";
    }
    ajaxInvesrtorFilter(pageNumber, category, postPerPage, postYear);
  });

  // Presentation News
  jQuery("body").on(
    "click",
    "#presentationblock ul.page-numbers a.page-numbers",
    function(e) {
      e.preventDefault();
      var pageNumber = jQuery(this).data("id");
      var category = jQuery("#presentationblock #communityNews").data("id");
      var postPerPage = "5";
      var postYear = jQuery("#presyear-list :selected").text();
      if (postYear === "Year") {
        postYear = "";
      }
      ajaxPresentationFilter(pageNumber, category, postPerPage, postYear);
    }
  );
  jQuery("body").on("change", "#presyear-list", function(e) {
    e.preventDefault();
    var postYear = jQuery("#presyear-list :selected").text();
    var pageNumber = 1;
    var category = jQuery("#presentationblock #communityNews").data("id");
    var postPerPage = "5";
    if (postYear === "Year") {
      postYear = "";
    }
    ajaxPresentationFilter(pageNumber, category, postPerPage, postYear);
  });

  jQuery(".filter-outer #dk0-").text("All");
  jQuery(".filter-outer #dk1-").text("All");
  
    jQuery(".page-template-template-about .overview-class").addClass('open-overview');
    jQuery(".open-overview .collapsable-content").show();
    jQuery(".page-template-template-about .comp__collapse-block.overview-class").find(".button-text").text("Close");
    jQuery(".comp__collapse-block.overview-class .coll-trigger").click(function(){
        jQuery(".comp__collapse-block.overview-class").removeClass('open-overview');
    });
  
});
