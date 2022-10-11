<?php 
   $pdf_link = get_field('pdf_link');
   if ($pdf_link != '') {
      header("Location: ".$pdf_link.""); 
      exit();
   }
?>

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
   $post_title = get_field('post_title');
?>
<section class="banner inner-banner karoon-inner-banner cms-banner">
   <div class="banner-img">
      <img src="<?php echo get_template_directory_uri(); ?>/public/images/overview-banner.jpg" class="mobile-hide" alt="Banner image">
      <img src="<?php echo get_template_directory_uri(); ?>/public/images/overview-mobile-banner.jpg" class="mobile-show" alt="Banner image">
   </div>
   <div class="karoon-container sm">
      <div class="banner-content">
        <h1> <?php 
               if ($post_title != '') {
                  echo $post_title;
               } else {
                  the_title();
               } ?>
         </h1>
      </div>
   </div>
</section>
<section class="karoon-cms-content-wrapper">
<div class="karoon-container sm">
   <?php 
   get_template_part('acf-page-builder/row'); ?>
</div>
</section>
</main>
<?php
get_footer();
?>
