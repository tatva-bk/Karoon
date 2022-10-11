<?php
/* Template Name: Community News Template */

get_header();
$newsTitle = get_field('news_section_title', $post->ID);
$galleryTitle = get_field('gallery_title', $post->ID);
$mediaTitle = get_field('media_section_title', $post->ID);
$mediaImage = get_field('media_image', $post->ID);
$mediaIUrl = get_field('media_video_link', $post->ID);
$yearBtn = get_field('year_button_label', 'option');
$readStoryBtn = get_field('read_story_button_label', 'option');


function karoon_paginate_links( $args = '' ) {
    global $wp_query, $wp_rewrite;
 
    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );
 
    // Get max pages and current page out of the current query, if available.
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
 
    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';
 
    // URL base depends on permalink settings.
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
 
    $defaults = array(
        'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format'             => $format, // ?page=%#% : %#% is replaced by the page number
        'total'              => $total,
        'current'            => $current,
        'aria_current'       => 'page',
        'show_all'           => false,
        'prev_next'          => true,
        'prev_text'          => __( '&laquo; Previous' ),
        'next_text'          => __( 'Next &raquo;' ),
        'end_size'           => 1,
        'mid_size'           => 2,
        'type'               => 'plain',
        'add_args'           => array(), // array of query args to add
        'add_fragment'       => '',
        'before_page_number' => '',
        'after_page_number'  => '',
    );
 
    $args = wp_parse_args( $args, $defaults );
 
    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }
 
    // Merge additional query vars found in the original URL into 'add_args' array.
    if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );
 
        // Find the query args of the requested URL.
        wp_parse_str( $url_parts[1], $url_query_args );
 
        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }
 
        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }
 
    // Who knows what else people pass in $args
    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 2;
    }
    $add_args = $args['add_args'];
    $r = '';
    $page_links = array();
    $dots = false;
    if($paged != 1){
           if ( 1 == $current ) {
            $page_links[] = "<span aria-current='" . esc_attr( $args['aria_current'] ) . "' class='page-numbers current'> First << </span>";
            $dots = true;
           }
            else {
                    $page_links[] =  '<a class="prev page-numbers" href="' . get_pagenum_link(1) . '"> First << </a>';
            }
    }
    if ( $args['prev_next'] && $current && 1 < $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args )
            $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];
 
        /**
         * Filters the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
    endif;
    for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
            $page_links[] = "<span aria-current='" . esc_attr( $args['aria_current'] ) . "' class='page-numbers current'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
            $dots = true;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args )
                    $link = add_query_arg( $add_args, $link );
                $link .= $args['add_fragment'];
 
                /** This filter is documented in wp-includes/general-template.php */
                $page_links[] = "<a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a>";
                $dots = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';
                $dots = false;
            endif;
        endif;
    endfor;
    if ( $args['prev_next'] && $current && $current < $total ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args )
            $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];
 
        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
    endif;
     if($paged != $total){
                    if ( $total == $current ) {
            $page_links[] = "<span aria-current='" . esc_attr( $args['aria_current'] ) . "' class='page-numbers current'> >> Last</span>";
            $dots = true;
           }
            else {
      $page_links[] = '<a class="next page-numbers" href="' . get_pagenum_link($total) . '"> >> Last </a>';
            }
    }
    switch ( $args['type'] ) {
        case 'array' :
            return $page_links;
 
        case 'list' :
            $r .= "<ul class='page-numbers'>\n\t<li>";
            $r .= join("</li>\n\t<li>", $page_links);
            $r .= "</li>\n</ul>\n";
            break;
 
        default :
            $r = join("\n", $page_links);
            break;
    }
    return $r;
}


