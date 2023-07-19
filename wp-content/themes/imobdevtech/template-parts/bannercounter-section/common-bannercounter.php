<?php

$add_right_side_counter_image   = get_field('add_right_side_counter_image','option');
$add_right_side_count_text      = get_field('add_right_side_count_text','option');
$add_right_side_project_name    = get_field('add_right_side_project_name','option');

if ( $add_right_side_counter_image || $add_right_side_count_text || $add_right_side_project_name || !empty( have_rows('add_counter_data','option') ) ) {
    
    ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-9 col-lg-9">
                <?php
                $counter = 0; 
                if ( !empty( have_rows( 'add_counter_data','option' ) ) ) {
                    if( have_rows('add_counter_data','option') ):
                        while( have_rows('add_counter_data','option') ) : the_row();

                            $add_count_number = get_sub_field('add_count_number');
                            $add_project_name = get_sub_field('add_project_name');

                            // Check if the counter is divisible by 3
                            if ($counter % 3 === 0) {
                                // Add a new row with a custom class after every 3 records, except for the first row
                                if ($counter > 0) {
                                    echo '<div class="row my-5">';
                                } else {
                                    echo '<div class="row">';
                                }
                            }
                            ?>
                                <div class="col-6 col-md-4 col-lg-4 align-self-center">
                                    <h3 class="sub-title c-black text-capitalize mb-0"><?php echo $add_count_number; ?></h3>
                                    <p class="desc mb-0 c-black text-capitalize"><?php echo $add_project_name; ?></p>
                                </div>
                            <?php
                            // Increment the counter after each record
                            $counter++;

                            // Check if the counter is divisible by 3 or if it is the last record
                            if ($counter % 3 === 0 ) {
                                // Close the row after every 3 records or on the last record
                                echo '</div>';
                            }
                        endwhile;
                    endif;
                }
                ?>
            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <div class="bg-pink h-100 w-100 text-center d-flex justify-content-center align-items-center">
                    <div>
                        <?php
                            if ( $add_right_side_counter_image ) {
                                echo '<img src="'.esc_url($add_right_side_counter_image['url']).'" class="" alt="'.esc_attr($add_right_side_counter_image['alt']).'"/>';
                            }
                            if ( $add_right_side_count_text ) {
                                echo '<h2 class="sub-title c-white text-capitalize mb-0">'.$add_right_side_count_text.'</h2>';
                            }
                            if ( $add_right_side_project_name ) {
                                echo '<p class="desc mb-0 c-white text-capitalize">'.$add_right_side_project_name.'</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

}
