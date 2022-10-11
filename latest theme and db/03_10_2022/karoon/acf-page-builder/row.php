<?php
/**
 * ACF page Builder Template part for display All different Layouts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karoon
 */
?>

    <?php if (have_rows('about_sections')) {
            while (have_rows('about_sections')) { the_row();
                switch (get_row_layout()) {
                    case 'content_block' : get_template_part('acf-page-builder/who-we-are-modules/content-block');
                        break;  
                    case 'image_section' : get_template_part('acf-page-builder/who-we-are-modules/image-section');
                        break; 
                    case 'table_structure' : get_template_part('acf-page-builder/who-we-are-modules/table-structure');
                        break;       
                }
            }
    } ?>

    <?php if (have_rows('what_we_do_section')) {
            while (have_rows('what_we_do_section')) { the_row();
                switch (get_row_layout()) {
                    case 'image_or_content' : get_template_part('acf-page-builder/what-we-do-modules/image-or-content');
                        break;  
                    case 'image_with_caption' : get_template_part('acf-page-builder/what-we-do-modules/image-with-caption');
                        break; 
                    case 'large_image' : get_template_part('acf-page-builder/what-we-do-modules/large-image');
                        break;  
                    case 'table_wrapper' : get_template_part('acf-page-builder/what-we-do-modules/table-wrapper');
                        break;     
                    case 'image_section' : get_template_part('acf-page-builder/what-we-do-modules/image-section');
                        break; 
                }
            }
    } ?>

    <?php if (have_rows('sustainability_sections')) {
            while (have_rows('sustainability_sections')) { 
                 the_row();
                switch (get_row_layout()) {
                    case 'content_block' : get_template_part('acf-page-builder/sustainability-modules/content-block');
                        break;  
                    case 'image_section' : get_template_part('acf-page-builder/sustainability-modules/image-section');
                        break; 
                    case 'image_with_caption' : get_template_part('acf-page-builder/sustainability-modules/image-with-caption');
                        break;       
                }
            }
    } ?>
    
