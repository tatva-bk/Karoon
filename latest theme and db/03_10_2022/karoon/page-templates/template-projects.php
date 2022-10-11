<?php
/* Template Name: Project Template */

get_header();
$readMoreButtonLabel = get_field('read_more_button_label', 'option');
?>

<main>
    <section class="banner inner-banner">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>
    <section class="section sec__projects">
        <div class="container">
            <div class="row">
                <div class="col-12 page-title">
                    <h1><?php printf(__('%s', 'karoon'), the_title()); ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <?php                   
                    $query = new WP_Query(array('post_type' => 'project'));
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $projectShortContent = get_field('project_short_content', $post->ID);
                            ?>     
                            
                                <div class="comp__collapse-block">                                   
                                    <div class="coll-outer">
                                        <div class="coll-header sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ',','),array('-',""),strtolower(strstr(get_the_title(), ',', true))) ); ?>">
                                            <h2><?php printf(__('%s', 'karoon'), the_title()); ?></h2>
                                        </div>

                                        <div class="coll-body row">
                                            <div class="col-lg-9 col-md-8 col-sm-9 coll-body-left">

                                                <?php if (null != get_the_post_thumbnail_url($post->ID)) { ?>       
                                                    <div class="map-img-thumb mobile-show">
                                                        <img src="<?php printf(__('%s', 'karoon'), get_the_post_thumbnail_url($post->ID)); ?>" alt="">
                                                    </div>
                                                <?php } ?>

                                                <?php if ($projectShortContent && $projectShortContent != '') { ?>
                                                    <?php printf(__('%s', 'karoon'), $projectShortContent); ?>
                                                <?php } ?>
                                            </div>

                                            <?php if (null != get_the_post_thumbnail_url($post->ID)) { ?> 
                                                <div class="col-lg-3 col-md-4 col-sm-3 coll-body-right">
                                                    <div class="map-img-thumb mobile-hide">
                                                        <!-- Removed project-list size image -->
                                                        <img src="<?php printf(__('%s', 'karoon'), get_the_post_thumbnail_url($post->ID)); ?>" alt="">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="collapsable-content cms-content">
                                            <div class="col-sm-9">
                                            <?php 
                                            $project_detail_description = get_field('project_detail_description');
                                            if (have_rows('project_detail_description')) {
                                                while (have_rows('project_detail_description')) {
                                                    the_row();
                                            if (get_row_layout() == "content_block_section") {
                                                                $contentTitle = get_sub_field('content_title', $post->ID);
                                                                $contentDescription = get_sub_field('content_description', $post->ID);

                                                                if ($contentTitle && $contentTitle != '') {
                                                                    ?>
                                                                    <h5><?php printf(__('%s', 'karoon'), $contentTitle); ?></h5>
                                                                    <?php
                                                                }

                                                                if ($contentDescription && $contentDescription != '') {
                                                                    ?>
                                                                    <?php printf(__('%s', 'karoon'), $contentDescription); ?>
                                                                    <?php
                                                                }
                                                            }
                                                         }
                                                         }
                                                         
                                                         ?>
                                                            </div>
                                                    <?php// printf(__('%s', 'karoon'), the_content()); ?>
                                                    <div class="row content-outer image__grid-block img-content">
                                                    <?php
                                                    if (have_rows('project_detail_description')) {
                                                        // loop through the rows of data
                                                        while (have_rows('project_detail_description')) {
                                                            the_row();

                                                            if (get_row_layout() == "image_gallery_section") {
                                                               
                                                               $galleryImageRow = count(get_sub_field('project_gallery'));
                                                                //echo $galleryImageRow."debug";
                                                                if (have_rows('project_gallery')) {
                                                                    if($galleryImageRow == 1){
                                                                        $galleryImageClass = "col-sm-12";
                                                                    }
                                                                    else if($galleryImageRow == 2){
                                                                        $galleryImageClass = "col-sm-6";
                                                                    }
                                                                    else{
                                                                        $galleryImageClass = "col-sm-4";
                                                                    }
                                                                    while (have_rows('project_gallery')) {
                                                                        the_row();
                                                                        $projectImage = get_sub_field('project_image', $post->ID);
                                                                        ?>

                                                                        <?php
                                                                        if ($projectImage && $projectImage != '') {

                                                                            $image_url = $projectImage['sizes']['project'];
                                                                            ?>
                                                                            <div class="col-12 <?= $galleryImageClass;?> block">
                                                                            <div class="img-wrap">
                                                                            <!--Removed class article-images-wrap -->
                                                                            <a href="<?php printf(__('%s', 'karoon'), $projectImage['url']); ?>" title="" data-fancybox="gallery" class="">
                                                                                <img src="<?php printf(__('%s', 'karoon'), $projectImage['url']); ?>" alt="">
                                                                            </a>
                                                                        </div>
                                                                        </div>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            
                                                            ?>                                                                                                                                                
                                                            <?php
                                                        }
                                                    }
                                                    
                                                    ?>
                                                    </div>                                                      
                                                </div>

                                        </div>
                                        <?php if ($readMoreButtonLabel && $readMoreButtonLabel != '') { ?>
                                            <div class="bt-wrap">
                                            <?php if($project_detail_description){?>
                                                <a href="#" class="coll-trigger btn-toggle" data-text="<?php _e('Read more', 'karoon'); ?>">
                                                    <span class="button-text"><?php printf(__('%s', 'karoon'), $readMoreButtonLabel); ?></span>
                                                </a>
                                            <?php }?>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                       
                    <!-- Rig Photo Section -->
                    <?php   $riggalleryImageRow = count(get_field('rig_gallery'));
                            if (have_rows('rig_gallery')) { 
                    ?>
                            <div class="row content-outer image__grid-block img-content .rig-section">                                   
                            <?php if($riggalleryImageRow == 1){
                                    $riggalleryImageClass = "col-sm-12";
                                }
                                else if($riggalleryImageRow == 2){
                                    $riggalleryImageClass = "col-sm-6";
                                }
                                else{
                                    $riggalleryImageClass = "col-sm-4";
                                }
                                while (have_rows('rig_gallery')) {
                                    the_row();
                                    $rigImage = get_sub_field('rig_image', $post->ID);
                                    if ($rigImage && $rigImage != '') {
                                        $rigimage_url = $rigImage['sizes']['project'];
                                ?>     
                                        <div class="col-12 <?= $riggalleryImageClass;?> block">
                                            <div class="img-wrap">
                                                <!--Removed class article-images-wrap -->
                                                <a href="<?php printf(__('%s', 'karoon'), $rigImage['url']); ?>" title="" data-fancybox="gallery">
                                                    <img src="<?php printf(__('%s', 'karoon'), $rigImage['url']); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                            <?php   }
                                } ?>
                            </div>
                        <?php } ?>
                    <!-- Rig Photo Section -->
                                <?php                               
                            }
                        }
                        wp_reset_postdata();
                        wp_reset_query();
                        ?>    

                    </div>
                </div>
            </div>
    </section>
</main>
<?php
get_footer();
?>
