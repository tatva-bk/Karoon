<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karoon
 */
?>

<div class="row">
    <div class="col-12">
        <div class="cms-content">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    printf(__('%s', 'karoon'), the_content());
                }
            }
            ?>
        </div>
    </div>
</div>