?>
<main>

    <section class="banner inner-banner">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>

    <section class="section sec__news">
        <div class="container">
            <div class="row">
                <?php if ($newsTitle && $newsTitle != '') { ?>
                <div class="col-12 page-title">
                    <h1><?php printf(__('%s', 'karoon'), get_the_title($post->ID)); ?></h1>
                </div>
                <?php }?>
            </div>
            <!--<div class="row content-block filter-box">

                <?php if ($newsTitle && $newsTitle != '') { ?>
                    <div class="col-12 sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ', ','), array('-', ""), strtolower($newsTitle))); ?>">
                        <h2><?php printf(__('%s', 'karoon'), $newsTitle); ?></h2>
                    </div>
                <?php } ?>

                <div class="filter-outer">
                    <select class="custom_dropdown small" id="commyear-list">
                        <?php if ($yearBtn && $yearBtn != '') { ?>
                            <option value=""><?php printf(__('%s', 'karoon'), $yearBtn); ?></option>                            
                        <?php } ?>
                        <?php wp_get_archives(array('type' => 'yearly', 'format' => 'option', 'post_type' => 'post')); ?>
                    </select>
                </div>
            </div>-->

            <?php
            if (get_field("community_news", $post->ID)) {
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $newsCategory = get_field("community_news", $post->ID);
                $argsNews = array('posts_per_page' => 2, 'paged' => $paged,'cat' => $newsCategory);
                $catQuery = new WP_Query($argsNews);
                ?>
                <div id="loader" style="display:none;"><img src="<?php echo get_template_directory_uri(); ?>/public/images/loader.gif" alt="" /> </div>
                <div id="communityNews" class="communityBlock communitySubtitle" data-id="<?php echo $newsCategory ?>">

                    <div class="row content-block">
                        <div class="col-12">
                            <?php
                            $catQueryPostCount = $catQuery->post_count;
                            if ($catQuery->have_posts()) {
                               $countPost = 1;
                                while ($catQuery->have_posts()) {
                                    $catQuery->the_post();
                                    if($countPost % 2==0 || $catQueryPostCount == 1){
                                        $lastPostClass = "no-border-post";
                                    }
                                    ?>

                                    <div class="comp__collapse-block news-article <?=$lastPostClass ? $lastPostClass: ''?>">
                                        <div class="coll-outer">
                                            <div class="coll-body">
                                                <div class="row pad-0">
                                                    <div class="col-12">
                                                        <h5><?php printf(__('%s', 'karoon'), get_the_title($catQuery->ID)); ?></h5>
                                                        <span><?php printf(__('%s', 'karoon'), the_time('l, F d, Y')); ?></span>
                                                        <div class="community-content">
                                                            <?php printf(__('%s', 'karoon'), the_content()); ?>

                                                            <?php if (have_rows('image_gallery')) { ?>
                                                                <div class="image-gallery row clearfix">
                                                                    <?php
                                                                    while (have_rows('image_gallery')) {
                                                                        the_row();
                                                                        $imageArray = get_sub_field("image");
                                                                        ?>
                                                                        <a href="<?php echo $imageArray['url']; ?>" data-fancybox="news-gallery<?php echo $catQuery->ID . "-" . $countGal; ?>" class="article-images-wrap col-md-3 col-sm-6 col-12">
                                                                            <img src="<?php echo $imageArray['sizes']['gallery']; ?>" alt="">
                                                                        </a>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <?php      
                                    $countPost++;                             
                                }
                                wp_reset_query();
                                wp_reset_postdata();
                            }
                            ?>

                        </div>
                    </div>
                    
                <?php } ?>
            </div>
        </div>

        <?php
        if (get_field("full_width_image", $post->ID)) {
            $fulImageDesktop = get_field("full_width_image", $post->ID);
            $fulImageMobile = get_field("full_width_image_for_mobile", $post->ID);
            ?>
            <div class="comp__image-separator no-border-section" id="communityNewsImage">
                <div class="img-wrap">                    
                        <img src="<?php echo $fulImageDesktop['url']; ?>" alt="" class="mobile-hide">
                    <?php if (get_field("full_width_image", $post->ID)) { ?>
                        <img src="<?php echo $fulImageMobile['url']; ?>" alt="" class="mobile-show">    
                    <?php }else { ?>
                        <img src="<?php echo $fulImageDesktop['url']; ?>" alt="" class="mobile-show"> 
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="container" id="communityNewsPagination">
        <div class="row content-block">
            <div class="col-12 communityBlock">
                
            <?php
            /*$big = 999999999; // need an unlikely integer
            // $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string
            echo $page_format = karoon_paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $catQuery->max_num_pages,
                'prev_next' => false,                          
                'type' =>'list'
            ));*/
            ?>
                <?php                            
                $max = intval($catQuery->max_num_pages);
                
                // Custom Pagination
                echo numeric_pagination($max, $catQuery);
                ?>

            </div>
        </div>
        </div>
        <!--<div class="container">
            <div class="row content-block sec__gallery">
                <div class="col-12 sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ', ','), array('-', ""), strtolower($galleryTitle))); ?>">

                    <?php if ($galleryTitle && $galleryTitle != '') { ?>
                        <h2><?php printf(__('%s', 'karoon'), $galleryTitle); ?></h2>
                    <?php } ?>

                    <?php
                    if (have_rows('gallery')) {
                        $countGalimg = 1;

                        while (have_rows('gallery')) {
                            the_row();
                            $blockTitle = get_sub_field("title", $post->ID);

                            if ($blockTitle && $blockTitle != '') {
                                ?>    
                                <h3><?php printf(__('%s', 'karoon'), $blockTitle); ?></h3>
                                <?php
                            }

                            if (have_rows('image_block')) {
                                $countGalimg2 = 1;

                                if ($countGalimg == 1) {
                                    $openClass = " open";
                                } else {
                                    $openClass = "";
                                }
                                ?>

                                <div class="mobile-accordion comp__collapse-block <?php echo $openClass; ?>">                                                                  
                                    <div class="image-gallery row accordion-body">
                                        <?php
                                        while (have_rows('image_block')) {
                                            the_row();
                                            $smallImage = get_sub_field("image");
                                            ?>
                                            <a href="<?php echo $smallImage['url']; ?>" data-fancybox="news-gallery-<?php echo $countGalimg; ?>" class="article-images-wrap col-md-3 col-sm-6 col-12">
                                                <img src="<?php echo $smallImage['sizes']['gallery']; ?>" alt="">
                                            </a>
                                            <?php
                                            $countGalimg2 = $countGalimg2 + 1;
                                        }
                                        ?>

                                    </div>
                                    
                                    <?php $viewImagesButtonLabel = get_field('view_images_button_label', 'option'); ?>
                                    <?php if($viewImagesButtonLabel && $viewImagesButtonLabel != ''){  ?>
                                        <div class="bt-wrap mobile-show">
                                            <a href="#" class="coll-trigger btn-toggle" data-text="View Images">
                                                <span class="button-text"><?php printf(__('%s', 'karoon'), $viewImagesButtonLabel); ?></span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    
                                    
                                </div>
                                <?php
                            }
                            $countGalimg = $countGalimg + 1;
                        }
                    }
                    ?> 


                </div>
            </div>

            <div class="row content-block sec__video-gallery">
                <div class="col-12 sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ', ','), array('-', ""), strtolower($mediaTitle))); ?>">
                    <?php if ($mediaTitle && $mediaTitle != '') { ?>
                        <h2><?php printf(__('%s', 'karoon'), $mediaTitle); ?></h2>
                    <?php } ?>
                 
                        <div class="mobile-accordion comp__collapse-block with-border">
                             <?php
                            if (have_rows('media_section')) { ?>
                                <div class="video-gallery row accordion-body">
                                    <?php while (have_rows('media_section')) {
                                            the_row();
                                            $mediaUrl = get_sub_field("video_link");
                                            $mediaImg = get_sub_field("video_image");
                                            if ($mediaIUrl && $mediaIUrl != '') {
                                        ?>
                                    <a data-fancybox data-width="640" data-height="360" href="<?php echo $mediaIUrl; ?>" class="article-video-wrap col-sm-6 col-12">
                                        <img src="<?php echo $mediaImg['sizes']['media-video']; ?>" alt="">
                                    </a>
                                    <?php } } ?>
                                </div>
                            
                                <div class="bt-wrap mobile-show">
                                    <a href="#" class="coll-trigger btn-toggle" data-text="View Media">
                                        <span class="button-text">View Media</span>
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                        
                </div>
            </div>
        </div>-->
    </section>
</main>

<?php
get_footer();
