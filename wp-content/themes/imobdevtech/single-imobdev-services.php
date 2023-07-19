<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Imobdev Technology
 */

get_header(); ?>
<style type="text/css">
    .body-dyn-content p{
        margin-top: 15px !important;
        margin-bottom: 0 !important;
    }
</style>
<?php

if( !empty( have_rows('services_flexible_blocks') ) ){

    if( have_rows('services_flexible_blocks') ):

        // Loop through rows.
        while ( have_rows('services_flexible_blocks') ) : the_row();

            // Case: Hero Banner
            if( get_row_layout() == 'hero_banner' ){

                $add_hero_banner_title                      = get_sub_field('add_hero_banner_title');
                $add_hero_banner_image                      = get_sub_field('add_hero_banner_image');
                $add_hero_banner_content                    = get_sub_field('add_hero_banner_content');
                $add_hero_banner_right_side_image           = get_sub_field('add_hero_banner_right_side_image');
                $add_hero_banner_right_side_count           = get_sub_field('add_hero_banner_right_side_count');
                $add_hero_banner_right_side_project_name    = get_sub_field('add_hero_banner_right_side_project_name');

                if ( $add_hero_banner_title || $add_hero_banner_image || $add_hero_banner_content || $add_hero_banner_right_side_image || $add_hero_banner_right_side_count || $add_hero_banner_right_side_project_name ) {
                    ?>
                    <div class="serv-hero-sect pb-0">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-5 col-lg-5 align-self-center">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                                        </ol>
                                    </nav>
                                    <?php
                                        if ( $add_hero_banner_title || $add_hero_banner_content ) {
                                            echo '<h1 class="sub-title mt-3 mb-0">'.$add_hero_banner_title.'</h1>';
                                            echo '<p class="desc c-gray mt-4 mb-0">'.$add_hero_banner_content.'</p>';
                                        }
                                    ?>
                                </div>
                                <?php
                                    if ( $add_hero_banner_image ) {
                                        echo '<div class="col-12 col-md-7 col-lg-7">';
                                            echo '<img src="'.esc_url($add_hero_banner_image['url']).'" class="img-fluid" alt="'.esc_attr($add_hero_banner_image['alt']).'"/>';
                                            
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            //Counter Section
            if (get_row_layout() == 'counter_block') {
            
                $show_counter_block  = get_sub_field('show_counter_block');
                if ( $show_counter_block == 1 ) {
                    get_template_part( 'template-parts/bannercounter-section/common', 'bannercounter' ); 
                }
            }

            if (get_row_layout() == 'overview_blocks') {

                $add_overview_title     = get_sub_field('add_overview_title');
                $add_overview_sub_title = get_sub_field('add_overview_sub_title');
                $add_overview_image     = get_sub_field('add_overview_image');
                $add_overview_content   = get_sub_field('add_overview_content');

                if ( $add_overview_title || $add_overview_sub_title || $add_overview_image || $add_overview_content ) {
                    ?>
                    <div class="meet-our-client p-b-100 bg-light-gray">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-9 col-lg-6 col-xl-6 align-self-center">
                                    <?php 
                                        if ($add_overview_title) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_overview_title.'</span>';
                                        }
                                        if ($add_overview_sub_title) {
                                            echo '<h2 class="sub-title text-capitalize mb-0">'.$add_overview_sub_title.'</h2>';
                                        }
                                    ?>  
                                </div>
                                <div class="col-12 col-md-3 col-lg-3">
                                    <?php 
                                        if ($add_overview_image) {
                                            echo '<img src="'.esc_url($add_overview_image['url']).'" class="img-fluid" alt="'.esc_attr($add_overview_image['alt']).'"/>';
                                        }
                                    ?>
                                    
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12 mt-3 body-dyn-content">
                                    <?php 
                                        if ($add_overview_content) {
                                            echo $add_overview_content;
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }

            

             //Why Choose Blocks
            if (get_row_layout() == 'why_choose_blocks') {

                $add_why_choose_title       = get_sub_field('add_why_choose_title');
                $add_why_choose_sub_title   = get_sub_field('add_why_choose_sub_title');
                $add_why_choose_content     = get_sub_field('add_why_choose_content');

                if ( $add_why_choose_title || $add_why_choose_sub_title || $add_why_choose_content || !empty(have_rows('add_why_choose_repeater')) ) {
                    ?>
                    <div class="why-choose process-we-follow-new p-y-100 position-relative">
                        <div class="container position-relative">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-9 col-lg-8 col-xl-7 align-self-center text-center">
                                    <?php 
                                        if ($add_why_choose_title) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_why_choose_title.'</span>';
                                        }
                                        if ($add_why_choose_sub_title) {
                                            echo '<h2 class="sub-title text-capitalize mb-0">'.$add_why_choose_sub_title.'</h2>';
                                        }
                                        if ($add_why_choose_content) {
                                            echo '<p class="desc mb-0">'.$add_why_choose_content.'</p>';
                                        }
                                    ?>   
                                </div>
                                <?php
                                if (have_rows('add_why_choose_repeater')) :
                                    ?>        
                                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 mt-5">
                                        <div class="owl-carousel why-choose-carousel process-we-follow-carousel-2">
                                            <?php
                                            while (have_rows('add_why_choose_repeater')) : the_row();
                                                   
                                                $add_why_choose_right_side_number = get_sub_field('add_why_choose_right_side_number');
                                                $add_why_choose_right_side_title  = get_sub_field('add_why_choose_right_side_title'); 
                                                $add_why_choose_right_side_content = get_sub_field('add_why_choose_right_side_content'); 
                                                ?>
                                                <div>
                                                    <div class="content-card p-4 p-md-5">
                                                        <?php 
                                                            if ($add_why_choose_right_side_number) {
                                                                echo '<b class="c-pink">'.$add_why_choose_right_side_number.'</b>';
                                                            }
                                                            if ($add_why_choose_right_side_title) {
                                                                echo '<h3 class="c-black my-3">'.$add_why_choose_right_side_title.'</h3>';
                                                            }
                                                            if ($add_why_choose_right_side_content) {
                                                                echo '<p class="desc c-gray">'.$add_why_choose_right_side_content.'</p>';
                                                            }
                                                        ?>  
                                                    </div>   
                                                </div>
                                                <?php 
                                            endwhile; ?>
                                        </div>     
                                    </div>
                                    <?php
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                } 
            }

            //Service We Offer Blocks
            if (get_row_layout() == 'service_we_offer_blocks') {

                $show_service_we_offer_block  = get_sub_field('show_service_we_offer_block');

                if ( $show_service_we_offer_block == 1 ) {
                    get_template_part( 'template-parts/serviceweoffer-section/common', 'serviceweoffer' );
                }

            }

            //Portfolio Blocks
            if (get_row_layout() == 'portfolio_blocks') {

                $select_portfolio                   = get_sub_field('select_portfolio');

                $add_portfolio_main_title           = get_sub_field('add_portfolio_main_title');
                $add_portfolio_subtitle             = get_sub_field('add_portfolio_subtitle');
                $add_portfolio_description          = get_sub_field('add_portfolio_description');

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

            //Peocess We Follow Blocks
            if (get_row_layout() == 'peocess_we_follow_blocks') {

                $show_process_we_follow_block  = get_sub_field('show_process_we_follow_block');

                if ( $show_process_we_follow_block == 1 ) {
                    get_template_part( 'template-parts/processwegollow-section/common', 'processwegollow' );
                }
            }

            //Awards and Recognition Blocks
            if (get_row_layout() == 'awards_and_recognition_blocks') {

                $show_awards_block = get_sub_field('show_awards_block');

                if ( $show_awards_block == 1 ) {
                    get_template_part( 'template-parts/awards-section/common', 'awardssection' );   
                }
                
            }

            //Show Blog blocks
            if (get_row_layout() == 'show_blog_blocks') {
            
                $show_common_blog  = get_sub_field('show_common_blog');

                if ( $show_common_blog == 1 ) {
                    get_template_part( 'template-parts/blog-section/common', 'blogsection' );
                }

            }

            // Client Testimonial 
            if (get_row_layout() == 'testimonial_blocks') {
                
                $add_testimonial = get_sub_field('add_testimonial');
                
                if( $add_testimonial == 1 ){
                    get_template_part( 'template-parts/testimonial-section/common', 'testimonialsection' );       
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
 

            //Contact Us Blocks
            if (get_row_layout() == 'contact_us_blocks') {
            
                $show_contact_us  = get_sub_field('show_contact_us');

                if ( $show_contact_us == 1 ) {
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

        endwhile;
    endif;
}

get_footer();