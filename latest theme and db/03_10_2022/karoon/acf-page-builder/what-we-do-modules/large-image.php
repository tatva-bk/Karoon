<?php
    $large_image = get_sub_field('large-image',$post->ID);
?>
</div>
<?php if (get_sub_field('large-image') != null) { ?>
<div class="karoon-container">
    <div class="cms-image-block large-image">
        <img src="<?php echo get_sub_field('large-image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
    </div>
<?php } ?>