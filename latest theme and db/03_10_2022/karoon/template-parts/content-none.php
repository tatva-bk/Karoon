<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karoon
 */

?>

<div class="search_result_outer">
    <div class="page-content">
        <?php if ( is_search() ) { ?>
            <?php   $searchNotFoundText = get_field('search_not_found_text', 'option');                   
                if($searchNotFoundText && $searchNotFoundText != ''){ ?>
                    <h5><?php printf(__('%s', 'karoon'), $searchNotFoundText); ?></h5>
                <?php } ?>
        <?php } ?>
    </div><!-- .page-content -->
</div>

