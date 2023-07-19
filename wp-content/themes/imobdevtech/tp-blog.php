<?php

/**

 * Template Name: Blog Page

 *

 */

get_header(); 

?>
<?php

if( !empty( have_rows('blog_page_blocks') ) ){

    if( have_rows('blog_page_blocks') ):

        // Loop through rows.
        while ( have_rows('blog_page_blocks') ) : the_row();

            //Hero Banner Block
            if( get_row_layout() == 'hero_banner_blocks' ){

                $add_hero_banner_title              = get_sub_field('add_hero_banner_title');
                $add_hero_banner_description        = get_sub_field('add_hero_banner_description');
                $add_hero_banner_image              = get_sub_field('add_hero_banner_image');

                if ( $add_hero_banner_title || $add_hero_banner_description || $add_hero_banner_image ) {
                    ?>
                    <!--hero section-->
                    <div class="serv-hero-sect pb-0">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-5 col-lg-4 align-self-center mt-5 mt-lg-0">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                        </ol>
                                    </nav>
                                    <?php
                                        if ( $add_hero_banner_title ) {
                                            echo '<h1 class="sub-title mt-3 mb-3">'.$add_hero_banner_title.'</h1>';      
                                        }
                                        if ( $add_hero_banner_description ) {
                                            echo '<p class="h5 c-gray lh-30 mb-0">'.$add_hero_banner_description.'</p>';     
                                        }
                                    ?>
                                </div>
                                <div class="col-12 col-md-7 col-lg-7 mt-4 mt-lg-0">
                                    <?php
                                        if ( $add_hero_banner_image ) {
                                            echo ' <img src="'.esc_url($add_hero_banner_image['url']).'" class="img-fluid" alt="'.esc_attr($add_hero_banner_image['alt']).'"/>';      
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--hero section-->
                    <?php
                }

            }

            //Show Blog Data here
            if( get_row_layout() == 'show_blog_block' ){

                $show_blog_section = get_sub_field('show_blog_section');

                if ( $show_blog_section == 1 ) {

                    // Set the current page
                    $current_page = max(1, get_query_var('paged'));

                    // Get dynamic Portfolio posts
                    $blog_args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 12,
                        'order' => 'DESC',
                        'orderby' => 'DATE',
                        'paged' => $current_page // Set the current page for pagination
                    );

                    $blog_loop = new WP_Query($blog_args);

                    if ($blog_loop->have_posts()) {
                        echo '<div class="p-y-100 blog-sect blog-pg pt-5">';
                            echo '<div class="container">';
                                echo '<div class="row justify-content-center">';
                                    while ($blog_loop->have_posts()) {
                                        $blog_loop->the_post();

                                        $ID = get_the_ID();
                                        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );

                                        $backgroundImg = ( $backgroundImg ) ? ' style="background-image: url('.$backgroundImg[0].')"' : '';

                                        $imobtech_blog_read_time_get = get_post_meta($ID,'imobtech_blog_read_time_get', true);

                                        echo '<div class="col-12 col-md-6 col-lg-4 col-xxl-3 mb-3 mb-md-4">';
                                            echo '<div class="single-block d-flex overflow-hidden position-relative"'.$backgroundImg.'>';
                                                echo '<div class="content align-self-end p-4 position-relative ">';
                                                    echo '<a href="'.get_the_permalink($ID).'" class="c-white">';
                                                        echo '<h3>'.get_the_title($ID).'</h3>';
                                                        echo '<p class="desc mb-4">'.get_the_content($ID).'</p>';
                                                        echo '<div class="d-flex justify-content-between c-pink">';
                                                            echo '<span>'.get_the_date('j F Y').'</span>';
                                                            if ( !empty( $imobtech_blog_read_time_get ) ) {
                                                                echo '<span>'.$imobtech_blog_read_time_get.' Min Read</span>';
                                                            }else{
                                                                echo '<span>0 Min Read</span>';
                                                            }
                                                        echo '</div>';
                                                    echo '</a>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                    // Display pagination links
                                    if ($blog_loop->max_num_pages > 1) {
                                        echo '<div class="col-12 col-md-12 col-lg-12 mt-4">';
                                            echo '<nav aria-label="Page navigation">';
                                                echo '<ul class="pagination mb-0 justify-content-center">';
                                                    // Previous page link
                                                    $prev_link = get_previous_posts_link('&laquo;');
                                                    if ($prev_link) {
                                                        echo '<li class="page-item">';
                                                            echo str_replace('<a', '<a class="page-link"', $prev_link);
                                                        echo '</li>';
                                                    }
                                                    // Page numbers
                                                    for ($i = 1; $i <= $blog_loop->max_num_pages; $i++) {
                                                        $active_class = ($i == $current_page) ? 'active' : '';
                                                        echo '<li class="page-item ' . $active_class . '">';
                                                            echo '<a class="page-link" href="' . esc_url(get_pagenum_link($i)) . '">' . $i . '</a>';
                                                        echo '</li>';
                                                    }
                                                    // Next page link
                                                    $next_link = get_next_posts_link('&raquo;', $blog_loop->max_num_pages);
                                                    if ($next_link) {
                                                        echo '<li class="page-item">';
                                                            echo str_replace('<a', '<a class="page-link"', $next_link);
                                                        echo '</li>';
                                                    }
                                                echo '</ul>';
                                            echo '</nav>';
                                        echo '</div>';
                                    }
                                    //Reset post data
                                    wp_reset_postdata();

                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }

                }

            }

            //Portfolio Block
            if( get_row_layout() == 'portfolio_block' ){

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

                $show_awards_section = get_sub_field('show_awards_section');

                if ( $show_awards_section == 1 ) {
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

                $show_contact_us_section = get_sub_field('show_contact_us_section');

                if ( $show_contact_us_section == 1 ) {
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

<?php get_footer(); ?>