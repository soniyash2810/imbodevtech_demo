<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Imobdev Technology
 */
get_header();
?>

<?php
if (!empty(have_rows('hire_devloper_flexible_blocks'))) {

    if (have_rows('hire_devloper_flexible_blocks')) {

        // Loop through rows.
        while (have_rows('hire_devloper_flexible_blocks')) {
            the_row();

            // overview  
            if (get_row_layout() == 'overview_blocks') {
                $add_overview_main_title = get_sub_field('add_overview_main_title');
                $add_overview_title = get_sub_field('add_overview_title');
                $add_overview_discription = get_sub_field('add_overview_discription');
                $add_overview_content = get_sub_field('add_overview_content');

                if ($add_overview_main_title || $add_overview_title || $add_overview_discription || $add_overview_content) {
                    ?>
                    <div class="meet-our-client p-y-100 bg-light-gray">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-9 col-lg-5 col-xl-5 align-self-center">
                                    <?php
                                    if ($add_overview_main_title) {
                                        echo '<span class="text-uppercase small-title-txt d-block">' . $add_overview_main_title . '</span>';
                                    }
                                    if ($add_overview_title) {
                                        echo '<h2 class="sub-title text-capitalize mb-0">' . $add_overview_title . '</h2>';
                                    }
                                    if ($add_overview_discription) {
                                        echo '<p class="desc mb-0">' . $add_overview_discription . '</p>';
                                    }
                                    ?>                            
                                </div>
                                <div class="col-12 col-md-3 col-lg-5 col-xl-6">
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

            //Counter Contents
            if (get_row_layout() == 'counter_with_content_blocks') {
                $add_counter_content_title = get_sub_field('add_counter_content_title');
                $add_counter_content_sub_title = get_sub_field('add_counter_content_sub_title');
                $add_counter_content_image = get_sub_field('add_counter_content_image');
                $add_counter_content_descriptions = get_sub_field('add_counter_content_descriptions');
                $add_counter_content_right_side_image = get_sub_field('add_counter_content_right_side_image');
                $add_counter_content_right_side_count = get_sub_field('add_counter_content_right_side_count');
                $add_counter_content_right_side_project_name = get_sub_field('add_counter_content_right_side_project_name');

                if ($add_counter_content_title || $add_counter_content_image || $add_counter_content_descriptions || $add_counter_content_right_side_image || $add_counter_content_right_side_count || $add_counter_content_right_side_project_name || !empty(have_rows('add_counter_content_left_project_counter_data'))) {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-md-5 col-lg-5 align-self-center">
                                <div class="pe-0 pe-md-5 pe-lg-5">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title(); ?></li>
                                        </ol>
                                    </nav>
                                    <?php
                                        if ($add_counter_content_title) {
                                            echo '<h1 class="sub-title text-capitalize mb-0">' . $add_counter_content_title . '</h1>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-6 col-md-7 col-lg-7">
                                <?php
                                if ($add_counter_content_image) {
                                    echo '<img src="' . esc_url($add_counter_content_image['url']) . '" class="img-fluid" alt="' . esc_attr($add_counter_content_image['alt']) . '"/>';
                                }
                                if ($add_counter_content_descriptions) {
                                    echo '<p class="desc my-4 py-2">' . $add_counter_content_descriptions . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            //Show Counter Blocks
            if (get_row_layout() == 'show_counter_blocks') {
                $show_counter_section = get_sub_field('show_counter_section');
                if ( $show_counter_section == 1 ) {
                    get_template_part( 'template-parts/bannercounter-section/common', 'bannercounter' );
                }
            }

            //Content
            if (get_row_layout() == 'content_blocks') {
                $add_main_description = get_sub_field('add_main_description');
                if ($add_main_description) {
                    ?>
                    <div class="p-t-100 body-dyn-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <?php
                                    if ($add_main_description) {
                                        echo $add_main_description;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            //Subscription
            if (get_row_layout() == 'subscription_blocks') {

                $add_subscription_title         = get_sub_field('add_subscription_title');
                $add_subscription_subtitle      = get_sub_field('add_subscription_subtitle');
                $add_subscription_description   = get_sub_field('add_subscription_description');

                ?>
                <div class="bg-light-gray border-top">
                    <div class="container">
                        <div class="row g-0 justify-content-evenly border-end border-start">
                            <div class="col-12 col-md-6 col-lg-5 border-end">
                                <div class="p-5 sticky-top me-5" style="top: 120px;z-index: 0;">
                                    <?php
                                        if ( $add_subscription_title || $add_subscription_subtitle || $add_subscription_description ) {
                                            
                                            if ( $add_subscription_title ) {
                                                echo '<span class="text-uppercase small-title-txt d-block">'.$add_subscription_title.'</span>';
                                            }
                                            if ( $add_subscription_subtitle ) {
                                                echo '<h2 class="my-0 sub-title text-capitalize">'.$add_subscription_subtitle.'</h2>';
                                            }
                                            if ( $add_subscription_description ) {
                                                echo '<p class="desc mb-0">'.$add_subscription_description.'</p>';
                                            }

                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <div class="row">
                                    <?php
                                    if (have_rows('add_subscription_blocks')) {
                                        $counter = 0;
                                        while (have_rows('add_subscription_blocks')) {
                                            the_row();

                                            $add_subscription_image = get_sub_field('add_subscription_image');
                                            $add_subscription_title = get_sub_field('add_subscription_title');
                                            $add_subscription_sub_title = get_sub_field('add_subscription_sub_title');
                                            $add_subscription_amount = get_sub_field('add_subscription_amount');
                                            $add_subscription_small_price_title = get_sub_field('add_subscription_small_price_title');
                                            $add_subscription_button = get_sub_field('add_subscription_button');

                                            if ( $counter == 0 ) {
                                                ?>
                                                <div class="col-12 col-md-12 col-lg-12 align-self-center">
                                                    <div class="card-box p-4 border-rad-0">
                                                        <div class="d-flex">
                                                            <img class="m-auto" src="<?php echo esc_url($add_subscription_image['url']); ?>" alt="<?php echo esc_attr($add_subscription_image['alt']); ?>"/>
                                                            <div class="ms-4">
                                                                <h3 class="mb-1 h4"><b class="c-black"><?php echo $add_subscription_title; ?></b></h3>
                                                                <p class="desc mb-0"><?php echo $add_subscription_sub_title; ?></p>
                                                            </div>
                                                        </div>
                                                        <hr class="c-l-gray">
                                                        <div class="d-flex mt-3 justify-content-between">
                                                            <div class="align-self-center"><b class="h2"><?php echo $add_subscription_amount; ?></b> <small>/<?php echo $add_subscription_small_price_title; ?></small></div>
                                                            <?php
                                                                if ( $add_subscription_button ) {
                                                                    echo '<a href=" ' . $add_subscription_button['url'] . '" class="d-block text-center bg-pink c-white p-3 w-50">' . $add_subscription_button['title'] . '</a>';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }elseif( $counter == 1 ){
                                                ?>
                                                <div class="col-12 col-md-12 col-lg-12 align-self-center my-4">
                                                    <div class="card-box p-4 border-rad-0 bg-pink">
                                                        <div class="d-flex">
                                                            <img class="m-auto" src="<?php echo esc_url($add_subscription_image['url']); ?>" alt="<?php echo esc_attr($add_subscription_image['alt']); ?>"/>
                                                            <div class="ms-4">
                                                                <h3 class="mb-1 h4 c-white"><b><?php echo $add_subscription_title; ?></b></h3>
                                                                <p class="desc mb-0 c-white"><?php echo $add_subscription_sub_title; ?></p>
                                                            </div>
                                                        </div>
                                                        <hr class="c-l-gray">
                                                        <div class="d-flex mt-3 justify-content-between sticky-top">
                                                            <div class="align-self-center c-white"><b class="h2"><?php echo $add_subscription_amount; ?></b> <small>/<?php echo $add_subscription_small_price_title; ?></small></div>
                                                            <?php
                                                                if ( $add_subscription_button ) {
                                                                    echo '<a href=" ' . $add_subscription_button['url'] . '" class="d-block text-center bg-white c-pink p-3 w-50">' . $add_subscription_button['title'] . '</a>';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }else{
                                                ?>
                                                <div class="col-12 col-md-12 col-lg-12 align-self-center">
                                                    <div class="card-box p-4 border-rad-0">
                                                        <div class="d-flex">
                                                            <img class="m-auto" src="<?php echo esc_url($add_subscription_image['url']); ?>" alt="<?php echo esc_attr($add_subscription_image['alt']); ?>"/>
                                                            <div class="ms-4">
                                                                <h3 class="mb-1 h4"><b class="c-black"><?php echo $add_subscription_title; ?></b></h3>
                                                                <p class="desc mb-0"><?php echo $add_subscription_sub_title; ?></p>
                                                            </div>
                                                        </div>
                                                        <hr class="c-l-gray">
                                                        <div class="d-flex mt-3 justify-content-between">
                                                            <div class="align-self-center"><b class="h2"><?php echo $add_subscription_amount; ?></b> <small>/<?php echo $add_subscription_small_price_title; ?></small></div>
                                                            <?php
                                                                if ( $add_subscription_button ) {
                                                                    echo '<a href=" ' . $add_subscription_button['url'] . '" class="d-block text-center bg-pink c-white w-50 p-3">' . $add_subscription_button['title'] . '</a>';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <?php
                                            }


                                            $counter++;
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

            // Technologies Blocks
            if (get_row_layout() == 'technologies_blocks') {
                
                $show_technologies_blocks  = get_sub_field('show_technologies_blocks');

                if ( $show_technologies_blocks == 1 ) {
                    get_template_part( 'template-parts/technologies-section/common', 'technologies' );
                }
                
            }

            //Hiring Process Block
            if (get_row_layout() == 'hiring_process_section') {

                $add_hiring_process_title = get_sub_field('add_hiring_process_title');
                $add_hiring_process_sub_title = get_sub_field('add_hiring_process_sub_title');
                $add_hiring_process_content = get_sub_field('add_hiring_process_content');

                if ($add_hiring_process_title || $add_hiring_process_sub_title || $add_hiring_process_content || !empty(have_rows('add_hiring_process_slider_data'))) {
                    ?>

                    <div class="why-choose p-y-100 position-relative">
                        <div class="container position-relative">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-11 col-lg-11 col-xl-11 align-self-center">
                                    <?php
                                    if ($add_hiring_process_title) {
                                        echo '<span class="text-uppercase small-title-txt d-block">' . $add_hiring_process_title . '</span>';
                                    }
                                    if ($add_hiring_process_sub_title) {
                                        echo '<h2 class="sub-title text-capitalize">' . $add_hiring_process_sub_title . '</h2>';
                                    }
                                    if ($add_hiring_process_content) {
                                        echo '<p class="desc mb-0">' . $add_hiring_process_content . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            if (have_rows('add_hiring_process_slider_data')) :
                                ?>
                                <div class="owl-carousel why-choose-carousel">
                                    <?php
                                    while (have_rows('add_hiring_process_slider_data')) : the_row();

                                        $add_hiring_process_left_side_image = get_sub_field('add_hiring_process_left_side_image');
                                        $add_hiring_process_right_side_number = get_sub_field('add_hiring_process_right_side_number');
                                        $add_hiring_process_right_side_title = get_sub_field('add_hiring_process_right_side_title');
                                        $add_hiring_process_right_side_content = get_sub_field('add_hiring_process_right_side_content');
                                        ?>
                                        <div>
                                            <div class="row justify-content-between mt-4 mt-lg-5">
                                                <div class="col-12 col-md-12 col-lg-7 col-xl-7 col-xxl-8 mb-4 mb-lg-0">
                                                    <?php
                                                    if ($add_hiring_process_left_side_image) {
                                                        echo '<img src="' . esc_url($add_hiring_process_left_side_image['url']) . '" class="img-fluid slide-img" alt="' . esc_attr($add_hiring_process_left_side_image['alt']) . '"/>';
                                                    }
                                                    ?>

                                                </div>
                                                <div class="col-12 col-md-12 col-lg-5 col-xl-5 col-xxl-4">
                                                    <div class="content-card p-4 p-xxl-5 mx-0 mx-lg-3">
                                                        <?php
                                                        if ($add_hiring_process_right_side_number) {
                                                            echo '<b class="c-pink">' . $add_hiring_process_right_side_number . '</b>';
                                                        }
                                                        if ($add_hiring_process_right_side_title) {
                                                            echo '<h3 class="c-black my-3">' . $add_hiring_process_right_side_title . '</h3>';
                                                        }
                                                        if ($add_hiring_process_right_side_content) {
                                                            echo '<p class="desc c-gray">' . $add_hiring_process_right_side_content . '</p>';
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

            // Process We Follow
            if (get_row_layout() == 'services_we_offer_block') {
                
                $add_services_we_offer_title        = get_sub_field('add_services_we_offer_title');
                $add_services_we_offer_subtitle     = get_sub_field('add_services_we_offer_subtitle');
                $add_services_we_offer_description  = get_sub_field('add_services_we_offer_description');
                $add_services_background_image      = get_sub_field('add_services_background_image');

                $add_services_background_image = ( $add_services_background_image ) ? $add_services_background_image = ' style="background-image: url('.$add_services_background_image['url'].') !important;"':'';

                if ( $add_services_we_offer_title || $add_services_we_offer_subtitle || $add_services_we_offer_description ) {
                    ?>
                    <div class="hire-process-we-follow process-we-follow">
                        <div class="container p-y-100"<?php echo $add_services_background_image; ?>>
                            <div class="row justify-content-end">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="p-4 p-md-5 d-flex">
                                        <div>
                                            <?php
                                                if ( $add_services_we_offer_title ) {
                                                    echo '<span class="text-uppercase small-title-txt d-block">'.$add_services_we_offer_title.'</span>';
                                                }
                                                if ( $add_services_we_offer_subtitle ) {
                                                    echo '<h2 class="my-0 sub-title text-capitalize">'.$add_services_we_offer_subtitle.'</h2>';
                                                }
                                                if ( $add_services_we_offer_description ) {
                                                    echo ' <p class="desc mb-0">'.$add_services_we_offer_description.'</p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if ( !empty( have_rows('add_services_card_content') ) ) {
                                        if( have_rows('add_services_card_content') ):
                                            echo '<div class="col-12 col-md-12 col-lg-11 col-xl-11 mt-4 mt-md-5">';
                                                echo '<div class="owl-carousel hire-process-we-follow-carousel">';
                                                    while( have_rows('add_services_card_content') ) : the_row();

                                                        $add_title      = get_sub_field('add_title');
                                                        $add_content    = get_sub_field('add_content',false);

                                                        if ( $add_title || $add_content ) {
                                                            echo '<div>';
                                                                echo '<div class="content-card p-4 p-md-4">';
                                                                    if ( $add_title ) {
                                                                        echo '<h3 class="c-black h5"><b>'.$add_title.'</b></h3>';   
                                                                    }
                                                                    if ( $add_content ) {
                                                                        echo '<p class="desc mb-0 c-black">'.$add_content.'</p>';   
                                                                    }
                                                                echo '</div>';
                                                            echo '</div>';
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

            // Industries We Serve
            if (get_row_layout() == 'industries_we_serve_blocks') {
                
                $show_industries_section = get_sub_field('show_industries_section');

                if ($show_industries_section == 1) {
                    get_template_part('template-parts/hire-common-industries-section/common', 'hireindustries');
                }

            }

            //Start Of Awards & Recognition
            if (get_row_layout() == 'awards_and_recognition_blocks') {
                $add_awards_and_recognition = get_sub_field('add_awards_and_recognition');
                if ($add_awards_and_recognition == 1) {
                    get_template_part('template-parts/awards-section/common', 'awardssection');
                }
            }
            //End oF Awards & Recognition
            //Start Of Client Testimonial
            if (get_row_layout() == 'testimonial_blocks') {
                $add_testimonial_section = get_sub_field('add_testimonial_section');
                if ($add_testimonial_section == 1) {
                    get_template_part('template-parts/testimonial-section/common', 'testimonialsection');
                }
            }
            //End Of Client Testimonial
            //FAQ
            if (get_row_layout() == 'faq_blocks') {

                $add_faq_title = get_sub_field('add_faq_title');
                $add_faq_sub_title = get_sub_field('add_faq_sub_title');
                $add_faq_desc = get_sub_field('add_faq_desc');

                if ($add_faq_title || $add_faq_sub_title || $add_faq_desc || !empty(have_rows('faq_section'))) {
                    ?>
                    <div class="p-y-100 blog-sect border-top">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 col-lg-6 text-center">
                                    <?php
                                    if ($add_faq_title) {
                                        echo '<span class="text-uppercase small-title-txt d-block">' . $add_faq_title . '</span>';
                                    }
                                    if ($add_faq_sub_title) {
                                        echo '<h2 class="sub-title text-capitalize mb-0">' . $add_faq_sub_title . '</h2>';
                                    }
                                    if ($add_faq_desc) {
                                        echo '<p class="desc mb-0">' . $add_faq_desc . '</p>';
                                    }
                                    ?>
                                </div>
                                <div class="clearfix mb-5"></div>
                                <?php
                                $faq_schema = array();
                                $faqincrement = 0;
                                if (!empty(have_rows('faq_section'))) {
                                    if (have_rows('faq_section')):
                                        echo '<div class="col-12 col-md-12 col-lg-12">';
                                        echo '<div class="accordion accordion-faq" id="accordionExample">';
                                        while (have_rows('faq_section')) : the_row();

                                            $add_faq_question = get_sub_field('add_faq_question');
                                            $add_faq_answer = get_sub_field('add_faq_answer');

                                            if ($add_faq_question || $add_faq_answer) {
                                                $faq_schema[] = imobtech_faq_question_array_generator($add_faq_question, $add_faq_answer);
                                                if ($faqincrement == 0) {
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
                                                } else {
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

            //Start Of contact us
            if (get_row_layout() == 'contact_us_blocks') {
                $add_contact_us_section = get_sub_field('add_contact_us_section');
                if ($add_contact_us_section == 1) {
                    get_template_part('template-parts/contatcus-footer/common', 'contactus');
                }
            }
            //End Of contact us


            //Peocess We Follow Blocks
            if (get_row_layout() == 'services_we_offer_blocks') {

                $show_services_we_offer_block  = get_sub_field('show_services_we_offer_block');

                if ( $show_services_we_offer_block == 1 ) {
                    get_template_part( 'template-parts/serviceweoffer-section/common', 'serviceweoffer' );
                }
            }

            //Client slider logo
            if (get_row_layout() == 'client_slider_logo') {
            
                $show_client_slider_from_common_section  = get_sub_field('show_client_slider_from_common_section');
                if ( $show_client_slider_from_common_section == 1 ) {
                    get_template_part( 'template-parts/clientslider-section/common', 'clientslider' );    
                }
            } 

        }
    }
}
?>

<?php
get_footer();
