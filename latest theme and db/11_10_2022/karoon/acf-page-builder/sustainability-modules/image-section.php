<?php

use FFI\CData;

    $sustainability_sections = get_sub_field('image_sildes',$post->ID);
?>
    <?php if (count($sustainability_sections) == 2) { ?>
        <div class="karoon-image-grid"> <?php 
            foreach ($sustainability_sections as $img) {
                if ($img['add_image'] != null) { ?>
                    <div class="karoon-grid-item">
                        <div class="karoon-grid-inner">
                            <img src="<?php echo $img['add_image']['url']; ?>" alt="<?php echo $img['add_image']['alt']; ?>">
                        </div>
                    </div> <?php
                }
            } ?>
        </div>
    <?php } else {
        foreach ($sustainability_sections as $img) {
            if ($img['add_image'] != null) { ?>
            <div class="cms-image-block">
                <img src="<?php echo $img['add_image']['url']; ?>" alt="<?php echo $img['add_image']['alt']; ?>">
            </div> <?php
            }
        } ?>
    <?php } ?>

