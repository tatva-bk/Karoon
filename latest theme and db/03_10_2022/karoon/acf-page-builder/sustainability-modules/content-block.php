<?php
$sustainability_content = get_sub_field('content',$post->ID);
?>

<?php $chooseContentType = get_sub_field('choose_image_or_content',$post->ID);
?>

   <?php 
   if( $chooseContentType == 'sustainability_content' ) {
         echo get_sub_field('content');
   } else { 
      if (get_sub_field('upload_image') != null) { ?>
         <div class="cms-image-block">
            <img src="<?php echo get_sub_field('upload_image')['url']; ?>" alt="<?php echo get_sub_field('upload_image')['alt']; ?>">
         </div> <?php   
            } 
      } ?>
