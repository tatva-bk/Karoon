jQuery(document).ready(function(){

      jQuery(".about-sub-content").each(function(){
            var _this = jQuery(this).find(".read-more-less");
            _this.on("click", function(){
                  jQuery(this).parents(".about-sub-content").toggleClass("read-more-content");
            })
      })
      jQuery('.cms-content p a.click-scroll').on("click", function(e){
            e.preventDefault();
            var hash = jQuery(this).attr("href"), 
            url = hash.substring(hash.indexOf('#'));
            jQuery(url).parents(".comp__collapse-block").find(".coll-trigger").click();
      })

})