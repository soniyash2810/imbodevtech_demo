<?php

$add_technologies_main_title = get_field('add_technologies_main_title','option');
$add_technologies_description = get_field('add_technologies_description','option');

if ($add_technologies_main_title || $add_technologies_description || !empty(have_rows('add_technologies_tab_name','option')) || !empty(have_rows('add_technologies_images','option'))) 
{
    ?>
    <div class="tech-sect border-top">
        <div class="container">
            <div class="row g-0 border-end border-start">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row g-0 ">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="p-4 border-bottom h-100">
                                <?php
                                if ($add_technologies_main_title) {
                                    echo '<h2 class="text-capitalize mb-3"><b>' . $add_technologies_main_title . '</b></h2>';
                                }
                                if ($add_technologies_description) {
                                    echo '<p class="desc mb-0">' . $add_technologies_description . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        $licount = 0;
                        if (!empty(have_rows('add_technologies_tab_name','option'))) {
                            if (have_rows('add_technologies_tab_name','option')):
                                echo '<div class="col-12 col-md-12 col-lg-4 border-start border-end-0"><ul class="nav nav-tabs flex-row flex-lg-column text-start nav-justified" id="myTab" role="tablist">';
                                while (have_rows('add_technologies_tab_name','option')) : the_row();

                                    $add_technologies_name = get_sub_field('add_technologies_name');

                                    if ($add_technologies_name) {
                                        if ($licount == 0) {
                                            ?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="mobile-tab" data-bs-toggle="tab" data-bs-target="#count<?php echo $licount; ?>" type="button" role="tab" aria-controls="count<?php echo $licount; ?>" aria-selected="true"><?php echo $add_technologies_name; ?></button>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="mobile-tab" data-bs-toggle="tab" data-bs-target="#count<?php echo $licount; ?>" type="button" role="tab" aria-controls="count<?php echo $licount; ?>" aria-selected="true"><?php echo $add_technologies_name; ?></button>
                                            </li>
                                            <?php
                                        }
                                    }
                                    $licount++;
                                endwhile;
                                echo '</ul></div>';
                            endif;
                        }
                        ?>
                    </div>
                </div>
                <!-- Start Tab Data Development -->
                <div class="col-12 col-md-12 col-lg-12 col-xl-12 pt-5">
                    <div class="tab-content" id="myTabContent">
                        <?php
                        $tabactive = 0;
                        if (!empty(have_rows('add_technologies_images','option'))) {
                            if (have_rows('add_technologies_images','option')):
                                while (have_rows('add_technologies_images','option')) : the_row();
                                    
                                    if ($tabactive == 0) { 
                                        ?>
                                        <div class="tab-pane fade show active" id="count<?php echo $tabactive; ?>" role="tabpanel" aria-labelledby="count<?php echo $tabactive; ?>" tabindex="0">
                                        <?php } else { ?>
                                            <div class="tab-pane fade" id="count<?php echo $tabactive; ?>" role="tabpanel" aria-labelledby="count<?php echo $tabactive; ?>" tabindex="0">
                                            <?php } ?>
                                            <?php
                                            if (!empty(have_rows('add_image_with_name','option'))) {
                                                if (have_rows('add_image_with_name','option')):
                                                    echo '<div class="row g-0">';
                                                    while (have_rows('add_image_with_name','option')) : the_row();

                                                        $add_image = get_sub_field('add_image');
                                                        $add_technologies_name = get_sub_field('add_technologies_name');
                                                        $add_technologies_link = get_sub_field('add_technologies_link');

                                                        if ($add_image || $add_technologies_name || $add_technologies_link) {

                                                            echo '<div class="col-4 col-md-3 col-lg-2">';
                                                            if (!empty($add_technologies_link)) {
                                                                echo '<a href="' . $add_technologies_link . '" class="d-flex flex-column text-center mb-5 mb-md-5">';
                                                                if ($add_image) {
                                                                    echo '<img width="45" class="m-auto" src="' . esc_url($add_image['url']) . '" alt="' . esc_attr($add_image['alt']) . '"/>';
                                                                }
                                                                if ($add_technologies_name) {
                                                                    echo '<span class="text-capitalize c-black mt-2">' . $add_technologies_name . '</span>';
                                                                }
                                                                echo '</a>';
                                                            } else {
                                                                if ($add_image) {
                                                                    echo '<img width="45" class="m-auto" src="' . esc_url($add_image['url']) . '" alt="' . esc_attr($add_image['alt']) . '"/>';
                                                                }
                                                                if ($add_technologies_name) {
                                                                    echo '<span class="text-capitalize c-black mt-2">' . $add_technologies_name . '</span>';
                                                                }
                                                            }
                                                            echo '</div>';
                                                        }

                                                    endwhile;
                                                    echo '</div>';
                                                endif;
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        $tabactive++;
                                    endwhile;
                                endif;
                            }
                            ?>
                        </div>
                    </div>
                    <!-- End Tab Data Development -->
                </div>
            </div>
        </div>
    <?php
}