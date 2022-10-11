<?php
/* Template Name: Sustainability New Template */
get_header();
$readMoreButtonLabel = get_field('read_more_button_label', 'option');
?>
<main clas="inner-page">
    <section class="banner inner-banner karoon-inner-banner sustainability-banner">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>

    <?php 
        $content_heading = get_field('content_heading');
        $page_content = get_field('page_content');
        $page_heading = get_field('page_heading');
    ?>
    <section class="section sec-sustainability-content">
        <div class="karoon-container">
            <h1 class="karoon-main-title"> <?php 
                    if ($page_heading != '') {
                        echo $page_heading;
                    } else {
                        the_title();
                    } ?>
            </h1>
            <?php if ($content_heading != '' || $page_content != '') { ?>
                <div class="content-block">
                    <h2 class="with-border"><?php echo $content_heading; ?></h2>
                    <?php echo $page_content; ?>
                </div>
            <?php } ?>
            <div class="karoon-grid-wrapper"> <?php
                    $args = array(
                        'post_type'=>'sustain-values',
                        'orderby'=>'date',
                        'order'=>'asc',
                        'post_status' => 'publish');
                    $loop = new WP_Query($args);
                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) {
                                $loop -> the_post();
                                $post_title = get_field('post_title'); 
                                $pdf_link = get_field('pdf_link'); ?>  
                                    <div class="karoon-grid-item-wrapper">
                                        <div class="karoon-grid-item">
                                            <div class="karoon-img-wrpper"> <?php 
                                                if ( has_post_thumbnail() ) { ?>
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" /><?php 
                                                } else { ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/public/images/placeholder-image.jpg" alt="placeholder-image" /><?php
                                                } ?>
                                            </div>
                                            <div class="karoon-grid-inner">
                                                <div class="karoon-grid-inner-title">
                                                    <h3 class="karoon-grid-title"><?php 
                                                            if ($post_title != '') {
                                                                echo $post_title;
                                                            } else {
                                                                the_title();
                                                            } ?>
                                                    </h3>
                                                </div>
                                                <div class="karoon-grid-content">
                                                    <p> <?php 
                                                        $text = get_the_content();
                                                        if (str_word_count($text, 0) > 12) {
                                                            $words = str_word_count($text, 2);
                                                            $pos   = array_keys($words);
                                                            $text  = substr($text, 0, $pos[12]) .'...';
                                                            echo $text;
                                                        } else {
                                                            echo $text;
                                                        } ?>
                                                    </p>
                                                </div>
                                                <?php if ($pdf_link != '') { ?>
                                                    <a href="<?php echo $pdf_link; ?>" class="karoon-arrow-btn" target="_blank" title="<?php echo __('Find out more', 'karoon'); ?>"><?php echo __('Find out more', 'karoon'); ?> <span>&gt;</span></a> <?php
                                                } else { ?>
                                                    <a href="<?php echo get_permalink(); ?>" class="karoon-arrow-btn" title="<?php echo __('Find out more', 'karoon'); ?>"><?php echo __('Find out more', 'karoon'); ?> <span>&gt;</span></a> <?php
                                                } ?>
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
