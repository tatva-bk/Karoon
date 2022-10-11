<?php
/* Template Name: Sustainability Template */
get_header();
$readMoreButtonLabel = get_field('read_more_button_label', 'option');
?>
<main>
    <section class="banner inner-banner">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>
    <section class="section sec__sustainability">
        <div class="container">
            <div class="row">
                <div class="col-12 page-title">
                    <h1><?php printf(__('%s', 'karoon'), get_the_title($post->ID)); ?></h1>
                </div>
            </div>
        </div>
        <?php
        if (have_rows('content_block_settings')) {
            $j = 0;
            while (have_rows('content_block_settings')) {
                the_row();
                $mainTitle = get_sub_field('main_title', $post->ID);
                $mainContent = get_sub_field('main_content', $post->ID);
                $mainImage = get_sub_field('main_image', $post->ID);
                $mainContentBackgroundColor = get_sub_field('main_content_background_color', $post->ID);
                if ($mainImage) {
                    if ($mainContentBackgroundColor) {
                        ?>
                        <style>
                            #comp__collapse-blockmain-<?= $j; ?>.open{
                                background : <?php echo $mainContentBackgroundColor; ?>!important;
                                color : #fff;
                            }
                            #comp__collapse-blockmain-<?= $j; ?>.open h2{
                                border-top-color: <?php echo $mainContentBackgroundColor; ?>!important;
                                color : #fff;
                            }
                            #comp__collapse-blockmain-<?= $j; ?>.open .coll-trigger {
                                color: #fff;
                                border-color: #fff;
                            }
                            #comp__collapse-blockmain-<?= $j; ?>.open .coll-trigger::after {
                                background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/plus-icon-white.svg);
                            }


                        </style>
                    <?php } ?>
                    <div class="comp__collapse-block sec-title root-title" id="comp__collapse-blockmain-<?= $j; ?>">
                        <div class="container">
                            <div class="row">
                                <div class="coll-outer pad-15">
                                    <?php if ($mainTitle && $mainTitle != '') { ?>
                                        <div class="coll-header sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ', ','), array('-', ""), strtolower($mainTitle))); ?>">
                                            <h2><?php printf(__('%s', 'karoon'), $mainTitle); ?></h2>
                                        </div>
                                    <?php } ?>
                                    <div class="coll-body row">
                                        <div class="col-12 cms-content">
                                            <?php printf(__('%s', 'karoon'), $mainContent); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapsable-content">

                            <?php if ($mainImage) { ?>
                                <div class="img-wrap">
                                    <img src="<?php printf(__('%s', 'karoon'), $mainImage['url']); ?>" alt="">
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ($mainImage) { ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col bt-wrap text-center">
                                        <a href="#" class="coll-trigger btn-toggle" data-text="Read more">
                                            <span class="button-text"><?php printf(__('%s', 'karoon'), 'Read More'); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else {
                    ?>

                    <div class="content-block">
                        <div class="container">
                            <?php if ($mainTitle && $mainTitle != '') { ?>
                                <div class="row">
                                    <div class="col-12 sec-title root-title" id="society">
                                        <h2>
                                            <?php printf(__('%s', 'karoon'), $mainTitle); ?>
                                        </h2>
                                        <?php if ($mainContent && $mainContent != '') { ?>  
                                            <p><?php printf(__('%s', 'karoon'), $mainContent); ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <?php
                if (have_rows('sub_content')) {
                    $i = 0;
                    while (have_rows('sub_content')) {
                        the_row();
                        $subContentTitle = get_sub_field('sub_content_title', $post->ID);
                        $subContentIimage = get_sub_field('sub_content_full_width_image', $post->ID);
                        $subContentReadLess = get_sub_field('sub_content_read_less', $post->ID);
                        $subContentReadMore = get_sub_field('sub_content_read_more', $post->ID);
                        $subContentBgColor = get_sub_field('sub_content_background_color', $post->ID);
                        $subFullContentBgColor = get_sub_field('full_section_background_color', $post->ID);
                        if ($subContentBgColor) {
                            ?>
                            <style>
                                #comp__collapse-block-<?= $i . $j; ?>.open{
                                    background : <?php echo $subContentBgColor; ?>!important;                                   
                                    color : #fff;
                                }                                
                                #comp__collapse-block-<?= $i . $j; ?>.open h2{
                                    border-top-color: <?php echo $subContentBgColor; ?>!important;
                                    color : #fff;
                                }
                                #comp__collapse-block-<?= $i . $j; ?>.open .coll-trigger {
                                    color: #fff;
                                    border-color: #fff;
                                }
                                #comp__collapse-block-<?= $i . $j; ?>.open .coll-trigger::after {
                                    background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/plus-icon-white.svg);
                                }
                                
                                <?php if($subFullContentBgColor[0] == "yes") { ?>
                                #comp__collapse-block-<?= $i . $j; ?>{
                                    background : <?php echo $subContentBgColor; ?>!important;                                   
                                    color : #fff;
                                }                                
                                #comp__collapse-block-<?= $i . $j; ?> h2{
                                    border-top-color: <?php echo $subContentBgColor; ?>!important;
                                    color : #fff;
                                }
                                #comp__collapse-block-<?= $i . $j; ?> .coll-trigger {
                                    color: #fff;
                                    border-color: #fff;
                                }
                                #comp__collapse-block-<?= $i . $j; ?> .coll-trigger::after {
                                    background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/plus-icon-white.svg);
                                }
                                <?php } ?>

                            </style>
                            <?php
                        }
                        $countRowImage = count(get_sub_field('sub_content_image_repeater', $post->ID));
                        //echo $countRowImage."debug";
                        ?>
                        <div class="comp__collapse-block" id="comp__collapse-block-<?= $i . $j; ?>">
                            <div class="container">
                                <div class="row">
                                    <div class="coll-outer pad-15 <?php echo $countRowImage > 1 ? 'image__grid-block' : '' ?>">
                                        <?php if ($subContentTitle && $subContentTitle != '') { ?>
                                            <div class="coll-header sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ', ',',':'), array('-', "",""), strtolower($subContentTitle))); ?>">
                                                <div class="row">
                                                    <?php if (have_rows('sub_content_image_repeater')) {
                                                        while (have_rows('sub_content_image_repeater')) {
                                                            the_row();
                                                            $sub_content_row_image = get_sub_field('sub_content_row_image', $post->ID);
                                                            if ($countRowImage == 1) {
                                                                $subImgRowClass = "col-sm-12";
                                                            } else if ($countRowImage == 2) {
                                                                $subImgRowClass = "col-sm-6";
                                                            } else {
                                                                $subImgRowClass = "col-sm-4";
                                                            }
                                                            ?>
                                                            <div class="<?= $subImgRowClass; ?> block">
                                                                <img src="<?php printf(__('%s', 'karoon'), $sub_content_row_image['url']); ?>" alt="" class="img-responsive">
                                                            </div>
                                                        <?php }
                                                      }
                                                    ?>
                                                </div>
                                                <h2 class="<?php echo $countRowImage > 1? 'no-border':'';?>"><?php printf(__('%s', 'karoon'), $subContentTitle); ?></h2>
                                            </div>
                                        <?php } ?>
                                        <div class="coll-body row">
                                            <div class="col-12 cms-content">
                                                <?php printf(__('%s', 'karoon'), $subContentReadLess); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapsable-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col cms-content">
                                            <?php printf(__('%s', 'karoon'), $subContentReadMore); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($subContentIimage && $subContentIimage != '') { ?>
                                    <div class="img-wrap">
                                        <img src="<?php printf(__('%s', 'karoon'), $subContentIimage['url']); ?>" alt="">
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if ($readMoreButtonLabel && $readMoreButtonLabel != '' && $subContentReadMore || $subContentIimage) { ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col bt-wrap text-center">
                                            <a href="#" class="coll-trigger btn-toggle" data-text="Read more">
                                                <span class="button-text"><?php printf(__('%s', 'karoon'), $readMoreButtonLabel); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                        $i++;
                    }
                }
                $j++;
            }
        }
        ?>
        </div>


</main>

<?php
get_footer();
