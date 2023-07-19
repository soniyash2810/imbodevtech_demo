<?php

$add_services_we_follow_title       = get_field('add_services_we_follow_title','option');
$add_services_we_follow_sub_title   = get_field('add_services_we_follow_sub_title','option');
$add_services_we_follow_content     = get_field('add_services_we_follow_content','option');

if ($add_services_we_follow_title || $add_services_we_follow_sub_title || $add_services_we_follow_content ) {
    ?>
    <div class="p-y-100 process-we-follow overflow-hidden position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-4 col-xxl-3 align-self-center">
                    <div class="content-card text-center bg-pink p-4 p-md-5 d-flex justify-content-center align-items-center">
                        <div>
                            <?php
                            if ($add_services_we_follow_title) {
                                echo '<span class="text-uppercase d-block c-white">' . $add_services_we_follow_title . '</span>';
                            }
                            if ($add_services_we_follow_sub_title) {
                                echo '<h2 class="c-white mt-2 sub-title">' . $add_services_we_follow_sub_title . '</h2>';
                            }
                            if ($add_services_we_follow_content) {
                                echo '<p class="desc mb-0 c-white">' . $add_services_we_follow_content . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-8 col-xxl-9">
                    <div class="owl-carousel process-we-follow-carousel">
                        <?php
                        if (have_rows('add_services_we_follow_slider','option')) {
                            while (have_rows('add_services_we_follow_slider','option')) {
                                the_row();
                                $add_services_we_follow_number = get_sub_field('add_services_we_follow_number');
                                $add_services_we_follow_title = get_sub_field('add_services_we_follow_title');
                                $add_services_we_follow_content = get_sub_field('add_services_we_follow_content');

                                echo '<div class="py-4">';
                                echo '<div class="content-card p-4 p-md-4">';
                                if ($add_services_we_follow_number) {
                                    echo '<b class="h5 c-pink">' . $add_services_we_follow_number . '</b>';
                                }
                                if ($add_services_we_follow_title) {
                                    echo '<h3 class="c-black h5 mt-3"><b>' . $add_services_we_follow_title . '</b></h3>';
                                }
                                if ($add_services_we_follow_content) {
                                    echo '<p class="desc mb-0 c-black">' . $add_services_we_follow_content . '</p>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}