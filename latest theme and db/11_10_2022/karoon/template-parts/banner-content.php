<?php
$heroBanner = count(get_field('hero_banner_settings',$post->ID));
if($heroBanner > 1){
if(have_rows('hero_banner_settings',$post->ID)){
?>
     <div class="homepage-new-banner owl-carousel">
    <?php
        while(have_rows('hero_banner_settings',$post->ID)){
            the_row();
            $heroBannerImageDesktop = get_sub_field('hero_banner_image_desktop');
            $heroBannerImageMobile = get_sub_field('hero_banner_image_mobile');
            $heroBannerContent = get_sub_field('hero_banner_content');
           // echo the_sub_field('hero_banner_content');?>
            <div class="item">
            <?php if ($heroBannerImageDesktop && $heroBannerImageDesktop != '') { ?>
    <div class="banner-img mobile-hide" style="background-image:url(<?php printf(__('%s', 'karoon'), $heroBannerImageDesktop['url']); ?>)"></div>
<?php } ?>

<?php if ($heroBannerImageMobile && $heroBannerImageMobile != '') { ?>
    <div class="banner-img mobile-show" style="background-image:url(<?php printf(__('%s', 'karoon'), $heroBannerImageMobile['url']); ?>)"></div>
<?php }else{ ?>
    <div class="banner-img mobile-show" style="background-image:url(<?php printf(__('%s', 'karoon'), $heroBannerImageDesktop['url']); ?>)"></div>
<?php } ?>

<div class="banner-content  animated fadeInLeftShort">       
    <?php if ($heroBannerContent && $heroBannerContent != '') { ?>
        <div class="container">
            <h1><?php printf(__('%s', 'karoon'), $heroBannerContent); ?></h1>
        </div>
    <?php } ?>
</div>
        </div>

    <?php }?>
        </div>
        <?php 
}
}else{
    $heroBannerArray = get_field('hero_banner_settings',$post->ID);
    $heroBannerImageDesktop = $heroBannerArray[0]['hero_banner_image_desktop'];
    $heroBannerImageMobile = $heroBannerArray[0]['hero_banner_image_mobile'];
    ?>
    <div class="banner-img mobile-hide" style="background-image:url(<?php printf(__('%s', 'karoon'), $heroBannerImageDesktop['url']); ?>)"></div>
    <div class="banner-img mobile-show" style="background-image:url(<?php printf(__('%s', 'karoon'), $heroBannerImageMobile['url']); ?>)"></div>
    <?php
}

