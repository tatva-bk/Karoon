<?php
    $image_with_caption = get_sub_field('image_with_caption',$post->ID);
?>
<?php if (get_sub_field('image') != null) { ?>
    <div class="cms-image-block with-caption">    
        <img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>"/>
        <p><?php echo get_sub_field('caption'); ?></p>
    </div>
<?php } ?>