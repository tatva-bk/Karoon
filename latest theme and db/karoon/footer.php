<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package karoon
 */
?>

</div><!-- End of content -->	 

<?php
$footerCopyrightText = get_field('footer_copyright_text', 'option');
$termsAndCondition = get_field('terms_and_condition', 'option');
$footerLogo = get_field('footer_logo', 'option');
?>

<footer class="karoon-footer">
    <a href="#" title="<?php _e('Scroll Top', 'karoon'); ?>" class="top-scroll-btn">
        <i><img src="<?php echo get_template_directory_uri(); ?>/public/images/top-arrow.svg" alt=""></i>
    </a>

    <div class="container clearfix">
        <ul>
            <?php if ($footerCopyrightText && $footerCopyrightText != '') { ?>
                <li><?php printf(__('%s', 'karoon'), $footerCopyrightText); ?></li>
            <?php } ?>

            <?php if ($termsAndCondition && $termsAndCondition != '') { ?>
                <li><a href="<?php printf(__('%s', 'karoon'), $termsAndCondition['url']); ?>" ><?php printf(__('%s', 'karoon'), $termsAndCondition['text']); ?></a></li>
            <?php } ?>                    
        </ul>

        <?php if ($footerLogo && $footerLogo != '') { ?>
            <a href="<?php printf(__('%s', 'karoon'), esc_url(home_url('/'))); ?>" title="<?php printf(__('%s', 'karoon'), bloginfo('title')); ?>" class="footer-logo">
                <img src="<?php printf(__('%s', 'karoon'), $footerLogo['url']); ?>" alt="">
            </a>
        <?php } ?>            
    </div>
</footer>

<?php
wp_footer();
?>
</body>
</html>