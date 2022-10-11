<?php
/* Template Name: What we do Template */

get_header();
$readMoreButtonLabel = get_field('read_more_button_label', 'option');
?>

<main>
    <section class="banner inner-banner karoon-inner-banner what-we-do-page">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>

    <section class="section sec-what-we-projects karoon-what-we-do-section">
        <div class="karoon-container">
            <h1 class="karoon-main-title"> <?php the_title(); ?>
            </h1>
            <div class="karoon-grid-wrapper"> <?php
                    $args = array(
                        'post_type'=>'project',
                        'orderby'=>'date',
                        'order'=>'asc',
                        'post_status' => 'publish');
                    $loop = new WP_Query($args);
                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) { 
                                $loop -> the_post(); 
                                $post_title = get_field('post_title'); ?>  
                                    <div class="karoon-grid-item-wrapper">
                                        <div class="karoon-grid-item">
                                            <div class="karoon-img-wrpper"><?php 
                                                if (has_post_thumbnail()) { ?>
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" /><?php 
                                                } else { ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/public/images/placeholder-image.jpg" alt="placeholder-image" /><?php
                                                } ?>
                                            </div>
                                            <div class="karoon-grid-inner">
                                                <div class="karoon-grid-inner-title">
                                                    <h2 class="karoon-grid-title"> <?php 
                                                            if ($post_title != '') {
                                                                echo $post_title;
                                                            } else {
                                                                the_title();
                                                            } ?>
                                                    </h2>
                                                </div> 
                                                <div class="karoon-grid-content">
                                                    <p><?php 
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
                                                <a href="<?php echo get_permalink(); ?>" class="karoon-arrow-btn" title="<?php echo __('Find out more', 'karoon'); ?>"><?php echo __('Find out more', 'karoon'); ?> <span>></span></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                        wp_reset_postdata();
                ?>
            </div>
        </div>
          
    </section>
</main>
<?php
get_footer();
?>
