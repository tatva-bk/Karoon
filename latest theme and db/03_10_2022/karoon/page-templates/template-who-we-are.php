<?php
/* Template Name: Who we are Template */

get_header();

?>

<main class="inner-page">
    <section class="banner inner-banner karoon-inner-banner ">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>

    <?php 
        $page_heading = get_field('page_heading');
    ?>
    <section class="section sec-about-content-brief karoon-who-we-are-section">
        <div class="karoon-container">
            <h1 class="karoon-main-title"><?php 
                    if ($page_heading != '') {
                        echo $page_heading;
                    } else {
                        the_title();
                    } ?>
            </h1>
            <div class="karoon-grid-wrapper"> <?php
                    $args = array(
                        'post_type'=>'about-us-detail',
                        'orderby'=>'date',
                        'order'=>'desc',
                        'post_status' => 'publish');
                    $loop = new WP_Query($args);
                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) { 
                                $loop -> the_post(); 
                                $page_heading = get_field('page_heading'); ?>  
                                    <div class="karoon-grid-item-wrapper">
                                        <div class="karoon-grid-item">
                                            <div class="karoon-img-wrpper"> <?php 
                                                    if (has_post_thumbnail()) { ?>
                                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" /> <?php 
                                                    } else { ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/public/images/placeholder-image.jpg" alt="placeholder-image" /> <?php
                                                    } ?>
                                            </div>
                                            <div class="karoon-grid-inner">
                                                <div class="karoon-grid-inner-title">
                                                    <h2 class="karoon-grid-title"> <?php 
                                                            if ($page_heading != '') {
                                                                echo $page_heading;
                                                            } else {
                                                                the_title();
                                                            } ?>
                                                    </h2>
                                                </div> 
                                                <div class="karoon-grid-content">  
                                                    <p> <?php 
                                                            $text = get_the_content();
                                                            if (str_word_count($text, 0) > 13) {
                                                                $words = str_word_count($text, 2);
                                                                $pos   = array_keys($words);
                                                                $text  = substr($text, 0, $pos[13]) .'...';
                                                                echo $text;
                                                            } else {
                                                                echo $text;
                                                            } ?>
                                                    </p>
                                                </div>  
                                                <a href="<?php echo get_permalink(); ?>" class="karoon-arrow-btn" title="<?php echo __('Find out more', 'karoon'); ?>"><?php echo __('Find out more', 'karoon'); ?> <span>></span></a>
                                            </div>
                                        </div>
                                    </div> <?php
                            }
                        }
                        wp_reset_postdata(); ?>
            </div>
        </div>          
    </section>
    
    <?php 
        $team_section_heading = get_field('team_section_heading');
    ?>
    <section class="karoon-directors-team">
        <div class="karoon-container">
            <h2 class="with-border"><?php echo $team_section_heading; ?></h2>
            <div class="karoon-grid-wrapper"> <?php
                $content_text_heading = get_field('content_text_heading'); ?> <?php
                    $args = array(
                        'post_type'=>'team',
                        'orderby'=>'date',
                        'order'=>'asc',
                        'post_status' => 'publish');
                    $loop = new WP_Query($args);
                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) { 
                                $loop -> the_post();
                                $member_designation = get_field('member_designation');
                                $member_qualification = get_field('member_qualification'); 
                                $team_name_heading = get_field('team_name_heading'); ?>  
                                    <div class="karoon-grid-item-wrapper">
                                        <div class="karoon-grid-item">
                                            <div class="karoon-img-wrpper"> <?php 
                                                    if (has_post_thumbnail()) { ?>
                                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" /> <?php 
                                                    } else { ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/public/images/placeholder-image.jpg" alt="placeholder-image" /> <?php
                                                    } ?>
                                            </div>
                                            <div class="karoon-grid-inner">
                                                <div class="karoon-grid-inner-equal">
                                                    <h3 class="karoon-grid-title"> <?php 
                                                            if ($team_name_heading != '') {
                                                                echo $team_name_heading;
                                                            } else {
                                                                the_title();
                                                            } ?>
                                                    </h3>
                                                    <span class="grid-designation"><?php echo $member_qualification; ?></span>
                                                    <div class="karoon-grid-content">
                                                        <p class="small-text"><?php echo $member_designation; ?></p>
                                                    </div>
                                                </div>
                                                <a href="<?php echo get_permalink(); ?>" class="karoon-arrow-btn" title="<?php echo __('Find out more', 'karoon'); ?>"><?php echo __('Find out more', 'karoon'); ?> <span>></span></a>
                                            </div>
                                        </div>
                                    </div> <?php
                            }
                        }
                        wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();