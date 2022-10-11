<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package karoon
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/public/images/favicon.ico" />
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
        <script>
            var siteUrl = '<?php echo get_template_directory_uri(); ?>';
            var homeurl = '<?php echo site_url(); ?>';
            var readMore = '<?php printf(__('%s', 'karoon'), get_field('read_more_button_label', 'option')); ?>';
            var close = '<?php printf(__('%s', 'karoon'), get_field('close_button_label', 'option')); ?>';
            var readStory = '<?php printf(__('%s', 'karoon'), get_field('read_story_button_label', 'option')); ?>';
        </script>
    </head>

    <?php
    if (is_front_page()) {
        $class = "home-page";
    } else {
        $class = "inner-page";
    }

    if ((basename(get_page_template()) === 'page.php') || (basename(get_page_template()) === 'search.php')) {
        $searchClass = "border";
    } else {
        $searchClass = "";
    }
    ?>

    <body <?php body_class($class); ?>>
        <div class="wrapper">
            <header class="animatedParent animateOnce karoon-header <?php echo $searchClass; ?>">
                <div class="container">

                    <?php
                    $headerLogo = get_field('header_logo', 'option');
                    if ($headerLogo && $headerLogo != '') {
                        ?>
                        <a href="<?php printf(__('%s', 'karoon'), esc_url(home_url('/'))); ?>" title="<?php printf(__('%s', 'karoon'), bloginfo('title')); ?>" class="logo animated fadeInLeftShort">
                            <img src="<?php printf(__('%s', 'karoon'), $headerLogo['url']); ?>" alt="<?php _e('Karoon', 'karoon'); ?>">
                        </a>
                    <?php } ?>
                    <div class="header-mobile-btn">
                        <div class="search-wrap tablet-potrait-show">
                            <a href="#" title="<?php //printf(__('Search', 'karoon')); ?>">
                                <img class="desktop-img" src="<?php echo get_template_directory_uri(); ?>/public/images/search-blue.svg" alt="<?php _e('Search', 'karoon'); ?>" title="<?php printf(__('Search', 'karoon')); ?>">
                                <img class="mobile-img" src="<?php echo get_template_directory_uri(); ?>/public/images/search-gray.svg" alt="<?php _e('Search', 'karoon'); ?>" title="<?php printf(__('Search', 'karoon')); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/public/images/close.svg" alt="<?php _e('Close', 'karoon'); ?>" title="<?php printf(__('Close', 'karoon')); ?>"class="close-search">
                            </a>                    
                            <form role="search" method="get" action="<?php printf(__('%s', 'karoon'), esc_url(home_url('/'))); ?>">                           
                                <input type="search" class="form-control"  placeholder="<?php _e('Search', 'karoon'); ?>" value="<?php printf(__('%s', 'karoon'), get_search_query()); ?>" name="s" >                         
                                <input type="submit" class="search-btn btn" value="" >
                            </form>

                        </div>
                        <a href="#" title="" class="menu-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <div class="header-right">
                        <div class="nav-wrap">
                            <?php
                            wp_nav_menu(array(
                                'menu' => 'Languages',
                                'menu_class' => 'country-flag',
                                'container' => 'ul'
                            ));
                            ?>  

                            <div class="primary-menu-wrap">
                                <nav>                              
                                    <?php
                                    wp_nav_menu(array(
                                        'menu' => 'Primary Menu',
                                        'container' => false,
                                    ));
                                    ?>                             
                                </nav>
                                <div class="search-wrap">
                                    <a href="#" title="<?php //_e('Search', 'karoon'); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/public/images/search-blue.svg" alt="<?php _e('Search', 'karoon'); ?>" title="<?php _e('Search', 'karoon'); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/public/images/close.png" alt="<?php _e('Close', 'karoon'); ?>" title="<?php _e('Close', 'karoon'); ?>"class="close-search">
                                    </a>

                                    <form role="search" method="get" action="<?php printf(__('%s', 'karoon'), esc_url(home_url('/'))); ?>">                           
                                        <input type="search" class="form-control"  placeholder="<?php _e('Search', 'karoon'); ?>" value="<?php printf(__('%s', 'karoon'), get_search_query()); ?>" name="s" required="required">                         
                                        <input type="submit" class="search-btn btn" value="" >
                                    </form>                               
                                </div>
                            </div>
                        </div>
                        <?php
                        $stockDis = get_field('stock_display_shortcode', 'option');
                        if ($stockDis && $stockDis != '') {
                            ?>
                            <div class="header-share-price">
                                <?php  echo do_shortcode($stockDis);  ?>
                               
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </header>
            