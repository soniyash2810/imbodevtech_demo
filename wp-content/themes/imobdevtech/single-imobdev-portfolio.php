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
    if ( !empty( have_rows('portfolio_single_page_content_blocks') ) ) {

        if( have_rows('portfolio_single_page_content_blocks') ):
            while ( have_rows('portfolio_single_page_content_blocks') ) : the_row();

                //Hero Banner Block
                if( get_row_layout() == 'hero_banner_block' ){

                    $add_hero_banner_title              = get_sub_field('add_hero_banner_title');
                    $add_hero_banner_first_subtitle     = get_sub_field('add_hero_banner_first_subtitle');
                    $add_hero_banner_second_subtitle    = get_sub_field('add_hero_banner_second_subtitle');
                    $add_hero_banner_image              = get_sub_field('add_hero_banner_image');

                    if ( $add_hero_banner_title || $add_hero_banner_first_subtitle || $add_hero_banner_second_subtitle || $add_hero_banner_image ) {
                        ?>
                        <div class="serv-hero-sect pb-0 bg-light-gray pt-5 pt-xl-0">
                            <div class="container">
                                <div class="row justify-content-between justify-content-md-center">
                                    <div class="col-12 col-md-12 col-lg-10 col-xl-5 align-self-center">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                                <li class="breadcrumb-item"><a href="<?php echo home_url().'/portfolio-main/'; ?>">Portfolio</a></li>
                                            </ol>
                                        </nav>
                                        <?php
                                            if ( $add_hero_banner_title ) {
                                                echo '<h1 class="sub-title mt-3 mb-3">'.$add_hero_banner_title.'</h1>';      
                                            }
                                            if ( $add_hero_banner_first_subtitle || $add_hero_banner_second_subtitle ) {
                                                echo '<div class="d-flex c-pink">';
                                                    echo '<span class="text-capitalize">'.$add_hero_banner_first_subtitle.'</span>';
                                                    echo '<span class="text-capitalize mx-2">|</span>';
                                                    echo '<span class="text-capitalize">'.$add_hero_banner_second_subtitle.'</span>';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-10 col-xl-7 mt-4 mt-xl-0">
                                        <?php
                                            if ( $add_hero_banner_image ) {
                                                echo ' <img src="'.esc_url($add_hero_banner_image['url']).'" class="img-fluid" alt="'.esc_attr($add_hero_banner_image['alt']).'"/>';      
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                }

                //Title with content block
                if( get_row_layout() == 'title_with_content' ){

                    $add_title       = get_sub_field('add_title');
                    $add_content     = get_sub_field('add_content');

                    if ( $add_title || $add_content ) {
                        ?>
                        <div class="p-y-100 blog-content blog-pg">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12 col-lg-10">
                                        <?php
                                            if ( $add_title ) {
                                                echo '<h2 class="mt-0">'.$add_title.'</h2>';
                                            }
                                            if ( $add_content ) {
                                                echo '<p class="desc c-gray">'.$add_content.'</p>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                }

                //Content with Card Box Layout content
                if( get_row_layout() == 'content_with_card_box_layout' ){

                    $add_main_title                 = get_sub_field('add_main_title');
                    $add_main_short_description     = get_sub_field('add_main_short_description');

                    if ( $add_main_title || $add_main_short_description || have_rows('add_left_side_card_content') || have_rows('add_right_side_card_content') ) {
                        ?>
                        <div class="p-y-100 blog-content blog-pg bg-light-gray">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12 col-lg-10 mb-4">
                                        <?php
                                            if ( $add_main_title ) {
                                                echo '<h2 class="mt-0 mb-2">'.$add_main_title.'</h2>';
                                            }
                                            if ( $add_main_short_description ) {
                                                echo '<p class="desc c-gray">'.$add_main_short_description.'</p>';
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        if ( !empty(have_rows('add_left_side_card_content')) ) {
                                            if( have_rows('add_left_side_card_content') ):
                                                echo '<div class="col-12 col-md-6 col-lg-5 mb-4 mb-md-0">';
                                                    echo '<div class="p-4 card-box">';
                                                        while( have_rows('add_left_side_card_content') ) : the_row();

                                                            $add_title      = get_sub_field('add_title');
                                                            $add_content    = get_sub_field('add_content');

                                                            if ( $add_title || $add_content ) {
                                                                if ( $add_title ) {
                                                                    echo '<h3 class="h5 mt-0 mb-1">'.$add_title.'</h3>';
                                                                }
                                                                if ( $add_content ) {
                                                                    echo '<p class="desc c-gray mb-4">'.$add_content.'</p>';
                                                                }
                                                            }
                                                            
                                                        endwhile;
                                                    echo '</div>';
                                                echo '</div>';
                                            endif;
                                        }
                                        // Right Box
                                        if ( !empty(have_rows('add_right_side_card_content')) ) {
                                            if( have_rows('add_right_side_card_content') ):
                                                echo '<div class="col-12 col-md-6 col-lg-5">';
                                                    echo '<div class="p-4 card-box h-100">';
                                                        while( have_rows('add_right_side_card_content') ) : the_row();

                                                            $add_title      = get_sub_field('add_title');
                                                            $add_content    = get_sub_field('add_content');

                                                            if ( $add_title || $add_content ) {
                                                                if ( $add_title ) {
                                                                    echo '<h3 class="h5 mt-0 mb-1">'.$add_title.'</h3>';
                                                                }
                                                                if ( $add_content ) {
                                                                    echo '<p class="desc c-gray mb-4">'.$add_content.'</p>';
                                                                }
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

                //Content With Sticky Image Block
                if( get_row_layout() == 'content_with_sticky_image_block' ){

                    $add_title       = get_sub_field('add_title');
                    $add_content     = get_sub_field('add_content');

                    if ( $add_title || $add_content || have_rows('add_multiple_images') ) {
                        ?>
                        <div class="blog-content blog-pg border-bottom border-top">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-12 col-md-12 col-lg-4">
                                        <div class="py-5 sticky-top" style="top: 100px;z-index: 0">
                                            <?php
                                                if ( $add_title ) {
                                                    echo '<h2 class="mt-0 mb-3">'.$add_title.'</h2>';
                                                }
                                                if ( $add_content ) {
                                                    echo '<p class="desc c-gray">'.$add_content.'</p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-7">
                                        <div class="row flex-nowrap flex-lg-wrap mob-img-slider">
                                            <?php
                                                $count = 0;
                                                if (!empty(have_rows('add_multiple_images'))) {
                                                    if (have_rows('add_multiple_images')):
                                                        while (have_rows('add_multiple_images')) : the_row();
                                                            $add_image = get_sub_field('add_image');
                                                            if ($add_image) {
                                                                $class = ($count % 2 === 1) ? 'mt-0 mt-lg-5' : 'mt-0 mt-lg-0';
                                                                if ($count !== 0) {
                                                                    echo '<div class="col-10 col-md-6 col-lg-6 ' . $class . '">';
                                                                    echo '<img src="' . esc_url($add_image['url']) . '" class="img-fluid" alt="' . esc_attr($add_image['alt']) . '"/>';
                                                                    echo '</div>';
                                                                } else {
                                                                    echo '<div class="col-10 col-md-6 col-lg-6">';
                                                                    echo '<img src="' . esc_url($add_image['url']) . '" class="img-fluid" alt="' . esc_attr($add_image['alt']) . '"/>';
                                                                    echo '</div>';
                                                                }
                                                            }
                                                            $count++;
                                                        endwhile;
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

                //Title With Content Style 2
                if( get_row_layout() == 'title_with_content_style_2' ){

                    $add_title       = get_sub_field('add_title');
                    $add_content     = get_sub_field('add_content');

                    if ( $add_title || $add_content ) {
                        ?>
                        <div class="p-y-100 blog-content blog-pg bg-light-gray">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12 col-lg-10">
                                        <?php
                                            if ( $add_title ) {
                                                echo '<h2 class="mt-0 mb-3">'.$add_title.'</h2>';
                                            }
                                            if ( $add_content ) {
                                                echo '<p class="desc c-gray">'.$add_content.'</p>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                }

                //Recent Posts Block
                if( get_row_layout() == 'recent_posts_block' ){

                    $add_title                  = get_sub_field('add_title');
                    $add_subtitle               = get_sub_field('add_subtitle');
                    $add_short_description      = get_sub_field('add_short_description');
                    $add_recent_post_shortcode  = get_sub_field('add_recent_post_shortcode');

                    if ( $add_title || $add_subtitle || $add_short_description || $add_recent_post_shortcode ) {
                        ?>
                        <div class="p-y-100 blog-sect blog-pg border-top">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12 col-lg-12 mb-4">
                                        <?php
                                            if ( $add_title ) {
                                                echo '<span class="text-uppercase small-title-txt d-block">'.$add_title.'</span>';
                                            }
                                            if ( $add_subtitle ) {
                                                echo '<h2 class="sub-title text-capitalize mb-1">'.$add_subtitle.'</h2>';
                                            }
                                            if ( $add_short_description ) {
                                                echo '<p class="desc mb-0">'.$add_short_description.'</p>';
                                            }
                                        ?>
                                    </div>
                                    <!-- Add Shortcode code here -->
                                    <?php
                                        if ( $add_recent_post_shortcode ) {
                                            echo do_shortcode($add_recent_post_shortcode);
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                }

                //Portfolio Slider Block
                if( get_row_layout() == 'portfolio_slider_block' ){

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

                //Awards Block
                if( get_row_layout() == 'awards_block' ){

                    $show_awards_block = get_sub_field('show_awards_block');

                    if ( $show_awards_block == 1 ) {
                        get_template_part( 'template-parts/awards-section/common', 'awardssection' );   
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
 

                //Contact Us Block
                if( get_row_layout() == 'contact_us_block' ){

                    $show_contact_us_common_section = get_sub_field('show_contact_us_common_section');

                    if ( $show_contact_us_common_section == 1 ) {
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
?>

<?php get_footer();