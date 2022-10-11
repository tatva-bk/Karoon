<?php
/* Template Name: Contact Template */
get_header();
$contact_form_background_color = get_field('contact_form_background_color');
?>

<main>
    <section class="banner inner-banner mb-0">
        <?php get_template_part('template-parts/banner', 'content'); ?>
    </section>
    
    <section class="section contact_block mb-0" style="background:<?= $contact_form_background_color ? $contact_form_background_color : '';?>">
        <div class="container">
            <div class="row">
                <div class="col-12 page-title">
                    <h1><?php printf(__('%s', 'karoon'), the_title()); ?></h1>
                </div>
            </div>

            <div class="offices_block">
                <div class="row">                    
                    <?php $count = 1;
                    $contactFormBgColor = get_sub_field('contact_form_background_color');
                    $countLocation = count(get_field('locations'));
                        if (have_rows('locations')) {
                            $lastClass = '';
                            // loop through the rows of data
                            while (have_rows('locations')) {
                                the_row();
                                $locationTitle = get_sub_field('location_title', $post->ID);
                                if ($count == $countLocation)
                                {
                                    //echo "here";
                                    $lastClass = 'last-col-contact';
                                }               
                                ?>                    
                                <?php if(($count%2 == 0) || ($count == 1)){ 
                                     if ($count == $countLocation-1)
                                     {
                                         $lastClass = 'last-col-contact';
                                     }     
                                ?>
                                    <div class="col-md-3 col-sm-6 address_block <?php echo $lastClass;?>">
                                <?php } ?>

                                <div class="offices_inner">
                                    <?php if ($locationTitle && $locationTitle != '') { ?>
                                        <h4><?php printf(__('%s', 'karoon'), $locationTitle); ?></h4>   
                                    <?php } ?>
                                    <?php   if (have_rows('addresses')) {
                                                // loop through the rows of data
                                                while (have_rows('addresses')) {
                                                    the_row();
                                                    $address = get_sub_field('address', $post->ID);
                                                    if ($address && $address != '') {
                                                        printf(__('%s', 'karoon'), $address);
                                                    } 
                                                }                                                        
                                            }
                                    ?>
                                </div> 
                                <?php if(($count%2 != 0) || ($count == 1)){ ?>
                                    </div>
                                <?php } ?>

                        <?php $count++;  ?>
                    <?php   }
                        }
                    ?>                 
                </div>
            </div>         
            
            <?php
                while (have_posts()) {
                    the_post();
                    printf(__('%s', 'karoon'), the_content());
                }
            ?>
            
        </div>
    </section>
</main>

<?php
get_footer();

