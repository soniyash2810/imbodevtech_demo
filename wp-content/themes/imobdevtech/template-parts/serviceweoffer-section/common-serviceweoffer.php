<?php

$add_service_we_offer_title       = get_field('add_service_we_offer_title','option');
$add_service_we_offer_sub_title   = get_field('add_service_we_offer_sub_title','option');
$add_service_we_offer_content     = get_field('add_service_we_offer_content','option');

if ( $add_service_we_offer_title || $add_service_we_offer_sub_title || $add_service_we_offer_content ) {
    ?>
    <div class="service-we-offer-sect p-y-100 bg-light-gray">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <?php 
                        if ($add_service_we_offer_title) {
                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_service_we_offer_title.'</span>';
                        }
                        if ($add_service_we_offer_sub_title) {
                            echo '<h2 class="sub-title text-capitalize mb-0">'.$add_service_we_offer_sub_title.'</h2>';
                        }
                    ?>   
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <?php 
                        if ($add_service_we_offer_content) {
                            echo '<p class="desc mb-0 c-gray">'.$add_service_we_offer_content.'</p>';
                        }
                    ?>     
                </div>
            </div>
            <?php
            if (have_rows('add_service_we_offer_slider_data','option')) :
            ?>
                <div class="row justify-content-between">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <ul id="accordion">
                            <?php 
                            while (have_rows('add_service_we_offer_slider_data','option')) : the_row();

                                $add_service_we_offer_number   = get_sub_field('add_service_we_offer_number');
                                $add_service_we_offer_title    = get_sub_field('add_service_we_offer_title');
                                $add_service_we_offer_content  = get_sub_field('add_service_we_offer_content'); 
                                $add_service_read_more_link     = get_sub_field('add_service_read_more_link');
                            ?>
                                <li class="position-relative" data-required="false" data-status="opt<?php echo  $add_service_we_offer_number ; ?>" data-title="<?php echo $add_service_we_offer_title ; ?>">
                                    <?php 
                                        if ($add_service_we_offer_number) {
                                            echo '<b class="h5 c-white">'.$add_service_we_offer_number.'</b>';
                                        }
                                        if ($add_service_we_offer_title) {
                                            echo '<h3 class="c-white h5 mt-3">'.$add_service_we_offer_title.'</b></h3>';
                                        }
                                        if ($add_service_we_offer_content) {
                                            echo '<p class="desc mb-0 c-white">'.$add_service_we_offer_content.'</p>';
                                        }
                                        if( $add_service_read_more_link ){ 
                                            $link_url = $add_service_read_more_link['url'];
                                            $link_title = $add_service_read_more_link['title'];
                                            $link_target = $add_service_read_more_link['target'] ? $add_service_read_more_link['target'] : '_self';
                                            ?>
                                            <a class="bg-pink p-3 d-flex position-absolute bottom-0 end-0 c-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <img class="align-self-center ms-2" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/white-arrow.svg" alt=""/></a>
                                            <?php 
                                        }
                                    ?>
                                <?php 
                            endwhile; ?>
                        </ul>
                    </div>
                </div>
                <?php 
            endif; ?>
        </div>
    </div> 
    <?php
}