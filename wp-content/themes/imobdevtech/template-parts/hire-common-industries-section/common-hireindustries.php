<?php
$add_industries_we_serve_title      = get_field('add_industries_we_serve_title','option');
$add_industries_we_serve_sub_title  = get_field('add_industries_we_serve_sub_title','option');
$add_industries_we_serve_content    = get_field('add_industries_we_serve_content','option');

if ($add_industries_we_serve_title || $add_industries_we_serve_sub_title || $add_industries_we_serve_content || !empty(have_rows('add_industries_we_serve_slider','option'))) 
{
    ?>  
    <div class="industries-we-serve bg-black p-y-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-lg-5">
                    <?php
                    if ($add_industries_we_serve_title) {
                        echo '<span class="text-uppercase small-title-txt d-block">' . $add_industries_we_serve_title . '</span>';
                    }
                    if ($add_industries_we_serve_sub_title) {
                        echo '<h2 class="sub-title text-capitalize mb-0 c-white">' . $add_industries_we_serve_sub_title . '</h2>';
                    }
                    ?>
                </div>
                <div class="col-12 col-md-6 col-lg-5 align-self-center">
                    <?php
                    if ($add_industries_we_serve_content) {
                        echo'<p class="desc mb-0 c-white">' . $add_industries_we_serve_content . '</p>';
                    }
                    ?>
                </div>
                <div class="clearfix mt-5"></div>
                <?php
                if (have_rows('add_industries_we_serve_slider','option')) {
                    echo '<div class="owl-carousel industries-we-serve-carousel">';
                        $classes = array(
                            'mt-3 mt-lg-0',
                            'mt-3 mt-lg-5'
                        );
                        $counter = 0;
                        while (have_rows('add_industries_we_serve_slider','option')) {
                            the_row();
                            $add_industries_we_serve_image          = get_sub_field('add_industries_we_serve_image');
                            $add_industries_we_serve_image_title    = get_sub_field('add_industries_we_serve_image_title');
                            $add_industries_we_serve_image_content  = get_sub_field('add_industries_we_serve_image_content');
                            $add_industries_we_serve_page_link      = get_sub_field('add_industries_we_serve_page_link');
                            $class                                  = $classes[$counter % count($classes)];
                            $counter++;

                            if ( $add_industries_we_serve_page_link || $add_industries_we_serve_image || $add_industries_we_serve_image_title || $add_industries_we_serve_image_content ) {

                                echo '<div class="' . $class . '">';
                                    echo '<div class="industries-box overflow-hidden m-2">';
                                        if ( !empty( $add_industries_we_serve_page_link ) ) {
                                            echo '<a class="d-block position-relative" href="' . $add_industries_we_serve_page_link . '">';
                                                if ($add_industries_we_serve_image) {
                                                    echo '<img src="' . esc_url($add_industries_we_serve_image['url']) . '" class="img-fluid" alt="' . esc_attr($add_industries_we_serve_image['alt']) . '"/>';
                                                }
                                                if ( $add_industries_we_serve_image_title || $add_industries_we_serve_image_content ) {
                                                    echo '<div class="inner-box text-center position-absolute w-100 h-100 p-4 c-white top-0 bottom-0 d-flex flex-column justify-content-center">';
                                                        if ($add_industries_we_serve_image_title) {
                                                            echo '<h3 class="small-title-txt mb-1">' . $add_industries_we_serve_image_title . '</h3>';
                                                        }
                                                        if ($add_industries_we_serve_image_content) {
                                                            echo '<p class="desc mb-0">' . $add_industries_we_serve_image_content . '</p>';
                                                        }
                                                    echo '</div>';
                                                }
                                            echo '</a>';
                                        }else{
                                            if ($add_industries_we_serve_image) {
                                                echo '<img src="' . esc_url($add_industries_we_serve_image['url']) . '" class="img-fluid" alt="' . esc_attr($add_industries_we_serve_image['alt']) . '"/>';
                                            }
                                            if ( $add_industries_we_serve_image_title || $add_industries_we_serve_image_content ) {
                                                echo '<div class="inner-box text-center position-absolute w-100 h-100 p-4 c-white top-0 bottom-0 d-flex flex-column justify-content-center">';
                                                    if ($add_industries_we_serve_image_title) {
                                                        echo '<h3 class="small-title-txt mb-1">' . $add_industries_we_serve_image_title . '</h3>';
                                                    }
                                                    if ($add_industries_we_serve_image_content) {
                                                        echo '<p class="desc mb-0">' . $add_industries_we_serve_image_content . '</p>';
                                                    }
                                                echo '</div>';
                                            }
                                        }
                                    
                                    echo '</div>';
                                echo '</div>';
                                
                            }
                        }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>                    
    </div>
    <?php
}