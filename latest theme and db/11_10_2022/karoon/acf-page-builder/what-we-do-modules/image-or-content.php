<?php $chooseContentType = get_sub_field('radio_button',$post->ID);
?>

   <?php 
   if( $chooseContentType == 'what_we_do_content' ) {
         echo get_sub_field('content');
   } else { 
      if (get_sub_field('image') != null) { ?>
         <div class="cms-image-block">
            <img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
         </div> <?php   
            } 
      } ?>

      