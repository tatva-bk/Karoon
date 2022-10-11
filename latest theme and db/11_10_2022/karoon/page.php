<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karoon
 */
get_header();
?>

<main>
    <section class="section terms_condition">
        <div class="container">
            <div class="row">
                <div class="col-12 page-title">
                    <h1><?php printf(__('%s', 'karoon'), get_the_title($post->ID)); ?></h1>
                </div>
            </div>            
            <?php get_template_part('template-parts/content', 'page'); ?>          
        </div>
    </section>
</main>

<?php
get_footer();
