<?php
    $table_title= get_sub_field('table_title',$post->ID);
    $table_heading= get_sub_field('table_heading',$post->ID);
    $table_data= get_sub_field('table_data',$post->ID);
    $table_total_text = get_sub_field('table_total_text',$post->ID);
    $table_footer= get_sub_field('table_footer',$post->ID);
    $a = 0;
    $b = 0;
    $c = 0
?>

        <div class="cms-table-wrapper">
            <h3 class="cms-table-title"><?php echo $table_title; ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr> <?php 
                                    foreach ($table_heading as $th) { ?>
                                        <th><?php echo $th['table_data_heading']; ?></th> <?php 
                                    } ?>
                        </tr>
                    </thead>
                    <tbody> <?php 
                                    foreach ($table_data as $td) { ?>
                                    <tr> <?php 
                                            foreach ($td['table_row'] as $tr) { ?>
                                                <td> <?php
                                                    echo $tr['table_row_data']; ?>
                                                </td> <?php 
                                            } ?>
                                    </tr> <?php 
                                            foreach ($td['table_row'][1] as $tr_a) {
                                                $a = $a + $tr_a;
                                            }
                                            foreach ($td['table_row'][2] as $tr_b) {
                                                $b = $b + $tr_b;
                                            }
                                            foreach ($td['table_row'][3] as $tr_c) {
                                                $c = $c + $tr_c;
                                            }
                                    } ?>
                                    <tr class="dark">
                                        <td><?php echo $table_total_text; ?></td>
                                        <td><?php echo $a; ?></td>
                                        <td><?php echo $b; ?></td>
                                        <td><?php echo $c; ?></td>
                                    </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <ol> <?php 
                                        foreach ($table_footer as $tf) { ?>
                                            <li><?php echo $tf['table_footer_text']; ?></li> <?php 
                                        } ?>
                                </ol>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>