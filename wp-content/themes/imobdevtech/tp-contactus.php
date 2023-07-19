<?php

/**

 * Template Name: Contact Us Page

 *

 */

get_header(); 

?>

<?php

if( !empty( have_rows('contact_us_page_blocks') ) ){

    if( have_rows('contact_us_page_blocks') ):

        // Loop through rows.
        while ( have_rows('contact_us_page_blocks') ) : the_row();

            //Main Section
            if( get_row_layout() == 'main_section' ){
            
                $add_main_section_titile        = get_sub_field('add_main_section_titile');
                $add_main_section_heading       = get_sub_field('add_main_section_heading');
                $add_main_section_description   = get_sub_field('add_main_section_description');
                $add_contact_form_shortcode     = get_sub_field('add_contact_form_shortcode');

                if ( $add_main_section_titile || $add_main_section_heading || $add_main_section_description || $add_contact_form_shortcode ) {
        
                    ?>
                    <div class="hero-sect pt-5 mt-0 pt-lg-5 mt-lg-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                        </ol>
                                    </nav>
                                    <div class="text-center">
                                    <?php
                                        if($add_main_section_titile ){
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_main_section_titile.'</span>';
                                        }
                                        if($add_main_section_heading ){
                                            echo '<h1 class="sub-title mt-3 mb-2">'.$add_main_section_heading.'.</h1>';
                                        }              
                                        if($add_main_section_description ){
                                            echo '<p class="h5 c-gray lh-30 mb-0">'.$add_main_section_description.'.</p>';
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-10 contact-us-sect my-5">
                                    <div class="p-3 p-lg-5 bg-light">
                                    <?php 
                                        echo do_shortcode($add_contact_form_shortcode); 
                                    ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-10 text-center align-self-center">
                                    <div class="row">
                                    <?php
                                        if( have_rows('main_social_info') )
                                        {
                                            while( have_rows('main_social_info') ) { the_row();
                                                $add_social_icon = get_sub_field('add_social_icon');
                                                $add_social_text = get_sub_field('add_social_text');
            
                                                echo '<div class="text-center col-12 col-md-4 mb-4 mb-md-0">';
                                                    echo '<img src="'.esc_url($add_social_icon['url']).'" alt="'.esc_attr($add_social_icon['alt']).'"/>';
                                                    echo '<a href="tel:'.str_replace(' ', '', $add_social_text).'" class="c-black d-block mt-2">'.$add_social_text.'</a>';    
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

            }

            //Process Section
            if( get_row_layout() == 'process_section' ){

                $add_process_title          = get_sub_field('add_process_title');
                $add__process_heading       = get_sub_field('add__process_heading');
                $add_process_description    = get_sub_field('add_process_description');

                if ( $add_process_title || $add__process_heading || $add_process_description || !empty(have_rows('add_process_slider')) ) {
                    ?>
                    <div class="p-y-100 process-we-follow overflow-hidden position-relative">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-4 col-xxl-3 align-self-center">
                                    <div class="content-card text-center bg-pink p-4 p-md-5 d-flex justify-content-center align-items-center">
                                        <div>
                                        <?php
                                            if($add_process_title){
                                                echo '<span class="text-uppercase d-block c-white">'.$add_process_title.'</span>';
                                            }
                                            if($add__process_heading){
                                                echo ' <h2 class="c-white mt-2 sub-title">'.$add__process_heading.'</h2>';
                                            }
                                            if($add_process_description){
                                                echo '<p class="desc mb-0 c-white">'.$add_process_description.'</p>';
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-8 col-xxl-9">
                                    <div class="owl-carousel process-we-follow-carousel">
                                    <?php
                                        if( have_rows('add_process_slider') )
                                        {
                                            while( have_rows('add_process_slider') ) { the_row();
                                                $add_slider_title = get_sub_field('add_slider_title');
                                                $add_slider_heading = get_sub_field('add_slider_heading');
                                                $add_slider_description = get_sub_field('add_slider_description');
            
                                                echo ' <div class="py-4">';
                                                    echo '<div class="content-card p-4 p-md-4">';
                                                        echo '<b class="h5 c-pink">'.$add_slider_title.'</b>';
                                                        echo '<h3 class="c-black h5 mt-3"><b>'.$add_slider_heading.'</b></h3>';
                                                        echo '<p class="desc mb-0 c-black">'.$add_slider_description .'</p>';
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

            }

            //Location Section
            if( get_row_layout() == 'location_section' ){

                $add_location_title         = get_field('add_location_title');
                $add_location_heading       = get_field('add_location_heading');
                $add_location_description   = get_field('add_location_description');

                if ( $add_location_title || $add_location_heading || $add_location_description || !empty(have_rows('location_section_slider')) ) {
                ?>
                    <div class="why-choose locate-us p-y-100 position-relative">
                        <div class="container position-relative">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-9 col-lg-6 col-xl-6 align-self-center">
                                <?php
                                    if($add_location_title )
                                    {
                                        echo '<span class="text-uppercase small-title-txt d-block">'.$add_location_title.'</span>';
                                    }
                                    if($add_location_heading )
                                    {
                                        echo '<h2 class="sub-title text-capitalize">'.$add_location_heading.'</h2>';
                                    }
                                    if($add_location_description )
                                    {
                                        echo '<p class="desc mb-0">'.$add_location_description.'</p>';
                                    }
                                    ?>   
                                </div>
                            </div>
                            <div class="owl-carousel why-choose-carousel">
                            <?php
                                if( have_rows('location_section_slider') )
                                {
                                    while( have_rows('location_section_slider') ) { the_row();
                                        $add_slider_main_image = get_sub_field('add_slider_main_image');
                                        $add_slider_sub_image  = get_sub_field('add_slider_sub_image');
                                        $add_slider_heading    = get_sub_field('add_slider_heading');
                                        $add_slider_location   = get_sub_field('add_slider_location');
                                        $add_slider_mobile     = get_sub_field('add_slider_mobile');
                                        $add_slider_email      = get_sub_field('add_slider_email');

                                        echo ' <div> ';   
                                            echo '<div class="row justify-content-between mt-4 mt-md-5">';
                                                echo '<div class="col-12 col-md-12 col-lg-7 col-xl-7 col-xxl-8 mb-4 mb-lg-0">';
                                                    echo '<img src="'.esc_url($add_slider_main_image['url']).'" class="img-fluid slide-img" alt="'.esc_attr($add_slider_main_image['alt']).'"/>';
                                                echo '</div>';
                                                echo '<div class="col-12 col-md-12 col-lg-5 col-xl-5 col-xxl-4">';
                                                    echo '<div class="content-card p-4 p-md-5 mx-0 mx-lg-4 my-3 my-md-0">';
                                                        echo '<img class="ms-0" src="'.esc_url($add_slider_sub_image['url']).'" width="80" alt="'.esc_attr($add_slider_sub_image['alt']).'"/>';
                                                        echo '<h3 class="c-black my-3">'.$add_slider_heading.'</h3>';
                                                        echo '<p class="desc c-gray">'.$add_slider_location.'</p>';
                                                        echo '<a href="tel:'.$add_slider_mobile.'" class="c-pink d-block my-4">'.$add_slider_mobile.'</a>';
                                                        echo '<a href="mailto:'.$add_slider_email.'" class="c-pink d-block">'.$add_slider_email.'</a>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                }
                            ?> 
                        </div>
                        <div class="cust-nav-box d-flex bg-pink justify-content-between position-absolute bottom-0 end-0">
                            <div class="cust-dots d-flex align-self-center"></div>
                                <a class="cust-nav d-flex" href="javascript:void(0)"><img width="110" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nxt-arrow.svg" alt="alt"/></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            //Show Award Section
            if( get_row_layout() == 'award_section' ){

                $show_award_section = get_sub_field('show_award_section');

                if( $show_award_section == 1){
                    get_template_part( 'template-parts/awards-section/common', 'awardssection');
                }
            }

             //Show Blog Section
            if( get_row_layout() == 'blog_section' ){

                $show_blog_section = get_sub_field('show_blog_section');

                if( $show_blog_section == 1){
                    get_template_part( 'template-parts/blog-section/common', 'blogsection' );
                }

            }

            //FAQ
            if (get_row_layout() == 'faq_blocks') {

                $add_faq_title       = get_sub_field('add_faq_title');
                $add_faq_sub_title   = get_sub_field('add_faq_sub_title');
                $add_faq_desc        = get_sub_field('add_faq_desc');

                if ( $add_faq_title || $add_faq_sub_title || $add_faq_desc || !empty(have_rows('faq_section')) ) {
                ?>
                    <div class="p-y-100 blog-sect border-top">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 col-lg-6 text-center">
                                    <?php  
                                        if ( $add_faq_title ) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_faq_title.'</span>';
                                        }
                                        if ( $add_faq_sub_title ) {
                                            echo '<h2 class="sub-title text-capitalize mb-0">'.$add_faq_sub_title.'</h2>';
                                        }
                                        if ( $add_faq_desc ) {
                                            echo '<p class="desc mb-0">'.$add_faq_desc.'</p>';
                                        }
                                    ?>
                                </div>
                                <div class="clearfix mb-5"></div>
                                <?php
                                    $faq_schema = array();
                                    $faqincrement = 0;
                                    if ( !empty(have_rows('faq_section')) ) {
                                        if( have_rows('faq_section') ):
                                            echo '<div class="col-12 col-md-12 col-lg-12">';
                                                echo '<div class="accordion accordion-faq" id="accordionExample">';
                                                    while( have_rows('faq_section') ) : the_row();

                                                        $add_faq_question   = get_sub_field('add_faq_question');
                                                        $add_faq_answer     = get_sub_field('add_faq_answer');

                                                        if ( $add_faq_question || $add_faq_answer ) {
                                                            $faq_schema[] = imobtech_faq_question_array_generator($add_faq_question,$add_faq_answer);
                                                            if ( $faqincrement == 0 ) {
                                                                ?>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header">
                                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $faqincrement; ?>" aria-expanded="true" aria-controls="faq<?php echo $faqincrement; ?>">
                                                                            <?php echo $add_faq_question; ?>
                                                                        </button>
                                                                    </h2>
                                                                    <div id="faq<?php echo $faqincrement; ?>" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                                        <div class="accordion-body">
                                                                            <?php echo $add_faq_answer; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header">
                                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $faqincrement; ?>" aria-expanded="false" aria-controls="faq<?php echo $faqincrement; ?>">
                                                                            <?php echo $add_faq_question; ?>
                                                                        </button>
                                                                    </h2>
                                                                    <div id="faq<?php echo $faqincrement; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                        <div class="accordion-body">
                                                                            <?php echo $add_faq_answer; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        $faqincrement++;
                                                    endwhile;
                                                echo '</div>';
                                            echo '</div>';
                                        endif;
                                        imobtech_faq_schema_generator($faq_schema);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                } 
            }

            //Show Contact Us Section
            if( get_row_layout() == 'contact_us_section' ){

                $show_contact_us_section = get_sub_field('show_contact_us_section');

                if( $show_contact_us_section == 1){
                    get_template_part( 'template-parts/contatcus-footer/common', 'contactus' );
                }

            }

            //Client slider logo
            if (get_row_layout() == 'client_slider_logo') {
            
                $show_client_slider_from_common_section  = get_sub_field('show_client_slider_from_common_section');
                if ( $show_client_slider_from_common_section == 1 ) {
                    get_template_part( 'template-parts/clientslider-section/common', 'clientslider' );    
                }
            } 

            //Counter Section
            if (get_row_layout() == 'counter_block') {
            
                $show_counter_block  = get_sub_field('show_counter_block');

                if ( $show_counter_block == 1 ) {

                    get_template_part( 'template-parts/bannercounter-section/common', 'bannercounter' ); 
                }

            }
        endwhile;
    endif;
}

get_footer();