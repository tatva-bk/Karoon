<?php
/* Template Name: About Template */

get_header();
$overviewTitle = get_field('overview_title', $post->ID);
$overviewLess = get_field('overview_read_less_content', $post->ID);
$directorsTitle = get_field('directors_title', $post->ID);
$ourStoryTitle = get_field('our_story_title', $post->ID);
$ourStoryLess = get_field('our_story_read_less_content', $post->ID);
$governanceTitle = get_field('governance_title', $post->ID);
$governance_less_content = get_field('governance_less_content', $post->ID);
$corporatePoliciesTitle = get_field('corporate_policies_title', $post->ID);
$corporate_policies_less_content = get_field('corporate_policies_less_content', $post->ID);
$operationalHistoryTitle = get_field('operational_history_title', $post->ID);
$readMoreBtn = get_field('read_more_button_label', 'option');

?>

<main class="inner-page">
    <section class="banner inner-banner">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>

    <section class="section sec__about-brief">
        <div class="container">
            <div class="row">
                <div class="col-12 page-title">
                    <h1><?php printf(__('%s', 'karoon'), get_the_title($post->ID)); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="comp__collapse-block overview-class">
                        <div class="coll-outer">
                            <?php if ($overviewTitle && $overviewTitle != '') { ?>
                                <div class="coll-header sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ',','),array('-',""),strtolower($overviewTitle))); ?>">
                                    <h2><?php printf(__('%s', 'karoon'), $overviewTitle); ?></h2>
                                </div>
                            <?php } ?>
                            <div class="coll-body cms-content">
                                <?php
                                if ($overviewLess && $overviewLess != '') {
                                    printf(__('%s', 'karoon'), $overviewLess);
                                }
                                ?>
                                <div class="collapsable-content">
                                    <?php
                                    if (have_posts()) {
                                        while (have_posts()) {
                                            the_post();
                                            printf(__('%s', 'karoon'), the_content());
                                        }
                                    }
                                    ?>

                                    <?php if (have_rows('overview_block_content')) {
                                        $i = 0; ?>
                                        <div class="row gallery-block">
                                            <?php
                                            while (have_rows('overview_block_content')) {
                                                the_row();
                                                $overviewBlockImage = get_sub_field('overview_block_image', $post->ID);
                                                $overviewBlockTitle = get_sub_field('overview_block_title', $post->ID);
                                                $overviewBlockDescription = get_sub_field('overview_block_description', $post->ID);
                                                ?>
                                                <figure class="col-md-4">
                                                    <?php
                                                    if ($overviewBlockImage && $overviewBlockImage != '') {
                                                        $overviewBlockImageUrl = $overviewBlockImage['url'];
                                                        $overviewBlockImageID = $overviewBlockImage['ID'];
                                                        $overviewBlockImageCustom = wp_get_attachment_image_src( $overviewBlockImageID,'full');
                                                        //echo "<pre>";print_r($overviewBlockImage);
                                                        ?>
                                                        <div class="img-thumb">
                                                            <img src="<?php printf(__('%s', 'karoon'), $overviewBlockImageCustom[0]); ?>" alt="">
                                                        </div>
                                                    <?php } ?>

                                                    <figcaption>
                                                        <?php if ($overviewBlockTitle && $overviewBlockTitle != '') { ?>
                                                            <h5><?php printf(__('%s', 'karoon'), $overviewBlockTitle); ?></h5>
                                                        <?php } ?>
                                                        <div class="about-sub-content">
                                                            <div class="about-sub-inner-content">
                                                                <?php if ($overviewBlockDescription && $overviewBlockDescription != '') { ?>
                                                                    <?php printf(__('%s', 'karoon'), $overviewBlockDescription); ?>
                                                                <?php } ?> 
                                                            </div>
                                                            <!-- take out the readmore button -->
                                                            <!-- <a href="#" class="read-more-less">
                                                                <span class="read-collapse read-more">Read more</span>
                                                                <span class="read-collapse read-less">Close</span>
                                                     </a> -->
                                                        </div>

                                                    </figcaption>
                                                </figure>
                                            <?php } ?>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="bt-wrap">
                                <a href="#" class="coll-trigger btn-toggle" data-text="<?php printf(__('%s', 'karoon'), $readMoreBtn); ?>">
                                    <span class="button-text"><?php printf(__('%s', 'karoon'), $readMoreBtn); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section sec__team-brief">
        <div class="container">
            <div class="row">
                <?php if ($directorsTitle && $directorsTitle != '') { ?>
                    <div class="col-12 sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ',','),array('-',""),strtolower($directorsTitle))); ?>">
                        <h2><?php printf(__('%s', 'karoon'), $directorsTitle); ?></h2>
                    </div>
                <?php } ?>
            </div>
            <?php
            $query = new WP_Query(array('post_type' => 'team', 'order' => 'DESC'));
            if ($query->have_posts()) {
                ?>

                <div class="row">
                            <?php
                            $count = 1;
                            while ($query->have_posts()) {
                                $query->the_post();
                                $memberQualification = get_field('member_qualification', $post->ID);
                                $memberDesignation = get_field('member_designation', $post->ID);
                                $memberPhoto = get_field('member_photo', $post->ID); 
                                $committeesTitle = get_field('committees_title', $post->ID);
                                $committeesName = get_field('committees_name', $post->ID);
                                
                                    $accroTrue = "false";
                                    $accroShow = "";                                
                                ?>
                                <div class="col-12 animatedParent animateOnce sec__team-content" data-sequence='300'>
                            <div class="row">
                            <?php if ($memberPhoto && sizeof($memberPhoto) != '') { ?>
                                                <div class="col-lg-2 col-sm-4 col-12">                                               
                                                    <div class="img-thumb">
                                                        <img src="<?php echo $memberPhoto['url']; ?>" alt="">
                                                    </div>                                               
                                                </div>
                                            <?php } ?>
                                <div class="col-lg-10 col-sm-8 col-12 cms-content <?php if ($memberPhoto == '') { echo "no-image-class"; } ?>">
                                <h4 class="mb-0">
                                            <?php the_title(); ?>

                                            <?php if ($memberQualification && $memberQualification != '') { ?>
                                                <i><?php printf(__('%s', 'karoon'), $memberQualification); ?></i>
                                            <?php } ?>

                                            <?php if ($memberDesignation && $memberDesignation != '') { ?>
                                                <small><?php printf(__('%s', 'karoon'), $memberDesignation); ?></small>
                                            <?php } ?>

                                        </h4>
                                   
                                    <?php the_content();?>
                                    
                                </div>
                            </div>
                        </div>
                                <?php
                                $count = $count + 1;
                                wp_reset_postdata();
                                wp_reset_query();
                            }
                            ?>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <section class="section sec__op-history">
        <div class="container">
            
            <div class="row">
                <div class="col-12 sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ',','),array('-',""),strtolower($ourStoryTitle))); ?>">
                    <?php if ($ourStoryTitle) { ?>
                        <h2><?php printf(__('%s', 'karoon'), $ourStoryTitle); ?></h2>
                    <?php } ?>

                </div>
            </div>
            
            <div class="coll-body">
                                <?php
                                if ($ourStoryLess && $ourStoryLess != '') {
                                    printf(__('%s', 'karoon'), $ourStoryLess);
                                }
                                ?>
            </div>
            
            <div class="row">
                <div class="col-12 sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ',','),array('-',""),strtolower($governanceTitle))); ?>">
                    <?php if ($governanceTitle) { ?>
                        <h2><?php printf(__('%s', 'karoon'), $governanceTitle); ?></h2>
                    <?php } ?>

                </div>
            </div>
            
            <div class="coll-body cms-content">
                                <?php
                                if ($governance_less_content && $governance_less_content != '') {
                                    printf(__('%s', 'karoon'), $governance_less_content);
                                }
                                ?>
            </div>
            
            <div class="row">
                <div class="col-12 sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ',','),array('-',""),strtolower($corporatePoliciesTitle))); ?>">
                    <?php if ($corporatePoliciesTitle) { ?>
                        <h2><?php printf(__('%s', 'karoon'), $corporatePoliciesTitle); ?></h2>
                    <?php } ?>

                </div>
            </div>
            
            <div class="coll-body">
                                <?php
                                if ($corporate_policies_less_content && $corporate_policies_less_content != '') {
                                    printf(__('%s', 'karoon'), $corporate_policies_less_content);
                                }
                                ?>
            </div>
            
            <!-- remove Operation History --> 
            <!--<div class="row">
                <div class="col-12 sec-title" id="<?php /* printf(__('%s', 'karoon'), str_replace(array(' ',','),array('-',""),strtolower($operationalHistoryTitle))); */ ?>">
                    <?php /* if ($operationalHistoryTitle) { */ ?>
                        <h2><?php /* printf(__('%s', 'karoon'), $operationalHistoryTitle); */ ?></h2>
                    <?php /* } */ ?>

                </div>
            </div> -->
        
        
            <?php 
            if (have_rows('***operational_history_content')) {
                $countRow = 1; 
                ?>
                <div class="row">
                    <div class="col-12 animatedParent animateOnce" data-sequence='300'>
                        <div id="accordion2" class="comp__accordion-block">
                            <?php
                            while (have_rows('operational_history_content')) {
                                the_row();

                                /*if ($countRow == 1) {
                                    $accroTrue = "true";
                                    $accroShow = "show";
                                } else {
                                    $accroTrue = "false";
                                    $accroShow = "";
                                }*/
                                $mainTitle = get_sub_field('main_title', $post->ID); 
                                ?>
                                <div class="card animated fadeInDownShort" data-id="<?php echo $countRow; ?>">
                                    <div class="card-header" id="headingOne<?php echo $countRow; ?>" data-toggle="collapse" data-target="#collapseOne<?php echo $countRow; ?>" aria-expanded=" false<?php //echo $accroTrue; ?>" aria-controls="collapseOne<?php echo $countRow; ?>">
                                        <?php if ($mainTitle && $mainTitle != '') { ?>
                                            <h4 class="mb-0"><?php printf(__('%s', 'karoon'), $mainTitle); ?></h4>
                                        <?php } ?>
                                    </div>

                                    <div id="collapseOne<?php echo $countRow; ?>" class="collapse <?php echo $accroShow; ?> card-body-outer" aria-labelledby="headingOne<?php echo $countRow; ?>" data-parent="#accordion2">
                                        <div class="card-body row">
                                            <div class="col-12 cms-content">
                                                <?php
                                                if (have_rows('main_content')) {
                                                    while (have_rows('main_content')) {
                                                        the_row();
                                                        $title = get_sub_field('title', $post->ID);
                                                        $contentInstructions = get_sub_field('content_instructions', $post->ID);
                                                        if ($title && $title != '') {
                                                            ?>
                                                            <h5><?php printf(__('%s', 'karoon'), $title); ?></h5>
                                                        <?php } ?>
                                                        <?php if (have_rows('content_repeater')) { ?>
                                                            <ul>
                                                                <?php
                                                                while (have_rows('content_repeater')) {
                                                                    the_row();
                                                                    $content = get_sub_field('content', $post->ID);
                                                                    if ($content && $content != '') {
                                                                        ?>
                                                                        <li><?php printf(__('%s', 'karoon'), $content); ?></li>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                        <?php } ?>
                                                        
                                                        <?php if ($contentInstructions && $contentInstructions != '') { ?>
                                                            <?php printf(__('%s', 'karoon'), $contentInstructions); ?>
                                                        <?php } ?>   
                                                         
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $countRow = $countRow + 1;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</main>
<?php
get_footer();
