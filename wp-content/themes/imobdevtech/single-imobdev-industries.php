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

if( !empty( have_rows('industries_page_flexible_blocks') ) ){

    if( have_rows('industries_page_flexible_blocks') ){

        // Loop through rows.
        while ( have_rows('industries_page_flexible_blocks') ) { the_row();

            
            if( get_row_layout() == 'industries_serv_blocks' )
            {
                $add_industries_detail_page_description     = get_sub_field('add_industries_detail_page_description');
                
                $add_advice_experts_title           = get_sub_field('add_advice_experts_title');
                $add_advice_experts_subtitle        = get_sub_field('add_advice_experts_subtitle');
                $add_advice_experts_link            = get_sub_field('add_advice_experts_link');

                if( $add_industries_detail_page_description  || $add_advice_experts_title || $add_advice_experts_subtitle || $add_advice_experts_link ) {
                    ?>
                    <div class="serv-content-box">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="mt-5">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                                <li class="breadcrumb-item"><a href="<?php echo home_url().'/industries-main'; ?>">industries</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <h1 class="sub-title text-capitalize mb-1"><?php echo the_title(); ?></h1>
                                    <p class="desc mb-5"><?php echo get_the_content(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="our-service bg-light-gray border-bottom border-top industries-sect">
                        <div class="container border-start border-end px-3 px-md-0">
                            <div class="row g-0 justify-content-center">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="bg-img p-y-100" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'full') ?>');">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 p-b-100">
                                    <div class="line-box bg-white p-4 p-md-5 h-100 border-bottom border-top">
                                        <div class="row g-0 justify-content-center h-100">
                                            <div class="col-12 col-md-12 col-lg-10">
                                            <?php
                                                if( $add_industries_detail_page_description ){
                                                    echo '<p class="desc mb-0">'.$add_industries_detail_page_description.'</p>';
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

            if( get_row_layout() == 'about_us_blocks' )
            {
                $add_about_us_section_title                     = get_sub_field('add_about_us_section_title');
                $add_about_us_section_content                   = get_sub_field('add_about_us_section_content');
                $add_about_us_section_image                     = get_sub_field('add_about_us_section_image');
                $add_about_us_section_description               = get_sub_field('add_about_us_section_description');
                
                
                if( $add_about_us_section_title || $add_about_us_section_content || $add_about_us_section_image || $add_about_us_section_description ) {
                    ?>
                    <div class="about-sect">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 col-md-5 col-lg-5 align-self-center">
                                    <div class="pe-0 pe-md-5 pe-lg-5">
                                    <?php
                                        if( $add_about_us_section_title )
                                        {
                                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_about_us_section_title.'</span>';
                                        }
                                        if($add_about_us_section_content )
                                        {
                                            echo '<h2 class="sub-title c-white text-capitalize mb-0">'.$add_about_us_section_content .'</h2>';
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-7 col-lg-7">
                                <?php
                                    if($add_about_us_section_image)
                                    {
                                        echo '<img src="'.esc_url($add_about_us_section_image['url']).'" class="img-fluid" alt="'.esc_attr($add_about_us_section_image['alt']).'"/>';
                                    }
                                    if($add_about_us_section_description)
                                    {
                                        echo '<p class="desc my-4 py-2 c-white">'.$add_about_us_section_description.'</p>';
                                    }
                                ?>
                                </div>
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

            if( get_row_layout() == 'why_choice_block' )
            {
                $add_why_choose_title       = get_sub_field('add_why_choose_title');
                $add_why_choose_sub_title   = get_sub_field('add_why_choose_sub_title');
                $add_why_choose_content     = get_sub_field('add_why_choose_content');

                if( $add_why_choose_title || $add_why_choose_sub_title || $add_why_choose_content || !empty( have_rows('add_why_choose_slider_data') ) ) {
                    ?>
                    <div class="why-choose p-y-100 position-relative">
                         <div class="container position-relative">
                             <div class="row justify-content-between">
                                 <div class="col-12 col-md-9 col-lg-6 col-xl-6 align-self-center">
                                 <?php
                                     if( $add_why_choose_title )
                                     {
                                         echo '<span class="text-uppercase small-title-txt d-block">'.$add_why_choose_title.'</span>';
                                     }
                                     if($add_why_choose_sub_title )
                                     {
                                         echo '<h2 class="sub-title text-capitalize">'.$add_why_choose_sub_title.'</h2>';
                                     }
                                     if($add_why_choose_content )
                                     {
                                         echo '<p class="desc mb-0">'.$add_why_choose_content.'</p>';
                                     }
                                 ?>
                                 </div>
                             </div>
                             
                             <?php
                                 if( have_rows('add_why_choose_slider_data') ){
                                    echo '<div class="owl-carousel why-choose-carousel">';
                                        while( have_rows('add_why_choose_slider_data') ) { the_row();
                                            $add_why_choose_left_side_image = get_sub_field('add_why_choose_left_side_image');
                                            $add_why_choose_right_side_number = get_sub_field('add_why_choose_right_side_number');
                                            $add_why_choose_right_side_title = get_sub_field('add_why_choose_right_side_title');
                                            $add_why_choose_right_side_content = get_sub_field('add_why_choose_right_side_content');
                                
                                            echo '<div>';
                                                echo '<div class="row justify-content-between mt-5">';
                                                    echo '<div class="col-12 col-md-8 col-lg-8 col-xl-8">';
                                                        echo '<img src="'.esc_url($add_why_choose_left_side_image['url']).'" class="img-fluid slide-img" alt="'.esc_attr($add_why_choose_left_side_image['alt']).'"/>';
                                                    echo '</div>';
                                                    echo '<div class="col-12 col-md-4 col-lg-4 col-xl-4">';
                                                        echo '<div class="content-card p-4 p-md-5 mx-4">';
                                                            echo '<b class="c-pink">'.$add_why_choose_right_side_number.'</b>';
                                                            echo '<h3 class="c-black my-3">'.$add_why_choose_right_side_title.'</h3>';
                                                            echo '<p class="desc c-gray">'.$add_why_choose_right_side_content.'</p>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';             
                                        }
                                     echo '</div>';
                                     ?>
                                     <div class="cust-nav-box d-flex bg-pink justify-content-between position-absolute bottom-0 end-0">
                                        <div class="cust-dots d-flex align-self-center"></div>
                                        <a class="cust-nav d-flex" href="javascript:void(0)"><img width="110" src="<?php echo get_template_directory_uri()?>/assets/img/nxt-arrow.svg" alt="alt"/></a>
                                    </div>
                                    <?php
                                  }
                             ?>
                         </div>
                     </div>
                     <?php
                }

            }

            if( get_row_layout() == 'service_we_offer_blocks' )
            {
                $show_service_we_offer_blocks  = get_sub_field('show_service_we_offer_blocks');

                if ( $show_service_we_offer_blocks == 1 ) {
                    get_template_part( 'template-parts/serviceweoffer-section/common', 'serviceweoffer' );
                }

            }


            if( get_row_layout() == 'process_block' )
            {
                $show_process_block  = get_sub_field('show_process_block');

                if ( $show_process_block == 1 ) {
                    get_template_part( 'template-parts/processwegollow-section/common', 'processwegollow' );
                }

            }

            if( get_row_layout() == 'awards_and_recognition_blocks' )
            {   
                $add_awards_section     = get_sub_field('add_awards_section');
                if( $add_awards_section == 1)
                {
                    get_template_part( 'template-parts/awards-section/common', 'awardssection' );
                }

            }

            if( get_row_layout() == 'client_testimonial_blocks' )
            {   
                $add_testimonial_section    = get_sub_field('add_testimonial_section');
                if( $add_testimonial_section == 1)
                {
                    get_template_part( 'template-parts/testimonial-section/common', 'testimonialsection' );
                }

            }


            if( get_row_layout() == 'blogs_blocks' )
            {   
                $add_blog_section    = get_sub_field('add_blog_section');
                if( $add_blog_section == 1)
                {
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
 

            if( get_row_layout() == 'contact_us_blocks' )
            {   
                $add_contact_us_section    = get_sub_field('add_contact_us_section');
                if( $add_contact_us_section == 1)
                {
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

        }
    }
}

?>

<?php get_footer();