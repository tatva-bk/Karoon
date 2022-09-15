<?php
/* Template Name: Governance Template */

get_header();
$policiesTitle = get_field('corporate_policies_title', $post->ID);
$rulesTitle = get_field('esop_and_prp_rules_title', $post->ID);
$viewBtn = get_field('view_button_label', 'option');
$viewAllBtn = get_field('view_all_button_label', 'option');
$readMoreBtn = get_field('read_more_button_label', 'option');
$closeBtn = get_field('close_button_label', 'option');
?>
<!--<style>
    .hide-blocks{
        display: none;
    }
    </style>-->
    <!--<script>
        jQuery(document).ready(function(){
            jQuery("#corporate_policy_view").click(function(){
                jQuery(".corporate-block.hide-blocks").css("display","block");

            });
        });
        </script>-->

<main class="inner-page">

    <section class="banner inner-banner">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>

    <section class="section sec__governance">
        <div class="container">
            <div class="row">
                <div class="col-12 page-title">
                    <h1><?php printf(__('%s', 'karoon'), get_the_title($post->ID)); ?></h1>
                </div>
            </div>
            <?php
            if (have_rows('commitment_and_corporate_governance')) {
                while (have_rows('commitment_and_corporate_governance')) {
                    the_row();
                    $sectionTitle = get_sub_field('section_title', $post->ID);
                    $sectionContent = get_sub_field('section_content', $post->ID);
                    ?>
                    <div class = "row content-block">
                        <div class = "col-12 sec-title" id = "<?php printf(__('%s', 'karoon'), str_replace(array(' ', ','), array('-', ""), strtolower($sectionTitle))); ?>">

                            <?php if ($sectionTitle && $sectionTitle != '') { ?>
                                <h2><?php printf(__('%s', 'karoon'), $sectionTitle); ?></h2>
                                <?php
                            }

                            if ($sectionContent && $sectionContent != '') {
                                printf(__('%s', 'karoon'), $sectionContent);
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

            <div class="row content-block">
                <div class="col-12">
                    <div class="comp__collapse-block">
                        <div class="coll-outer">
                            <?php if ($policiesTitle && $policiesTitle != '') { ?>
                                <div class="coll-header sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ', ','), array('-', ""), strtolower($policiesTitle))); ?>">
                                    <h2><?php printf(__('%s', 'karoon'), $policiesTitle); ?></h2>
                                </div>
                                <?php
                            }
                            $countRow = count(get_field('corporate_policies'));
                            if (have_rows('corporate_policies')) {
                                $countPolicie = 1;
                                ?>
                                <div class="coll-body">
                                    <div class="row corporate-policies">
                                    <?php
                                    while (have_rows('corporate_policies')) {
                                        the_row();
                                        $policieTitle = get_sub_field('policies_title', $post->ID);
                                        $policieDate = get_sub_field('policies_date', $post->ID);
                                        $policiePdf = get_sub_field('policies_pdf', $post->ID);
                                        ?>
                                        <?php if ($countPolicie == 9) { 
                                            //$hideBlock = "hide-blocks";
                                            ?>
                                            <!--<div class="collapsable-content col">
                                                <div class="row">-->
                                            <?php } ?>

                                            <div class="col-12 col-sm-6 col-md-4 col-xl-3 corporate-block <?=$hideBlock;?>">
                                            <?php if ($policiePdf && $policiePdf != '') { ?>
                                            <a href="<?php echo $policiePdf; ?>" target="_blank">
                                            <?php if ($policieTitle && $policieTitle != '') { ?>
                                                        <span><?php printf(__('%s', 'karoon'), $policieTitle); ?></span>
                                                    <?php } ?>
                                                    <i>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/public/images/download-icon.svg" alt="">
                                                    </i>
                                                </a>
                                            <?php }?>
                                            </div>
                                            <?php if ($countPolicie == $countRow) { ?>
                                            </div>
                                            </div>
                                            <?php
                                        }
                                        $countPolicie = $countPolicie + 1;
                                    }
                                    ?>
                                <!--</div>
                                </div>-->
                            <?php } ?>
                            <!--<div class="bt-wrap">
                                <a id="corporate_policy_view" href="#" class="coll-trigger btn-toggle" data-text="<?php printf(__('%s', 'karoon'), $viewAllBtn); ?>">
                                    <span class="button-text"><?php printf(__('%s', 'karoon'), $viewAllBtn); ?></span>
                                </a>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>

                        <?php
            if (have_rows('board_role_and_committees_section')) {
                while (have_rows('board_role_and_committees_section')) {
                    the_row();
                    $boardTitle = get_sub_field('section_title', $post->ID);
                    $boardLess = get_sub_field('section_read_less_content', $post->ID);
                    $boardMoreContent = get_sub_field('section_read_more_content', $post->ID);
                    $boardMore = get_sub_field('section_content', $post->ID);
                    ?>
                    <div class="comp__collapse-block">
                        <div class="coll-outer">
                            <?php if ($boardTitle && $boardTitle != '') { ?>
                                <div class="coll-header sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ', ','), array('-', ""), strtolower($boardTitle))); ?>">
                                    <h2><?php printf(__('%s', 'karoon'), $boardTitle); ?></h2>
                                </div>
                            <?php } ?>
                            <div class="coll-body row">
                                <div class="col-12 cms-content board-committee">

                                    <?php
                                    if ($boardLess && $boardLess != '') {
                                        printf(__('%s', 'karoon'), $boardLess);
                                    }
                                    ?>
                                    
                                    <div class="collapsable-content">
                                        <?php
                                        if ($boardMoreContent && $boardMoreContent != '') {
                                            printf(__('%s', 'karoon'), $boardMoreContent);
                                        }
                                        ?>
                                    </div>

                                    <?php
                                    $contentCount = 1;
                                    if (have_rows('section_content')) {
                                        while (have_rows('section_content')) {
                                            the_row();
                                            $content = get_sub_field('content', $post->ID);
                                            $contentLink = get_sub_field('content_pdf_link', $post->ID);
                                            ?>

                                            <div class="collapsable-content">
                                                <?php if ($contentCount == 1) { ?>                                        
                                                    <div class="row policies-row pad-0"></div>
                                                <?php } ?>

                                                <div class="row policies-row pad-0">

                                                    <?php if ($content && $content != '') { ?>
                                                    
                                                        <?php if (!$contentLink && $contentLink == '') { ?>
                                                            <div class="col-8 margin-class">
                                                        <?php }else{ ?>
                                                            <div class="col-8">
                                                        <?php } ?>
                                                            
                                                            <?php printf(__('%s', 'karoon'), $content); ?>
                                                        </div>
                                                    <?php } ?>

                                                    <?php if ($contentLink && $contentLink != '') { ?>
                                                        <div class="col-4 text-right">
                                                            <a href="<?php printf(__('%s', 'karoon'), $contentLink['url']); ?>" target="_blank" title="View" class="btn primary-btn">View</a>
                                                        </div>
                                                    <?php } ?>
                                                </div>                                   
                                            </div>
                                            <?php
                                            $contentCount++; ?>
                                    <?php } ?>
                                        <div class="bt-wrap  pt-25">
                                            <a href="#" class="coll-trigger btn-toggle" data-text="<?php printf(__('%s', 'karoon'), $readMoreBtn); ?>">
                                                <span class="button-text"><?php printf(__('%s', 'karoon'), $readMoreBtn); ?> </span>
                                            </a>
                                        </div>
                                       <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

             <div class="row content-block  mb-20">
                <?php if ($rulesTitle && $rulesTitle != '') { ?>
                    <div class="col-12 sec-title" id="<?php printf(__('%s', 'karoon'), str_replace(array(' ', ','), array('-', ""), strtolower($rulesTitle))); ?>">
                        <h2><?php printf(__('%s', 'karoon'), $rulesTitle); ?></h2>
        </div>
                <?php } ?>
                <?php if (have_rows('esop_and_prp_rules')) { ?>
                    <div class="col-12">
                        <?php
                        while (have_rows('esop_and_prp_rules')) {
                            the_row();
                            $ruleTitle = get_sub_field('rule_title', $post->ID);
                            $ruleDate = get_sub_field('rule_date', $post->ID);
                            $rulePdf = get_sub_field('rule_pdf', $post->ID);
                            ?>
                            <div class="row policies-row pad-0">
                                <div class="col-8">
                                    <?php if ($ruleTitle && $ruleTitle != '') { ?>
                                        <p><?php printf(__('%s', 'karoon'), $ruleTitle); ?></p>
                                    <?php } ?>
                                    <?php if ($ruleDate && $ruleDate != '') { ?>
                                        <span><?php printf(__('%s', 'karoon'), $ruleDate); ?></span>
                                    <?php } ?>
                                </div>
                                <?php if ($rulePdf && $rulePdf != '') { ?>
                                    <div class="col-4 text-right">
                                        <a href="<?php echo $rulePdf; ?>" target="_blank" title="<?php printf(__('%s', 'karoon'), $viewBtn); ?>" class="btn primary-btn"><?php printf(__('%s', 'karoon'), $viewBtn); ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>
</main>
<?php
get_footer();
