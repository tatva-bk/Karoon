<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package karoon
 */
get_header(); ?>
<main id="main" class="site-main">

<?php 
   $page_heading = get_field('page_heading');
?>
<section class="banner inner-banner karoon-inner-banner cms-banner">
   <div class="banner-img">
      <img src="<?php echo get_template_directory_uri(); ?>/public/images/overview-banner.jpg" class="mobile-hide" alt="Banner image">
      <img src="<?php echo get_template_directory_uri(); ?>/public/images/overview-mobile-banner.jpg" class="mobile-show" alt="Banner image">
   </div>
   <div class="karoon-container sm">
      <div class="banner-content">
        <h1> <?php 
               if ($page_heading != '') {
                  echo $page_heading;
               } else {
                  the_title();
               } ?>
         </h1>
      </div>
   </div>
</section>
<section class="karoon-cms-content-wrapper">
   <?php 
   get_template_part('acf-page-builder/row'); ?>
</section>
</main>
<?php
get_footer();
?>
