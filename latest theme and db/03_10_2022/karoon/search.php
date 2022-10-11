<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package karoon
 */

get_header();

global $wp_query;
?>
<?php
    $searchTitle = get_field('search_title', 'option'); 
    $searchResultTitle = get_field('result_found_title', 'option'); 
    $notFound_Title = get_field('search_not_found_title', 'option');
?>
<main>
    <section class="section search_results">
        <div class="container">
            
            <?php if (have_posts()){ ?>
                <div class="row">
                    <?php if($searchTitle && $searchTitle != ''){ ?>
                        <div class="col-12 page-title">
                            <h1><?php printf(__('%s', 'karoon'), $searchTitle); ?></h1>
                        </div>
                    <?php } ?>
                </div>  
            <?php } else{ ?>
                <div class="row">
                    <?php if($notFound_Title && $notFound_Title != ''){ ?>
                        <div class="col-12 page-title">
                            <h1><?php printf(__('%s', 'karoon'), $notFound_Title); ?></h1>
                        </div>
                    <?php } ?>
                </div>
            
            <?php } ?>
            <div class="row">
                <div class="col-12">
                    
                    <?php if (have_posts()) { ?>
                        <?php if($searchResultTitle && $searchResultTitle != ''){ ?>
                            <h5><?php printf(__('%s', 'karoon'), $wp_query->post_count); ?> <?php printf(__('%s', 'karoon'), $searchResultTitle); ?></h5>  
                        <?php } ?>
                    <?php } ?>
                        
                    <?php if (have_posts()){ ?>
                        <?php
                        /* Start the Loop */
                        while (have_posts()){
                            the_post();                            
                            get_template_part('template-parts/content', 'search');
                        } ?>
                </div>
            </div>
        </div>

        <?php
        }else {
            get_template_part('template-parts/content', 'none');
        }
        ?>
    </section><!-- Ends section -->
</main><!-- Ends main -->

<?php
get_footer();
