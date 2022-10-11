<?php
    $what_we_do_section = get_sub_field('image_sildes',$post->ID);
?>
       
            <div class="karoon-image-grid">
                <?php 
                    foreach ($what_we_do_section as $img) { 
                        if ($img['add_image'] != null) { ?>
                            <div class="karoon-grid-item">
                                <div class="karoon-grid-inner">
                                    <img src="<?php echo $img['add_image']['url']; ?>" alt="" class="">
                                </div>
                            </div> <?php 
                        }
                    } ?>
            </div>
        
        