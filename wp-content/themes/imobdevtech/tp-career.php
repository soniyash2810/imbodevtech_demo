<?php

/**

 * Template Name: Career Page

 *

 */

get_header();
?>
<?php

if( !empty( have_rows('career_page_blocks') ) ){

    if( have_rows('career_page_blocks') ):

        // Loop through rows.
        while ( have_rows('career_page_blocks') ) : the_row();

            //Banner Blocks
            if( get_row_layout() == 'banner_blocks' ){

                $add_career_title                        = get_sub_field ('add_career_title');
                $add_career_sub_title                    = get_sub_field ('add_career_sub_title');
                $add_career_banner_image                 = get_sub_field ('add_career_banner_image');
                $add_career_right_side_image             = get_sub_field ('add_career_right_side_image');
                $add_career_right_side_number            = get_sub_field ('add_career_right_side_number');
                $add_career_right_side_mini_title        = get_sub_field ('add_career_right_side_mini_title');
                $add_career_description                  = get_sub_field ('add_career_description');
                $add_career_bottom_right_side_image      = get_sub_field ('add_career_bottom_right_side_image');    


                if ( $add_career_title || $add_career_sub_title || $add_career_banner_image || $add_career_right_side_image || $add_career_right_side_number || $add_career_right_side_mini_title || $add_career_description || $add_career_bottom_right_side_image ) {
                    ?>
                    <div class="serv-content-box">
                        <div class="serv-content-sect bg-img position-relative" style="background-image: url(<?php echo esc_url($add_career_banner_image['url']); ?>" alt="<?php echo esc_attr($add_career_banner_image['alt']); ?>)">
                            <div class="container h-100">
                                <div class="row justify-content-between align-items-end position-relative h-100 align-content-end">
                                    <div class="col-12 col-md-12 col-lg-8 col-xl-8 align-self-end">
                                        <div class="my-4 my-lg-5">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                                    <li class="breadcrumb-item active c-white" aria-current="page">Career</li>
                                                </ol>
                                            </nav>
                                            <?php
                                                if ( $add_career_title ) {
                                                    echo '<h1 class="sub-title mt-3 mb-0 c-white">'.$add_career_title.'</h1>';
                                                }
                                                if ( $add_career_sub_title ) {
                                                    echo '<p class="desc mb-0 c-white">'.$add_career_sub_title.'</p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-3">
                                        <div class="bg-pink h-100 w-100 text-center d-flex justify-content-center align-items-center py-5">
                                            <div>
                                                <?php
                                                    if ( $add_career_right_side_image ) {
                                                        echo '<img src="'.esc_url($add_career_right_side_image['url']).'" class="" alt="'.esc_attr($add_career_right_side_image['alt']).'"/>';
                                                    }
                                                    if ( $add_career_right_side_number ) {
                                                        echo '<h2 class="sub-title c-white text-capitalize mb-0">'.$add_career_right_side_number.'</h2>';
                                                    }
                                                    if ( $add_career_right_side_mini_title ) {
                                                        echo '<p class="desc mb-0 c-white text-capitalize">'.$add_career_right_side_mini_title.'</p>';
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
                                    <div class="col-12 col-md-12 col-lg-8 col-xl-8 mt-5 mt-lg-0 pt-5 pt-lg-0 align-self-center">
                                        <?php
                                            if ( $add_career_description ) {
                                                echo '<p class="desc mb-0">'.$add_career_description.'</p>';
                                            }
                                        ?>  
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 d-none d-lg-block">
                                        <?php
                                            if ( $add_career_bottom_right_side_image ) {
                                                echo '<img src="'.esc_url($add_career_bottom_right_side_image['url']).'" class="img-fluid" alt="'.esc_attr($add_career_bottom_right_side_image['alt']).'"/>';
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


            //We Are Hiring Slider
            if( get_row_layout() == 'we_are_hiring_slider' ){

                $add_hiring_title       = get_sub_field ('add_hiring_title');
                $add_hiring_sub_title   = get_sub_field ('add_hiring_sub_title');
                $add_hiring_description = get_sub_field ('add_hiring_description');

                if ( $add_hiring_title || $add_hiring_sub_title || $add_hiring_description || !empty(have_rows('we_are_hiring_slider')) ) {
                    ?>
                    <div class="p-y-100 process-we-follow overflow-hidden position-relative">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-4 col-xxl-3 align-self-center">
                                    <div class="content-card text-center bg-pink p-4 p-md-5 d-flex justify-content-center align-items-center">
                                        <div>
                                            <?php
                                                if ( $add_hiring_title ) {
                                                    echo '<span class="text-uppercase d-block c-white">'.$add_hiring_title.'</span>';
                                                }
                                                if ( $add_hiring_sub_title ) {
                                                    echo '<h2 class="c-white mt-2 sub-title">'.$add_hiring_sub_title.'</h2>';
                                                }
                                                if ( $add_hiring_description ) {
                                                    echo '<p class="desc mb-0 c-white">'.$add_hiring_description.'</p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if( have_rows('we_are_hiring_slider') ):
                                        echo '<div class="col-12 col-md-6 col-lg-6 col-xl-8 col-xxl-9">';
                                            echo '<div class="owl-carousel process-we-follow-carousel">';
                                                
                                                while( have_rows('we_are_hiring_slider') ) : the_row();
                                                    $add_hiring_number    = get_sub_field('add_hiring_number');
                                                    $add_hiring_title     = get_sub_field('add_hiring_title');
                                                    $add_hiring_sub_title = get_sub_field('add_hiring_sub_title');
                                                    ?>
                                                    <div class="py-4">
                                                        <div class="content-card p-4 p-md-4">
                                                            <?php
                                                                if ( $add_hiring_number ) {
                                                                    echo '<b class="h5 c-pink">'.$add_hiring_number.'</b>';
                                                                }
                                                                if ( $add_hiring_title ) {
                                                                    echo '<h3 class="c-black h5 mt-3"><b>'.$add_hiring_title.'</b></h3>';
                                                                }
                                                                if ( $add_hiring_sub_title ) {
                                                                    echo '<p class="desc mb-0 c-black">'.$add_hiring_sub_title.'</p>';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                endwhile;
                                            echo '</div>';
                                        echo '</div>';
                                    endif; 
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                }

            }

            //Testimonial Section
            if( get_row_layout() == 'testimonial_section' ){

                $add_testimonial = get_sub_field('add_testimonial');

                if( $add_testimonial == 1){
                    get_template_part( 'template-parts/testimonial-section/common', 'testimonialsection' );
                }

            }

            //Show Hiring Post
            if( get_row_layout() == 'show_hiring_post' ){

                $add_we_are_hiring_title      = get_sub_field ('add_we_are_hiring_title');
                $add_we_are_hiring_sub_title  = get_sub_field ('add_we_are_hiring_sub_title');
                $add_we_are_hiring_desc       = get_sub_field ('add_we_are_hiring_desc');

                if ( $add_we_are_hiring_title || $add_we_are_hiring_sub_title || $add_we_are_hiring_desc ) {
                    ?>
                    <div class="p-y-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10 col-lg-10 align-self-center text-center mb-5">
                                    <?php
                                        if ( $add_we_are_hiring_title ) {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_we_are_hiring_title.'</span>';
                                        }
                                        if ( $add_we_are_hiring_sub_title ) {
                                            echo '<h2 class="sub-title text-capitalize mb-0">'.$add_we_are_hiring_sub_title.'</h2>';
                                        }
                                        if ( $add_we_are_hiring_desc ) {
                                            echo '<p class="desc mb-0">'.$add_we_are_hiring_desc.'</p>';
                                        }
                                    ?>
                                </div>
                                <?php
                                    //Get Dynamic Career posts
                                    $career_args['post_type'] 		= 'imobdev-career';
                                    $career_args['post_status'] 	= 'publish';
                                    $career_args['posts_per_page'] 	= -1;
                                    $career_args['order'] 			= 'DESC';
                                    $career_args['orderby'] 		= 'DATE';

                                    $career_loop = new WP_Query( $career_args );

                                    if( $career_loop->have_posts() )
                                    {
                                        while( $career_loop->have_posts() )
                                        {
                                            $career_loop->the_post();
                                            $ID = get_the_ID();

                                            $add_required_experience    = get_field('add_required_experience',$ID);
                                            $add_number_of_position     = get_field('add_number_of_position',$ID);
                                            $add_job_location           = get_field('add_job_location',$ID);
                                            $add_job_type               = get_field('add_job_type',$ID);
                                            $add_apply_now_link         = get_field('add_apply_now_link',$ID);

                                            ?>
                                            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                                <div class="pt-4 card-box overflow-hidden">
                                                    <div class="px-4 pb-4">
                                                        <h4 class="c-pink h5 mb-4"><b><?php echo get_the_title($ID); ?></b></h4>
                                                        <?php
                                                            if( $add_required_experience ){
                                                                echo '<div class="justify-content-between w-100 d-flex"><span class="c-gray">Required Experience</span><b class="c-black">'.$add_required_experience.'</b></div>';
                                                            }
                                                            if( $add_number_of_position ){
                                                                echo '<div class="justify-content-between w-100 d-flex my-4"><span class="c-gray">Number of Position</span><b class="c-black">'.$add_number_of_position.'</b></div>';
                                                            }
                                                            if( $add_job_location ){
                                                                echo '<div class="justify-content-between w-100 d-flex my-4"><span class="c-gray">Job Location</span><b class="c-black">'.$add_job_location.'</b></div>';
                                                            }
                                                            if( $add_job_type ){
                                                                echo '<div class="justify-content-between w-100 d-flex"><span class="c-gray">Job Type</span><b class="c-black">'.$add_job_type.'</b></div>';
                                                            }
                                                        ?>
                                                    </div>
                                                    <?php
                                                        if( $add_apply_now_link ){
                                                            $link_url = $add_apply_now_link['url'];
                                                            $link_title = $add_apply_now_link['title'];
                                                            $link_target = $add_apply_now_link['target'] ? $add_apply_now_link['target'] : '_self';
                                                            ?>
                                                                <a class="cust-btn p-3 bg-pink d-block text-center c-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        //Reset post data
                                        wp_reset_postdata();
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                } 

            }

            //Portfolio Section
            if( get_row_layout() == 'portfolio_section' ){

                $select_portfolio           = get_sub_field('select_portfolio');
                $add_portfolio_main_title   = get_sub_field('add_portfolio_main_title');
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
                                    if ( $add_portfolio_subtitle  ) {
                                        echo '<h2 class="sub-title text-capitalize mb-0">'.$add_portfolio_subtitle .'</h2>';
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
            if( get_row_layout() == 'show_award_section' ){

                $show_award_common_section = get_sub_field('show_award_common_section');

                if( $show_award_common_section == 1){
                    get_template_part( 'template-parts/awards-section/common', 'awardssection');
                }

            }

            //Show Blog Section
            if( get_row_layout() == 'show_blog_section' ){

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
?>

<?php
get_footer(); 