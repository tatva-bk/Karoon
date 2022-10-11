<?php
    $about_sections = get_sub_field('image_sildes',$post->ID);
?>
        <div class="karoon-container sm">
            <div class="karoon-image-grid">
                <?php 
                    foreach ($about_sections as $img) { 
                        if ($img['add_image'] != null) { ?>
                            <div class="karoon-grid-item">
                                <div class="karoon-grid-inner">
                                    <img src="<?php echo $img['add_image']['url']; ?>" alt="" class="">
                                </div>
                            </div> <?php 
                        }
                    } ?>
            </div>
        </div>