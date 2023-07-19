<?php

/**

 * Template Name: Services Page

 *

 */

get_header(); 


if( !empty( have_rows('service_main_page_settings') ) ){

    if( have_rows('service_main_page_settings') ):

        // Loop through rows.
        while ( have_rows('service_main_page_settings') ) : the_row();

            //hero Section
            if( get_row_layout() == 'our_services_section' ){


                $add_our_service_title      = get_sub_field ('add_our_service_title');
                $add_our_service_sub_title  = get_sub_field ('add_our_service_sub_title');


                if ( $add_our_service_title || $add_our_service_sub_title ) {
                    ?>
                    <div class="serv-hero-sect p-y-100">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                                        </ol>
                                    </nav>
                                    <?php
                                        if ( $add_our_service_title ) {
                                            echo '<h1 class="sub-title mt-3 mb-0">'.$add_our_service_title.'</h1>';
                                        }
                                        if ( $add_our_service_sub_title ) {
                                            echo '<p class="desc mb-0">'.$add_our_service_sub_title.'</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }

            // Development Section
            if( get_row_layout() == 'development_banner_section' ){

                if( have_rows('development_banner_layout_section') ):
                    ?>
                    <div class="serv-content-box">
                        <?php
                        while( have_rows('development_banner_layout_section') ) : the_row();
                            $add_development_banner_image  = get_sub_field('add_development_banner_image');
                            $add_development_title         = get_sub_field('add_development_title');
                            $add_development_sub_title     = get_sub_field('add_development_sub_title');
                            $add_development_content       = get_sub_field('add_development_content');
                            $add_development_page_link     = get_sub_field('add_development_page_link');
                            $add_right_side_image          = get_sub_field('add_right_side_image');
                            $add_right_side_number         = get_sub_field('add_right_side_number');
                            $add_right_side_content        = get_sub_field('add_right_side_content');
                            $add_bottom_right_side_image   = get_sub_field('add_bottom_right_side_image');
                            $add_development_description   = get_sub_field('add_development_description');

                            ?>
                            <div class="serv-content-sect bg-img position-relative" style="background-image: url(<?php echo esc_url($add_development_banner_image['url']); ?>" alt="<?php echo esc_attr($add_development_banner_image['alt']); ?>)">
                                <div class="container h-100">
                                    <div class="row justify-content-between align-items-end align-content-end position-relative h-100">
                                        <div class="col-12 col-md-12 col-lg-8 align-self-end">
                                            <div class="my-5">
                                                <?php
                                                    if ( $add_development_title ) {
                                                        echo '<span class="text-uppercase small-title-txt d-block">'.$add_development_title.'</span>';
                                                    }
                                                    if ( $add_development_sub_title ) {
                                                        echo '<h2 class="sub-title text-capitalize mb-1 c-white">'.$add_development_sub_title.'</h2>';
                                                    }
                                                    if ( $add_development_content ) {
                                                        echo '<p class="desc c-white mb-4">'.$add_development_content.'</p>';
                                                    }
                                                ?>

                                                <a href="<?php echo $add_development_page_link; ?>" class="d-inline-flex c-pink"><span>Read More</span> <img class="ms-3" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow.svg" alt="alt"/></a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-3">
                                            <div class="bg-pink h-100 w-100 text-center d-flex justify-content-center align-items-center py-4 py-lg-5">
                                                <div>
                                                    <?php
                                                        if ( $add_right_side_image ) {
                                                            echo '<img src="'.esc_url($add_right_side_image['url']).'" class="" alt="'.esc_attr($add_right_side_image['alt']).'"/>';
                                                        }
                                                        if ( $add_right_side_number ) {
                                                            echo '<h2 class="sub-title c-white text-capitalize mb-0">'.$add_right_side_number.'</h2>';
                                                        }
                                                        if ( $add_right_side_content ) {
                                                            echo '<p class="desc mb-0 c-white text-capitalize">'.$add_right_side_content.'</p>';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="meet-our-client p-b-100 bg-light-gray">
                                <div class="container">
                                    <div class="row justify-content-between">
                                        <div class="col-12 col-md-12 col-lg-8 col-xl-8 align-self-center">
                                            <div class="row mt-5 mt-md-5 mt-lg-3">
                                                <?php
                                                if( have_rows('add_development_technology_icons') ):
                                                    while( have_rows('add_development_technology_icons') ) : the_row();
                                                            $add_link   = get_sub_field('add_link');
                                                            $add_icon   = get_sub_field('add_icon');
                                                            $add_title  = get_sub_field('add_title'); 

                                                        ?>
                                                        <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 mb-4 mb-md-5">
                                                            <a href="<?php echo $add_link; ?>" class="text-center d-block">
                                                                <img class="m-auto" src="<?php echo esc_url($add_icon['url']); ?>" alt="<?php echo esc_attr($add_icon['alt']); ?>)">
                                                                <span class="d-block c-black mt-2 text-uppercase"><?php echo $add_title; ?></span>
                                                            </a>
                                                        </div>
                                                        <?php
                                                    endwhile ;
                                                endif; ?>
                                            </div>  
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-3 d-none d-lg-block">
                                            <?php
                                                if ( $add_bottom_right_side_image ) {
                                                    echo '<img src="'.esc_url($add_bottom_right_side_image['url']).'" class="img-fluid" alt="'.esc_attr($add_bottom_right_side_image['alt']).'"/>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 mt-0 mt-lg-5">
                                            <?php
                                                if ( $add_development_description ) {
                                                    echo $add_development_description;
                                                }
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;?>
                    </div>
                    <?php
                endif; 
            }

            //We Follow Section
            if( get_row_layout() == 'we_follow_section' ){
                $add_we_follow_title       = get_sub_field('add_we_follow_title');
                $add_we_follow_sub_title   = get_sub_field('add_we_follow_sub_title');
                $add_we_follow_content     = get_sub_field('add_we_follow_content');

                if ( $add_we_follow_title || $add_we_follow_sub_title || $add_we_follow_content || !empty(have_rows('process_we_follow_slider_data')) ) {
                    ?>
                    <div class="why-choose p-y-100 position-relative">
                        <div class="container position-relative">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-9 col-lg-6 col-xl-6 align-self-center">
                                    <?php 
                                        if ($add_we_follow_title) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_we_follow_title.'</span>';
                                        }
                                        if ($add_we_follow_sub_title) {
                                            echo '<h2 class="sub-title text-capitalize">'.$add_we_follow_sub_title.'</h2>';
                                        }
                                        if ($add_we_follow_content) {
                                            echo '<p class="desc mb-0">'.$add_we_follow_content.'</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                                if (have_rows('process_we_follow_slider_data')) :
                                    
                                    echo '<div class="owl-carousel why-choose-carousel">'; 
                                        while (have_rows('process_we_follow_slider_data')) : the_row();

                                            $add_process_we_follow_left_side_image         = get_sub_field('add_process_we_follow_left_side_image');
                                            $add_process_we_follow_right_side_number       = get_sub_field('add_process_we_follow_right_side_number');
                                            $add_process_we_follow_right_side_title        = get_sub_field('add_process_we_follow_right_side_title'); 
                                            $add_process_we_follow_right_side_content      = get_sub_field('add_process_we_follow_right_side_content'); 
                                            ?>
                                            <div>
                                                <div class="row justify-content-between mt-5">
                                                    <div class="col-12 col-md-12 col-lg-7 col-xl-7 col-xxl-8 mb-4 mb-lg-0">
                                                        <?php 
                                                            if ($add_process_we_follow_left_side_image) {
                                                                echo '<img src="'. esc_url($add_process_we_follow_left_side_image['url']).'" class="img-fluid slide-img" alt="'. esc_attr($add_process_we_follow_left_side_image['alt']).'"/>';
                                                            }
                                                        ?>  
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-5 col-xl-5 col-xxl-4">
                                                        <div class="content-card p-4 p-md-5 mx-0 mx-lg-4 my-3 my-md-0">
                                                            <?php  
                                                                if ($add_process_we_follow_right_side_number) {
                                                                    echo '<b class="c-pink">'.$add_process_we_follow_right_side_number.'</b>';
                                                                }
                                                                if ($add_process_we_follow_right_side_title) {
                                                                    echo '<h3 class="c-black my-3">'.$add_process_we_follow_right_side_title.'</h3>';
                                                                }
                                                                if ($add_process_we_follow_right_side_content) {
                                                                    echo '<p class="desc c-gray">'.$add_process_we_follow_right_side_content.'</p>';
                                                                }
                                                            ?>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <?php 
                                        endwhile;  
                                    echo '</div>'; 
                                endif; ?>

                            <div class="cust-nav-box d-flex bg-pink justify-content-between position-absolute bottom-0 end-0">
                                <div class="cust-dots d-flex align-self-center"></div>
                                <a class="cust-nav d-flex" href="javascript:void(0)"><img width="110" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nxt-arrow.svg" alt="alt"/></a>
                            </div>    
                        </div>
                    </div>
                    <?php
                }
            }
            
            //Portfolio Section 
            if( get_row_layout() == 'portfolio_section' ){
                $select_portfolio           = get_sub_field('select_portfolio');
                $add_portfolio_main_title   = get_sub_field('add_portfolio_title');
                $add_portfolio_subtitle     = get_sub_field('add_portfolio_subtitle');
                $add_portfolio_description  = get_sub_field('add_portfolio_description');

                if ( $select_portfolio || $add_portfolio_main_title || $add_portfolio_subtitle || $add_portfolio_description ){
                    ?> 
                    <div class="portfolio-sect bg-light-gray position-relative overflow-hidden">
                        <div class="container position-relative">
                            <div class="p-0 p-5 w-50 top-0 end-0 position-absolute main-content-box mt-4">
                                <?php
                                    if ( $add_portfolio_main_title ) {
                                        echo '<span class="text-uppercase small-title-txt d-block">'.$add_portfolio_main_title.'</span>';
                                    }
                                    if ( $add_portfolio_subtitle ) {
                                        echo '<h2 class="sub-title text-capitalize mb-0">'.$add_portfolio_subtitle.'</h2>';
                                    }
                                    if ( $add_portfolio_description ) {
                                        echo '<p class="desc mb-0">'.$add_portfolio_description.'</p>';
                                    }
                                ?>
                            </div>
                            <div class="owl-carousel portfolio-carousel">
                                <?php
                                    if( $select_portfolio ){

                                        foreach ($select_portfolio as $key => $portfolioval) {
                                            ?>
                                            <div class="item">
                                                <div class="row g-0 justify-content-between">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="bg-img h-100" style="background-image: url(<?php echo get_the_post_thumbnail_url($portfolioval); ?>"></div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="d-flex flex-column justify-content-end h-100 position-relative" style="z-index: 1">
                                                            <div class="p-0 p-5 bg-white">
                                                                <h3 class="sub-title text-capitalize mb-3"><?php echo get_the_title($portfolioval); ?></h3>
                                                                <p class="desc mb-0 w-75"><?php echo get_the_content($portfolioval); ?>... <a href="<?php echo get_the_permalink($portfolioval); ?>" class="c-pink">Read More</a></p>

                                                                <?php
                                                                    if ( !empty( have_rows('add_portfolio_common_icon_image','option') ) ) {
                                                                        if( have_rows('add_portfolio_common_icon_image','option') ):
                                                                            echo '<div class="d-flex mt-5 pt-5 tech-box position-relative">';
                                                                                while( have_rows('add_portfolio_common_icon_image','option') ) : the_row();

                                                                                    $add_portfolio_icon_image = get_sub_field('add_portfolio_icon_image');

                                                                                    if ( $add_portfolio_icon_image ) {
                                                                                        echo '<img class="me-5" src="'.esc_url($add_portfolio_icon_image['url']).'" alt="'.esc_attr($add_portfolio_icon_image['alt']).'"/>';
                                                                                    }
                                                                                endwhile;
                                                                            echo '</div>';
                                                                        endif;
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
                                ?>
                            </div>
                            <div class="nxt-btns position-absolute bottom-0">
                                <div class="customNextBtn bg-pink cust-btn p-3 d-inline-flex justify-content-center">Next <img class="ms-2 align-self-center" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/white-arrow.svg" alt="alt"/></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            //Show Award Section
            if( get_row_layout() == 'awards_section' ){

                $show_awards_block_common_section = get_sub_field('show_awards_block_common_section');

                if( $show_awards_block_common_section == 1){
                    get_template_part( 'template-parts/awards-section/common', 'awardssection');
                }
            }

            //Blog Section
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

                $show_contact_us_block_common_section = get_sub_field('show_contact_us_block_common_section');

                if( $show_contact_us_block_common_section == 1){
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




get_footer(); ?>