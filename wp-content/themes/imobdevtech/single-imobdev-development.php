<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Imobdev Technology
 */

get_header(); ?>

<?php

if( !empty( have_rows('development_page_blocks') ) ){

    if( have_rows('development_page_blocks') ):

        // Loop through rows.
        while ( have_rows('development_page_blocks') ) : the_row();

            //Development banner Blocks
            if( get_row_layout() == 'development_banner_blocks' ){

                $add_development_title               = get_sub_field('add_development_title');
                $add_development_sub_desc            = get_sub_field('add_development_sub_desc');
                $add_development_image               = get_sub_field('add_development_image');
                $add_development_right_side_number   = get_sub_field('add_development_right_side_number');
                $add_development_right_side_content  = get_sub_field('add_development_right_side_content');
                $add_development_right_side_icon     = get_sub_field('add_development_right_side_icon');



                if ( $add_development_title || $add_development_sub_desc || $add_development_image || $add_development_right_side_number || $add_development_right_side_content || $add_development_right_side_icon  ) {
                    ?>
                    <div class="serv-content-box">
                        <div class="serv-content-sect bg-img position-relative" style="background-image: url(<?php echo esc_url($add_development_image['url']); ?>" alt="<?php echo esc_attr($add_development_image['alt']); ?>)">
                            <div class="container h-100">
                                <div class="row justify-content-between align-items-end position-relative h-100">
                                    <div class="col-12 col-md-8 col-lg-8 align-self-end">
                                        <div class="my-5">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title(); ?></li>
                                                </ol>
                                            </nav>
                                            <?php
                                                if ( $add_development_title ) {
                                                    echo '<h2 class="sub-title text-capitalize mb-1 c-white">'.$add_development_title.'</h2>';
                                                }
                                                if ( $add_development_sub_desc ) {
                                                    echo '<p class="desc c-white mb-4">'.$add_development_sub_desc.'</p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="bg-pink h-100 w-100 text-center d-flex justify-content-center align-items-center py-5">
                                            <div>
                                                <?php
                                                    if ( $add_development_right_side_icon ) {
                                                        echo '<img src="'.esc_url($add_development_right_side_icon['url']).'" class="" alt="'.esc_attr($add_development_right_side_icon['alt']).'"/>';
                                                    }
                                                    
                                                    if ( $add_development_right_side_number ) {
                                                        echo '<h2 class="sub-title c-white text-capitalize mb-0">'.$add_development_right_side_number.'</h2>';
                                                    }
                                                    if ( $add_development_right_side_content ) {
                                                        echo '<p class="desc mb-0 c-white text-capitalize">'.$add_development_right_side_content.'</p>';
                                                    }
                                                ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            //Bussiness Blocks
            if( get_row_layout() == 'bussiness_blocks' ){

                $add_business_title        = get_sub_field('add_business_title');
                $add_business_sub_title    = get_sub_field('add_business_sub_title');
                $add_business_desc         = get_sub_field('add_business_desc');
                $add_business_image        = get_sub_field('add_business_image');

                if ( $add_business_title || $add_business_sub_title || $add_business_desc || $add_business_image ||!empty(have_rows('add_business_slider')) ) {
                    ?>
                    <div class="meet-our-client p-b-100">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-9 col-lg-8 col-xl-8">
                                    <div class="pt-5">
                                        <?php
                                            if ( $add_business_title ) {
                                                echo '<span class="text-uppercase small-title-txt d-block">'.$add_business_title.'</span>';
                                            }
                                            
                                            if ( $add_business_sub_title ) {
                                                echo '<h2 class="sub-title text-capitalize mb-3">'.$add_business_sub_title.'</h2>';
                                            }
                                            if ( $add_business_desc ) {
                                                echo '<p class="desc mb-0">'.$add_business_desc.'</p>';
                                            }
                                        ?> 
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3">
                                    <?php
                                        if ( $add_business_image ) {
                                            echo '<img src="'.esc_url($add_business_image['url']).'" class="img-fluid" alt="'.esc_attr($add_business_image['alt']).'"/>';
                                        }
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }

            if (get_row_layout() == 'client_slider_logo') {
            
                $show_client_slider_from_common_section  = get_sub_field('show_client_slider_from_common_section');
                if ( $show_client_slider_from_common_section == 1 ) {
                    get_template_part( 'template-parts/clientslider-section/common', 'clientslider' );
                }
            }

            //Business Content Blocks
            if( get_row_layout() == 'business_content_blocks' ){

                $add_business_desc = get_sub_field('add_business_desc');
                
                if ( $add_business_desc ) {
                    ?>
                    <div class="meet-our-client p-y-100 bg-light-gray">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <?php
                                        if ( $add_business_desc ) {
                                            echo $add_business_desc;
                                        }
                                    ?>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            //Our Services Blocks
            if( get_row_layout() == 'our_services_blocks' ){

                $add_our_service_title         = get_sub_field('add_our_service_title');
                $add_our_service_sub_title     = get_sub_field('add_our_service_sub_title');
                $add_our_service_desc          = get_sub_field('add_our_service_desc');
                $add_advice_experts            = get_sub_field('add_advice_experts');

                //Expert blocks
                $add_advice_experts_title           = get_sub_field('add_advice_experts_title');
                $add_advice_experts_subtitle        = get_sub_field('add_advice_experts_subtitle');
                $add_advice_experts_link            = get_sub_field('add_advice_experts_link');


                if ( $add_our_service_title || $add_our_service_sub_title || $add_our_service_desc || $add_advice_experts || $add_advice_experts_title || $add_advice_experts_subtitle || $add_advice_experts_link || !empty(have_rows('add_our_services_layout')) ) {
                    ?>
                    <div class="our-service bg-light-gray border-bottom border-top">
                        <div class="container border-start border-end px-3 px-md-0">
                            <div class="row g-0 justify-content-center">
                                <div class="col-12 col-md-12 col-lg-10 p-y-100">
                                    <?php
                                        if ( $add_our_service_title ) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_our_service_title.'</span>';
                                        }
                                        
                                        if ( $add_our_service_sub_title ) {
                                            echo '<h2 class="sub-title text-capitalize mb-1">'.$add_our_service_sub_title.'</h2>';
                                        }
                                        if ( $add_our_service_desc ) {
                                            echo '<p class="desc mb-0">'.$add_our_service_desc.'</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row g-0 justify-content-between">
                                <?php
                                    if( have_rows('add_our_services_layout') ):
                                    ?>
                                    <?php
                                        while( have_rows('add_our_services_layout') ) : the_row();

                                            $add_layout_title     = get_sub_field('add_layout_title');
                                            $add_layout_sub_title = get_sub_field('add_layout_sub_title');

                                            ?>
                                                <div class="col-12 col-md-12 col-lg-12 p-b-100">
                                                    <div class="line-box bg-white p-4 p-md-5 h-100 border-bottom border-top">
                                                        <div class="row g-0 justify-content-between h-100">
                                                            <div class="col-12 col-md-6 col-lg-6">
                                                                <div class="d-flex flex-column h-100 justify-content-between">
                                                                    <div>
                                                                        <?php
                                                                            if ( $add_layout_title ) {
                                                                                echo '<h3 class="mb-2"><b>'.$add_layout_title.'</b></h3>';
                                                                            }
                                                                            
                                                                            if ( $add_layout_sub_title ) {
                                                                                echo '<p class="desc mb-0">'.$add_layout_sub_title.'</p>';
                                                                            }
                                                                        ?>
                                                                    </div>                                                       
                                                                    <div class="mt-5">
                                                                        <?php
                                                                            if ( !empty(have_rows('add_icon_images')) ) {
                                                                                if( have_rows('add_icon_images') ):
                                                                                    while( have_rows('add_icon_images') ) : the_row();

                                                                                        $add_image = get_sub_field('add_image');
                                                                                        if ( $add_image ) {
                                                                                            echo '<img class="mx-3" src="'.esc_url($add_image['url']).'" width="40" height="40" alt="'.esc_attr($add_image['alt']).'"/>';
                                                                                        }
                                                                                        
                                                                                    endwhile;
                                                                                endif;
                                                                            }
                                                                        ?>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-4 col-lg-4">
                                                                <?php 
                                                                    if ( !empty(have_rows('add_right_side_title')) ) {
                                                                        if( have_rows('add_right_side_title') ):
                                                                            echo '<ul class="listing-list list-unstyled m-0">';
                                                                                while( have_rows('add_right_side_title') ) : the_row();

                                                                                    $add_right_side_sub_title = get_sub_field('add_right_side_sub_title');

                                                                                    if ( $add_right_side_sub_title ) {
                                                                                        $link_url = $add_right_side_sub_title['url'];
                                                                                        $link_title = $add_right_side_sub_title['title'];
                                                                                        $link_target = $add_right_side_sub_title['target'] ? $add_right_side_sub_title['target'] : '_self';
                                                                                        ?>
                                                                                            <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                                                                                        <?php 
                                                                                    }
                                                                                    
                                                                                endwhile;
                                                                            echo '</ul>';
                                                                        endif;
                                                                    }
                                                                ?> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php 
                                        endwhile;
                                    endif; 
                                    ?>
                                <?php
                                    if ( $add_advice_experts_title || $add_advice_experts_subtitle || $add_advice_experts_link ) {

                                        ?>
                                        <div class="col-12 col-md-12 col-lg-12 p-b-100">
                                            <div class="line-box bg-black p-4 p-md-5 h-100 border-bottom border-top">
                                                <div class="row g-0 justify-content-center h-100">
                                                    <div class="col-12 col-md-12 col-lg-8 align-self-center">
                                                        <div class="d-flex flex-column h-100 justify-content-between text-center c-white">
                                                            <div>
                                                                <?php
                                                                    if ( $add_advice_experts_title ) {
                                                                        echo '<h3 class="mb-3"><b>'.$add_advice_experts_title.'</b></h3>';
                                                                    }
                                                                    if ( $add_advice_experts_subtitle ) {
                                                                        echo '<p class="desc mb-4">'.$add_advice_experts_subtitle.'</p>';
                                                                    }
                                                                    if ( $add_advice_experts_link ) {
                                                                        $link_url = $add_advice_experts_link['url'];
                                                                        $link_title = $add_advice_experts_link['title'];
                                                                        $link_target = $add_advice_experts_link['target'] ? $add_advice_experts_link['target'] : '_self';
                                                                        ?>
                                                                        <a class="bg-pink c-white p-3 d-inline-flex text-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>    
                        </div>
                    </div>
                    <?php
                }
            }

            //We Follow Blocks
            if (get_row_layout() == 'we_follow_blocks') {

                $add_process_we_follow_title       = get_sub_field('add_process_we_follow_title');
                $add_process_we_follow_sub_title   = get_sub_field('add_process_we_follow_sub_title');
                $add_process_we_follow_content     = get_sub_field('add_process_we_follow_content');
                

                if ( $add_process_we_follow_title || $add_process_we_follow_sub_title || $add_process_we_follow_content || !empty(have_rows('add_process_we_follow_slider_data')) ) {
                    ?>
                    <!--Why Choose-->
                    <div class="why-choose p-y-100 position-relative">
                        <div class="container position-relative">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-9 col-lg-6 col-xl-6 align-self-center">
                                    <?php 
                                        if ($add_process_we_follow_title) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_process_we_follow_title.'</span>';
                                        }
                                        if ($add_process_we_follow_sub_title) {
                                            echo '<h2 class="sub-title text-capitalize">'.$add_process_we_follow_sub_title.'</h2>';
                                        }
                                        if ($add_process_we_follow_content) {
                                            echo '<p class="desc mb-0">'.$add_process_we_follow_content.'</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                                if (have_rows('add_process_we_follow_slider_data')) :
                                    ?>
                                    <div class="owl-carousel why-choose-carousel">
                                        <?php 

                                            while (have_rows('add_process_we_follow_slider_data')) : the_row();

                                            $add_process_we_follow_left_side_image      = get_sub_field('add_process_we_follow_left_side_image');
                                            $add_process_we_follow_right_side_number    = get_sub_field('add_process_we_follow_right_side_number');
                                            $add_process_we_follow_title                = get_sub_field('add_process_we_follow_title'); 
                                            $add_process_we_follow_content              = get_sub_field('add_process_we_follow_content'); 
                                                ?>
                                                <div>
                                                    <div class="row justify-content-between mt-5">
                                                        <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                                                            <?php 
                                                                if ($add_process_we_follow_left_side_image) {
                                                                    echo '<img src="'. esc_url($add_process_we_follow_left_side_image['url']).'" class="img-fluid slide-img" alt="'. esc_attr($add_process_we_follow_left_side_image['alt']).'"/>';
                                                                }
                                                            ?>
                                                            
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="content-card p-4 p-md-5 mx-4">
                                                                <?php  
                                                                    if ($add_process_we_follow_right_side_number) {
                                                                        echo '<b class="c-pink">'.$add_process_we_follow_right_side_number.'</b>';
                                                                    }
                                                                    if ($add_process_we_follow_title) {
                                                                        echo '<h3 class="c-black my-3">'.$add_process_we_follow_title.'</h3>';
                                                                    }
                                                                    if ($add_process_we_follow_content) {
                                                                        echo '<p class="desc c-gray">'.$add_process_we_follow_content.'</p>';
                                                                    }
                                                                ?>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <?php 
                                            endwhile; 
                                        ?>   
                                    </div>
                                    <?php 
                                endif; 
                            ?>
                            
                            <div class="cust-nav-box d-flex bg-pink justify-content-between position-absolute bottom-0 end-0">
                                <div class="cust-dots d-flex align-self-center"></div>
                                <a class="cust-nav d-flex" href="javascript:void(0)"><img width="110" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nxt-arrow.svg" alt="alt"/></a>
                            </div>    
                        </div>
                    </div>
                    <?php
                }
            }

            //Technology Blocks
            if (get_row_layout() == 'technology_blocks') {

                $add_technology_title       = get_sub_field('add_technology_title');
                $add_technology_sub_title   = get_sub_field('add_technology_sub_title');
                $add_technology_content     = get_sub_field('add_technology_content');
                

                if ( $add_technology_title || $add_technology_sub_title || $add_technology_content || !empty(have_rows('technology_data')) ) {
                    ?>
                    <div class="p-b-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-9 col-md-10 text-center mb-5">
                                    <?php  
                                        if ( $add_technology_title ) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_technology_title.'</span>';
                                        }
                                        if ( $add_technology_sub_title ) {
                                            echo '<h2 class="sub-title text-capitalize mb-1">'.$add_technology_sub_title.'</h2>';
                                        }
                                        if ( $add_technology_content ) {
                                            echo '<p class="desc mb-0">'.$add_technology_content.'</p>';
                                        }
                                    ?>   
                                </div>
                                <?php
                                    if( !empty( have_rows('technology_data') ) ){
                                        if( have_rows('technology_data') ):
                                            echo '<div class="col-12 col-lg-12 col-md-12">';
                                                echo '<div class="row justify-content-between">';
                                                    while ( have_rows('technology_data') ) : the_row();

                                                        $add_technology_title       = get_sub_field('add_technology_title');
                                                        $add_technology_content     = get_sub_field('add_technology_content');

                                                        if ( $add_technology_title || $add_technology_content ) {
                                                            ?>
                                                            <div class="col-12 col-lg-2 col-md-3">
                                                                <?php
                                                                    if ( $add_technology_title ) {
                                                                        echo '<h3 class="c-pink h5 mb-3"><b>'.$add_technology_title.'</b></h3>';
                                                                    }
                                                                    if ( $add_technology_content ) {
                                                                        echo $add_technology_content;
                                                                    }
                                                                ?>
                                                            </div>
                                                            <?php
                                                        }

                                                    endwhile;
                                                echo '</div>';
                                                echo '</div>';
                                        endif;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }

            //Industries We Serve Blocks
            if (get_row_layout() == 'industries_we_serve_blocks') {

                $add_industry_title       = get_sub_field('add_industry_title');
                $add_industry_sub_title   = get_sub_field('add_industry_sub_title'); 
                $add_industry_desc        = get_sub_field('add_industry_desc'); 

                if ( $add_industry_title || $add_industry_sub_title || $add_industry_desc || !empty(have_rows('add_industry_gallery')) ) {
                ?>
                    <div class="industries-we-serve bg-black p-y-100">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-6 col-lg-5">
                                    <?php  
                                        if ( $add_industry_title ) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_industry_title.'</span>';
                                        }
                                        if ( $add_industry_sub_title ) {
                                            echo '<h2 class="sub-title text-capitalize mb-0 c-white">'.$add_industry_sub_title.'</h2>';
                                        }
                                    ?> 
                                </div>
                                <div class="col-12 col-md-6 col-lg-5 align-self-center">
                                    <?php  
                                        if ( $add_industry_desc ) {
                                            echo '<p class="desc mb-0 c-white">'.$add_industry_desc.'</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="clearfix mt-5"></div>
                                <?php
                                if (have_rows('add_industry_gallery')) :
                                    $classes = array(
                                        'col-12 col-md-6 col-lg-3 mt-3 mt-lg-0',
                                        'col-12 col-md-6 col-lg-3 mt-3 mt-lg-5'   
                                    );
                                    $counter = 0;

                                    while( have_rows('add_industry_gallery') ) : the_row();

                                        $add_industry_image       = get_sub_field('add_industry_image');
                                        $add_industry_title       = get_sub_field('add_industry_title'); 
                                        $add_industry_sub_title   = get_sub_field('add_industry_sub_title');
                                        $add_industries_we_serve_page_link = get_sub_field('add_industries_we_serve_page_link');

                                        $class = $classes[$counter % count($classes)];
                                        $counter++;

                                        ?>
                                        <div class="<?php echo $class; ?>">
                                            <div class="industries-box overflow-hidden m-2">
                                                <a class="d-block position-relative" href="<?php echo $add_industries_we_serve_page_link; ?>">
                                                    
                                                    <?php  
                                                        if ( $add_industry_image ) {
                                                            echo '<img src="'.esc_url($add_industry_image['url']).'" class="img-fluid" alt="'.esc_attr($add_industry_image['alt']).'"/>';
                                                        }
                                                    ?> 
                                                    <div class="inner-box text-center position-absolute w-100 h-100 p-4 c-white top-0 bottom-0 d-flex flex-column justify-content-center">
                                                        <?php  
                                                            if ( $add_industry_title ) {
                                                                echo '<h3 class="small-title-txt mb-1">'.$add_industry_title.'</h3>';
                                                            }
                                                            if ( $add_industry_sub_title ) {
                                                                echo '<p class="desc mb-0">'.$add_industry_sub_title.'</p>';
                                                            }
                                                        ?> 
                                                    </div>
                                                </a>
                                            </div>   
                                        </div>
                                        <?php 
                                    endwhile; 
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            // Awards & Recognition
            if (get_row_layout() == 'awards_and_recognition') {

                $add_awards_and_recognition = get_sub_field('add_awards_and_recognition');

                if( $add_awards_and_recognition == 1 ){
                    get_template_part( 'template-parts/awards-section/common', 'awardssection' );
                }   
            }

            // Client Testimonial 
            if (get_row_layout() == 'testimonial_blocks') {
                
                $add_testimonial = get_sub_field('add_testimonial');
                
                if( $add_testimonial == 1 ){
                    get_template_part( 'template-parts/testimonial-section/common', 'testimonialsection' );       
                }
            }

            // Blog
            if (get_row_layout() == 'show_blog_blocks') {
                
                $show_blog_block = get_sub_field('show_blog_block');
                
                if( $add_testimonial == 1 ){
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

            //Contact Us Blocks
            if( get_row_layout() == 'contact_us_blocks' ) 
            {   
                $show_contact_us_section    = get_sub_field('show_contact_us_section');

                if( $show_contact_us_section == 1) {
                    get_template_part( 'template-parts/contatcus-footer/common', 'contactus' );
                }

            }

            //Service We Offer Blocks
            if( get_row_layout() == 'service_we_offer_blocks' ) 
            { 

                $show_service_we_offer_blocks  = get_sub_field('show_service_we_offer_block');

                if ( $show_service_we_offer_blocks == 1 ) {
                    get_template_part( 'template-parts/serviceweoffer-section/common', 'serviceweoffer' );
                }

            }

            //Peocess We Follow Blocks
            if (get_row_layout() == 'process_we_follow_blocks') {

                $show_process_we_follow_block  = get_sub_field('show_process_we_follow_block');

                if ( $show_process_we_follow_block == 1 ) {
                    get_template_part( 'template-parts/processwegollow-section/common', 'processwegollow' );
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