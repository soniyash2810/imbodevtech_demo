<?php

/**

 * Template Name: About Us Page

 *

 */

get_header(); 


if( !empty( have_rows('about_us_flexible_blocks') ) ){

    if( have_rows('about_us_flexible_blocks') ):

        // Loop through rows.
        while ( have_rows('about_us_flexible_blocks') ) : the_row();

            // Why Choose Block
            if( get_row_layout() == 'why_choose_block' ){

                $add_why_choose_title       = get_sub_field('add_why_choose_title');
                $add_why_choose_sub_title   = get_sub_field('add_why_choose_sub_title');
                

                if ( $add_why_choose_title || $add_why_choose_sub_title ) {
                    ?>
                    <div class="serv-hero-sect p-y-100">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                        </ol>
                                    </nav>
                                    <?php
                                        if ( $add_why_choose_title ) {
                                            echo '<h1 class="sub-title mt-3 mb-0">'.$add_why_choose_title.'</h1>';
                                            
                                        }
                                        if ( $add_why_choose_sub_title ) {
                                            echo '<p class="desc mb-0">'.$add_why_choose_sub_title.'</p>';
                                        }
                                    ?>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }
        
            
            //About Us Block
            if( get_row_layout() == 'about_us_block' ){

                $add_about_us_title                    =  get_sub_field('add_about_us_title');
                $add_about_us_sub_title                =  get_sub_field('add_about_us_sub_title');
                $add_about_us_banner_image             =  get_sub_field('add_about_us_banner_image');
                $add_about_us_description              =  get_sub_field('add_about_us_description');


               

                if ( $add_about_us_title || $add_about_us_sub_title || $add_about_us_banner_image || $add_about_us_description ) {
                    ?>

                    <div class="about-sect">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-5 align-self-center mt-5 mt-lg-0">
                                    <div class="pe-0 pe-md-5 pe-lg-5">
                                        <?php
                                            if ( $add_about_us_title ) {
                                                echo '<span class="text-uppercase small-title-txt d-block">'.$add_about_us_title.'</span>';   
                                            }
                                            if ( $add_about_us_sub_title ) {
                                                echo '<h2 class="sub-title c-white text-capitalize mb-4 mb-lg-0">'.$add_about_us_sub_title.'</h2>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7">
                                    <?php
                                        if ( $add_about_us_banner_image ) {
                                            echo '<img src ="' . esc_url($add_about_us_banner_image['url']) . '" class="img-fluid" alt="' . esc_attr($add_about_us_banner_image['alt']) . '" />';
  
                                        }
                                        if ( $add_about_us_description ) {
                                            echo $add_about_us_description;
                                        }
                                    ?>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }
       
            
            //Meet Our Client Block
            if( get_row_layout() == 'meet_our_client_block' ){

                $add_our_client_title              =  get_sub_field('add_our_client_title');
                $add_our_client_sub_title          =  get_sub_field('add_our_client_sub_title');
                $add_our_client_description        =  get_sub_field('add_our_client_description');
                $add_our_client_right_side_banner  =  get_sub_field('add_our_client_right_side_banner');   


                if ( $add_our_client_title || $add_our_client_sub_title || $add_our_client_description || $add_our_client_right_side_banner || !empty(have_rows('meet_our_client_layout')) ) {
                    ?>

                    <div class="meet-our-client p-b-100 bg-light-gray">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-12 col-lg-8 col-xl-8 order-1 order-lg-0">
                                    <div class="mt-4 pt-0 mt-lg-5 pt-lg-5">
                                        <?php
                                            if ( $add_our_client_title ) {
                                                echo '<span class="text-uppercase small-title-txt d-block">'.$add_our_client_title.'</span>';                                          
                                            }

                                            if ( $add_our_client_sub_title ) {
                                                echo '<h2 class="sub-title text-capitalize mb-3">'.$add_our_client_sub_title.'</h2>';
                                            }

                                            if ( $add_our_client_description ) {
                                                echo '<p class="desc mb-0">'.$add_our_client_description.'</p>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-3 order-0 order-lg-1">
                                    <?php
                                        if ( $add_our_client_right_side_banner ) {
                                            echo '<img src="'.esc_url($add_our_client_right_side_banner['url']).'" class="img-fluid" alt="'.esc_attr($add_our_client_right_side_banner['alt']).'"/>';   
                                        }
                                    ?>
                                </div>
                            </div>

                            <?php
                            if (have_rows('meet_our_client_layout')) :
                                ?>
                                <div class="row justify-content-between mt-5">
                                    <?php 
                                    while (have_rows('meet_our_client_layout')) : the_row();

                                        $add_expertise_title   = get_sub_field('add_expertise_title');
                                        $add_expertise_sub_title  = get_sub_field('add_expertise_sub_title');
                                        ?>
                                        <div class="col-12 col-md-12 col-xl-4 mb-4 mb-xl-0">
                                            <div class="card-box p-4 h-100">
                                                <?php
                                                    if ( $add_expertise_title ) {
                                                        echo '<h3 class="h4 mb-3"><b>'.$add_expertise_title.'</b></h3>';     
                                                    }

                                                    if ( $add_expertise_sub_title ) {
                                                        echo '<p class="desc mb-0">'.$add_expertise_sub_title.'</p>';   
                                                    }
                                                ?>  
                                            </div> 
                                        </div>
                                        <?php 
                                    endwhile; ?>
                                </div>
                                <?php 
                            endif; ?>
                        </div>
                    </div>
                    <?php 
                }
            }
       
            
            // We Are Here Help Block 
            if( get_row_layout() == 'we_are_here_help_block' ){

                $add_we_are_help_title        =  get_sub_field('add_we_are_help_title');
                $add_we_are_help_sub_title    =  get_sub_field('add_we_are_help_sub_title');
                $add_we_are_help_description  =  get_sub_field('add_we_are_help_description');


                if ( $add_we_are_help_title || $add_we_are_help_sub_title || $add_we_are_help_description || !empty(have_rows('add_we_are_help_slider_data')) ) {
                    ?>

                    <div class="p-y-100 process-we-follow overflow-hidden position-relative">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-4 col-xxl-3 align-self-center">
                                    <div class="content-card text-center bg-pink p-4 p-md-5 d-flex justify-content-center align-items-center">
                                        <div>
                                            <?php
                                                if ( $add_we_are_help_title ) {
                                                    echo '<span class="text-uppercase d-block c-white">'.$add_we_are_help_title.'</span>';
                                                }

                                                if ( $add_we_are_help_sub_title ) {
                                                    echo '<h2 class="c-white mt-2 sub-title">'.$add_we_are_help_sub_title.'</h2>';                                               
                                                }

                                                if ( $add_we_are_help_description ) {
                                                    echo '<p class="desc mb-0 c-white">'.$add_we_are_help_description.'</p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                if (have_rows('add_we_are_help_slider_data')) :
                                ?>
                                    <div class="col-12 col-md-6 col-lg-6 col-xl-8 col-xxl-9">
                                        <div class="owl-carousel process-we-follow-carousel">
                                            <?php 
                                            while (have_rows('add_we_are_help_slider_data')) : the_row();
                                                $add_we_are_help_number = get_sub_field('add_we_are_help_number');
                                                $add_we_are_help_title  = get_sub_field('add_we_are_help_title');
                                                $add_we_are_help_description = get_sub_field('add_we_are_help_description');
                                                ?>
                                                <div class="py-4">
                                                    <div class="content-card p-4 p-md-4">
                                                        <?php 
                                                            if ($add_we_are_help_number) {
                                                                echo '<b class="h5 c-pink">'.$add_we_are_help_number.'</b>';
                                                            }
                                                            if ($add_we_are_help_title) {
                                                                echo '<h3 class="c-black h5 mt-3"><b>'.$add_we_are_help_title.'</b></h3>';

                                                            }
                                                            if ($add_we_are_help_description) {
                                                                echo '<p class="desc mb-0 c-black">'.$add_we_are_help_description.'</p>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php 
                                            endwhile; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }
      
            //Message From CEO Block
            if( get_row_layout() == 'message_from_ceo_block' ){

                $add_ceo_message_title        =  get_sub_field('add_ceo_message_title');
                $add_ceo_message_sub_title    =  get_sub_field('add_ceo_message_sub_title');
                $add_ceo_message_description  =  get_sub_field('add_ceo_message_description');
                $add_ceo_image                =  get_sub_field('add_ceo_image');

                if ( $add_ceo_message_title || $add_ceo_message_sub_title || $add_ceo_message_description || $add_ceo_image ) {
                    ?>

                    <div class="position-relative border-top">
                        <div class="container">
                            <div class="row g-0 justify-content-between mt-5 mt-xl-0">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 align-self-center mb-4 mb-xl-0">
                                    <div class="px-0 px-lg-5 main-content-box">
                                        <?php 
                                            if ($add_ceo_message_title) {
                                                echo '<span class="text-uppercase small-title-txt d-block">'.$add_ceo_message_title.'</span>';
                                            }
                                                 
                                            if ($add_ceo_message_sub_title) {
                                                echo '<h2 class="sub-title text-capitalize mb-0">'.$add_ceo_message_sub_title.'</h2>';
                                                
                                            }
                                            if ($add_ceo_message_description) {
                                                echo '<p class="desc mb-0">'.$add_ceo_message_description.'</p>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <?php
                                        if ( $add_ceo_image ) {
                                            echo '<img src="'.esc_url($add_ceo_image['url']).'" class="img-fluid" alt="'.esc_attr($add_ceo_image['alt']).'"/>';                                                
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }         
   
            
            //Portfolio Section
            if( get_row_layout() == 'portfolio_block' ){
                $add_portfolio_title        = get_sub_field('add_portfolio_title');
                $add_portfolio_sub_title    = get_sub_field('add_portfolio_sub_title');
                $add_portfolio_description  = get_sub_field('add_portfolio_description');
                $select_portfolio           = get_sub_field('select_portfolio');


                if ( !empty( $select_portfolio ) ){
                    ?> 
                    <div class="portfolio-sect bg-light-gray position-relative overflow-hidden">
                        <div class="container position-relative">
                            <div class="p-0 p-5 w-50 top-0 end-0 position-absolute main-content-box mt-4">
                                <?php
                                    if ( $add_portfolio_title ) {
                                        echo '<span class="text-uppercase small-title-txt d-block">'.$add_portfolio_title.'</span>';
                                    }
                                    if ( $add_portfolio_sub_title  ) {
                                        echo '<h2 class="sub-title text-capitalize mb-0">'.$add_portfolio_sub_title .'</h2>';
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
                                                                    if ( !empty( have_rows('add_portfolio_common_icon_image') ) ) {
                                                                        if( have_rows('add_portfolio_common_icon_image') ):
                                                                            echo '<div class="d-flex mt-5 pt-5 tech-box position-relative">';
                                                                                while( have_rows('add_portfolio_common_icon_image') ) : the_row();

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

            
            //Awards Section
            if (get_row_layout() == 'awards_and_recognition_block') {
            
                $show_awards_and_recognition_block  = get_sub_field('show_awards_and_recognition_block');

                if ( $show_awards_and_recognition_block == 1 ) {

                    get_template_part( 'template-parts/awards-section/common', 'awardssection' );     
                }

            }

            
            //Blog Section
            if (get_row_layout() == 'blog_section_block') {
            
                $show_blog_section  = get_sub_field('show_blog_section');

                if ( $show_blog_section == 1 ) {

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


            //Contact Us Section
            if (get_row_layout() == 'contact_us_section_block') {
            
                $show_contact_us_block  = get_sub_field('show_contact_us_block');

                if ( $show_contact_us_block == 1 ) {

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
