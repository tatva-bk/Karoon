<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karoon
 */
?>

<div class="search_result_outer">

    <?php
    $categories = get_the_category($post->ID);
    ?>

    <?php if (($post->post_type == "post") && ($categories[0]->term_id == 17)) { ?>        
        <?php the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink(get_page_by_path('Community News')))), '</a></h2>'); ?>
    <?php } elseif (($post->post_type == "post") && ($categories[0]->term_id == 18)) {
        $pdflink = get_field('pdf_link');
        if($pdflink){
            the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url($pdflink)), '</a></h2>');
        }else{
            the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink(get_page_by_path('Investors')))), '</a></h2>'); 
        }
    ?>
    <?php } elseif (($post->post_type == "post") && ($categories[0]->term_id == 19)) { 
        $pdflink = get_field('pdf_link');
        if($pdflink){
            the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url($pdflink)), '</a></h2>');
        }else{
            the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink(get_page_by_path('Investors')))), '</a></h2>'); 
        }
    ?>
    <?php } elseif ($post->post_type == "project") { ?>        
        <?php the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink(get_page_by_path('Projects')))), '</a></h2>'); ?>
    <?php } elseif ($post->post_type == "team") { ?>   
        <?php the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink(get_page_by_path('About')))), '</a></h2>'); ?>
    <?php } else {
        $pdflink = get_field('pdf_link');
        if($pdflink){
            the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url($pdflink)), '</a></h2>');
        }else{
         the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); 
        } ?>
    <?php } ?>

    <p>
        <?php printf(__('%s', 'karoon'), the_excerpt()); ?>
    </p>
</div>
