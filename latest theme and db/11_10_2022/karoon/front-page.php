<?php
/* Template Name: Home Template */
get_header();
?>
<script>var locations = []; var locationscount = []; var locationsProject = [];</script>

<main>   
    <!-- Displaying banner content -->
    <section class="karoon-home-banner animatedParent animateOnce">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>

    <section class="home-page-news with-padding karoon-page-news">
        <div class="left-bg-image"></div>
        <div class="right-bg-image"></div>       
        <?php
        $investorNewsTitle = get_field('investor_news_title', $post->ID);        
        $investorNewsButtonLink = get_field('investor_news_button_link', $post->ID);
        $featureReportTitle = get_field('feature_report_title', $post->ID);
        $featureReportButtonLink = get_field('feature_report_link', $post->ID);
        $viewallButtonLabel = get_field('view_all_button_label', 'option');
        $learnMoreButtonLabel = get_field('learn_more_button_label', 'option');
        $mapTitle = get_field('map_title', $post->ID);
        $mapImage = get_field('homepage_map_image', $post->ID);
        ?>
        <div class="container">
            <div class="row">

                <!-- Start of Investor News Section -->
                    <div class="col-lg-6 col-sm-6"> 
                        <div class="investor-news">
                        <?php if ($investorNewsTitle && $investorNewsTitle != '') { ?>
                            <h3><?php printf(__('%s', 'karoon'), $investorNewsTitle); ?></h3>
                        <?php } ?>

                        <ul class="news-list animatedParent animateOnce" data-sequence='300'>
                            <?php
                            $counter = 1;                         
                                $query = new WP_Query(array('post_type' => 'post','category_name' => 'investor-news', 'posts_per_page' => 6));
                                if ($query->have_posts()) {                                     
                                    while ($query->have_posts()) {                                
                                        $query->the_post(); 
                                        $pdfLink = get_field('pdf_link', $post->ID); 
                                        $report_external_link = get_field("report_external_link", $post->ID);
                                ?>
                                        <?php if ($pdfLink && $pdfLink != '') { ?>
                                    <li class="animated fadeInDownShort" data-id='<?php echo $counter; ?>'>
                                        <h5>
                                            <a href="<?php printf(__('%s', 'karoon'), $pdfLink); ?>" target="_blank" title="<?php printf(__('%s', 'karoon'), the_title()); ?>"><?php printf(__('%s', 'karoon'), the_title()); ?></a>
                                        </h5>
                                        <p><?php printf(__('%s', 'karoon'), the_time('d/m/Y')); ?></p>
                                    </li>
									<?php } else if($report_external_link && $report_external_link!= '') { ?>
									<li class="animated fadeInDownShort" data-id='<?php echo $counter; ?>'>
                                        <h5>
                                            <a href="<?php printf(__('%s', 'karoon'), $report_external_link); ?>" target="_blank" title="<?php printf(__('%s', 'karoon'), the_title()); ?>"><?php printf(__('%s', 'karoon'), the_title()); ?></a>
                                        </h5>
                                        <p><?php printf(__('%s', 'karoon'), the_time('d/m/Y')); ?></p>
                                    </li>
										
									<?php }?>       
                            <?php       $counter++;
                                    }
                                }
                                wp_reset_postdata();
                                wp_reset_query();  
                            ?>
                        </ul>

                        <?php if ((($investorNewsButtonLink) && ($investorNewsButtonLink != ''))) { ?>
                            <a href="<?php printf(__('%s', 'karoon'), $investorNewsButtonLink); ?>" title="<?php printf(__('%s', 'karoon'), $viewallButtonLabel); ?>" class="btn secondary-btn"><?php printf(__('%s', 'karoon'), $viewallButtonLabel); ?></a>
                        <?php } ?>                       
                        </div>
                        
                        <?php $investor_pageid = get_page_by_title( 'Investors' );
                                $investor_id = $investor_pageid->ID;                           
                        ?>
                
                       
                                                       
                    </div>                
                <!-- End of Investor News Section -->

                <!-- Start of Map Section -->  
                
                <div class="col-lg-6 col-sm-6">
                <div class="map-wrapper">
                    <?php if (get_field('map_title', $post->ID)) { ?>
                            <h3 class="mobile-hide"><?php echo get_field('map_title', $post->ID); ?></h3>
                        <?php } ?>
                        <?php if (get_field('map_title_mobile', $post->ID)) { ?>
                            <h3 class="mobile-show"><?php echo get_field('map_title_mobile', $post->ID); ?></h3>
                        <?php } ?>
                    <?php if($mapImage) {?>
                    <img src="<?php echo $mapImage;?>" alt="" class="mobile-hide">
                    <img src="<?php echo $mapImage;?>" alt="" class="mobile-show">
                    <?php }?>
                    
                    
                    
                    
                     <?php $count = 1;
                            //if (have_rows('annual_reports_section', $investor_id)) {
                            // loop through the rows of data
                                //while (have_rows('annual_reports_section', $investor_id)) { 
                                    $argsFeaturePresNews = array('posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC', 'cat' => "presentations");
                                    $featurepresQuery = new WP_Query($argsFeaturePresNews);
                                    if ($featurepresQuery->have_posts()) {
                                        while ($featurepresQuery->have_posts()) {
                                            $featurepresQuery->the_post();
                                            $isFeaturePresentation = get_field("is_featured_presentation", $featurepresQuery->ID);                                            
                                            $pdfLink = get_field('pdf_link', $featurepresQuery->ID);
                                            $externalLink = get_field('report_external_link', $featurepresQuery->ID);                                                                     
                                            if($isFeaturePresentation == 1){
                                                if($count == 1){ ?>                                            
                                                    <div class="feature-report">
                                                        <?php if ($featureReportTitle && $featureReportTitle != '') { ?>
                                                            <h3><?php printf(__('%s', 'karoon'), $featureReportTitle); ?></h3>
                                                            <?php if($pdfLink) { ?>
                                                                <a href="<?php printf(__('%s', 'karoon'), $pdfLink); ?>" target="_blank" title="">
                                                            <?php } elseif($externalLink) { ?>
                                                                <a href="<?php printf(__('%s', 'karoon'), $externalLink); ?>" target="_blank" title="">
                                                            <?php } ?>
                                                            <?php if(null!= get_the_post_thumbnail_url($featurepresQuery->ID)){ ?>
                                                                <i><img src="<?php echo get_the_post_thumbnail_url($featurepresQuery->ID); ?>" alt=""></i>
                                                            <?php } ?>    
                                                            </a>
                                                        <?php } ?>
                                                        <p><?php echo get_the_title(); ?></p>                                                        

                                                        <?php if ((($featureReportButtonLink) && ($featureReportButtonLink != '')) && (($viewallButtonLabel)  && ($viewallButtonLabel != ''))) { ?>
                                                            <a href="<?php printf(__('%s', 'karoon'), $featureReportButtonLink); ?>" title="<?php printf(__('%s', 'karoon'), $viewallButtonLabel); ?>" class="btn secondary-btn"><?php printf(__('%s', 'karoon'), $viewallButtonLabel); ?></a>
                                                        <?php } ?>
                                                    </div>
                                                <?php }
                                                $count++;   
                                            }                                                                                                
                                        }
                                    }                           
                                        wp_reset_postdata();
                                        wp_reset_query();
                                    ?>
                </div>
               
                    <!--<div class="map-wrapper">
                        <?php if ($mapTitle && $mapTitle != '') { ?>    
                            <h3><?php printf(__('%s', 'karoon'), $mapTitle); ?></h3>
                        <?php } ?>

                        <div id='map_canvas' class="canvas-map">
                        </div>
                        <?php
                        $fullAddress = array();
                        $fullCountryAddress = array();
                        $mapProject = array();

                        if (have_rows('map_addresses')) {
                            // loop through the rows of data
                            while (have_rows('map_addresses')) {
                                the_row();
                                $mapAddress [] = get_sub_field('map_name', $post->ID);
                                $mapCountryAddress [] = get_sub_field('map_country_address', $post->ID);
                                $fullAddress = array_combine($mapAddress, $mapCountryAddress);
                                $mapAddress1 = get_sub_field('select_project', $post->ID);
                                
                                if($mapAddress1) :
                                    $post = $mapAddress1;                                   
                                    setup_postdata( $post );                                    
                                    $mapProject [] = str_replace(array(' ',','),array('-',""),strtolower(strstr(get_the_title(), ',', true)));
                                    wp_reset_postdata();
                                    wp_reset_query();
                                endif;
                                
                            }
                        }
                        
                        $i = 0;
                        foreach($fullAddress as $key => $value) { ?>
                        <script>locations.push('<?php echo $key.", ".$value; ?>'); </script>
                        <script>locationsProject.push('<?php echo $mapProject[$i]; ?>'); </script>
                        <?php $i = $i + 1; }
                        ?>
                    </div>
                </div>-->
                <!-- End of Map Section -->

            </div>
        </div>
    </section>

    <section class="karoon-page-lists-section">
        <div class="karoon-container">
            <div class="karoon-grid-wrapper">
                <?php 
                    if (have_rows('block_structure')) {
                        while (have_rows('block_structure')) { the_row();
                            $block_title = get_sub_field('block_title');
                            $block_short_content = get_sub_field('block_short_content');
                            $block_image_for_desktop = get_sub_field('block_image_for_desktop');
                            $block_image_for_mobile = get_sub_field('block_image_for_mobile');
                            $block_button_link_text = get_sub_field('block_button_link_text');
                            $block_button_link = get_sub_field('block_button_link');
                            ?>
                            <div class="karoon-grid-item-wrapper">
                                <div class="karoon-grid-item">
                                        <div class="karoon-img-wrpper"> <?php 
                                                if ($block_image_for_desktop != '') { ?>
                                                    <img src="<?php echo $block_image_for_desktop['url']; ?>" alt="<?php echo $block_image_for_desktop['alt']; ?>" /> <?php 
                                                } else { ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/public/images/placeholder-image.jpg" alt="placeholder-image" /> <?php
                                                } ?>
                                        </div>
                                        <div class="karoon-grid-inner">
                                        <div class="karoon-grid-inner-title">
                                            <h2 class="karoon-grid-title"><?php echo $block_title; ?></h2>
                                        </div> 
                                        <div class="karoon-grid-content">  
                                            <p> <?php
                                                if (str_word_count($block_short_content, 0) > 10) {
                                                    $words = str_word_count($block_short_content, 2);
                                                    $pos   = array_keys($words);
                                                    $block_short_content  = substr($block_short_content, 0, $pos[10]) .'...';
                                                    echo $block_short_content;
                                                } else {
                                                    echo $block_short_content;
                                                } ?>
                                            </p>
                                        </div>  
                                        <a href="<?php echo $block_button_link; ?>" class="karoon-arrow-btn" title="<?php echo $block_button_link_text; ?>"><?php echo $block_button_link_text; ?> <span>></span></a>
                                        </div>
                                </div>
                            </div>
                            <?php 
                        }   
                    }
                ?>
            </div>
        </div>
    </section>
</main>
<!-- Displaying map for homepage -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWarPa7zAj2_Au3Oqtmab0iiu_wZeuqWg"></script>
<?php
get_footer();
?>