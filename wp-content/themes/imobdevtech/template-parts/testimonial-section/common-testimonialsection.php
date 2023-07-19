<?php
$add_testimonial_title               = get_field('add_testimonial_title','option');
$add_testimonial_subtitle            = get_field('add_testimonial_subtitle','option');
$add_testimonial_short_description   = get_field('add_testimonial_short_description','option');

if ( $add_testimonial_title || $add_testimonial_subtitle || $add_testimonial_short_description || !empty(have_rows('add_testimonial_slider_data')) ) {

    ?>
    <div class="p-y-100 bg-black client-testimonial position-relative">
        <div class="container">
            <div class="row justify-content-center c-white mb-5">
                <div class="col-12 col-md-12 col-lg-10 col-xl-5 text-center">
                    <?php
                        if ( $add_testimonial_title ){
                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_testimonial_title.'</span>';
                        }
                        if ( $add_testimonial_subtitle ){
                            echo '<h2 class="sub-title text-capitalize mb-0 c-white">'.$add_testimonial_subtitle.'</h2>';
                        }
                        if ( $add_testimonial_short_description ){
                            echo '<p class="desc mb-0">'.$add_testimonial_short_description.'</p>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="container-fluid carousel-sect">
            <div class="owl-carousel client-testimonial-carousel">
                
                <?php
                    if ( !empty( have_rows('add_testimonial_slider_data','option') ) ) {
                        if( have_rows('add_testimonial_slider_data','option') ):
                            while( have_rows('add_testimonial_slider_data','option') ) : the_row();

                                $add_testimonial_content            = get_sub_field('add_testimonial_content');
                                $add_testimonial_client_image       = get_sub_field('add_testimonial_client_image');
                                $add_testimonial_client_name        = get_sub_field('add_testimonial_client_name');
                                $add_testimonial_client_designation = get_sub_field('add_testimonial_client_designation');
                                
                                if ( $add_testimonial_content || $add_testimonial_client_image || $add_testimonial_client_name || $add_testimonial_client_designation ) {

                                    ?>
                                    <div>
                                        <div class="text-center p-3">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/qoute-icn.svg" alt=""/>
                                            <?php
                                                if ( $add_testimonial_content ) {
                                                    echo '<p class="desc my-5 c-white">'.$add_testimonial_content.'</p>';
                                                }
                                                if ( $add_testimonial_client_image ) {
                                                    echo '<img width="80" height="80" class="rounded-circle" src="'.esc_url($add_testimonial_client_image['url']).'" alt="'.esc_attr($add_testimonial_client_image['alt']).'"/>';
                                                }
                                                if ( $add_testimonial_client_name ) {
                                                    echo '<h3 class="small-title-txt mb-1 mt-3">'.$add_testimonial_client_name.'</h3>';
                                                }
                                                if ( $add_testimonial_client_designation ) {
                                                    echo '<span class="c-white">'.$add_testimonial_client_designation.'</span>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    
                                }
                                
                            endwhile;
                        endif;
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
    
}
