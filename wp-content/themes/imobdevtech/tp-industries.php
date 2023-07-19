<?php

/**

 * Template Name: Industries Page

 *

 */

get_header(); 

?>

<?php 

if( !empty( have_rows('industries_settings') ) ){

    if( have_rows('industries_settings') ):

        // Loop through rows.
        while ( have_rows('industries_settings') ) : the_row();

            //Show Industries
            if( get_row_layout() == 'show_industries' ){

            	?>
				<div class="serv-content-box">
				    <div class="container">
				        <div class="row">
				            <div class="col-12 col-md-12 col-lg-12">
				                <div class="mt-5">
				                    <nav aria-label="breadcrumb">
				                        <ol class="breadcrumb">
				                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
				                            <li class="breadcrumb-item active" aria-current="page">industries</li>
				                        </ol>
				                    </nav>
				                </div>
				                <h1 class="sub-title text-capitalize mb-1"><?php echo get_the_title(); ?></h1>
				                <p class="desc mb-5"><?php echo get_the_content(); ?></p>
				            </div>
				        </div>
				    </div>
				</div>

			    <?php
			    $show_industries_data           = get_sub_field('show_industries_data');
                $add_advice_experts_title       = get_sub_field('add_advice_experts_title');
                $add_advice_experts_subtitle    = get_sub_field('add_advice_experts_subtitle');
                $add_advice_experts_link        = get_sub_field('add_advice_experts_link');

			    if ( $add_advice_experts_title || $add_advice_experts_subtitle || $add_advice_experts_link || $show_industries_data == 1 ) {
			        
			        ?>
			        <div class="our-service bg-light-gray border-bottom border-top industries-sect">
			            <div class="container border-start border-end px-3 px-md-0">
			                <div class="row g-0 justify-content-center">
			                    
			                    <!-- Show industries Data code here -->
			                    <?php 
                                    get_template_part( 'template-parts/industries-section/common', 'industries' );

                                    //Advice Experts
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

			//Show Award Section
            if( get_row_layout() == 'awards_section' ){

                $show_awards_section = get_sub_field('show_awards_section');

                if( $show_awards_section == 1){
                    get_template_part( 'template-parts/awards-section/common', 'awardssection');
                }
            }

            //Client Testimonial
            if( get_row_layout() == 'testimonial_section' ){

                $show_testimonial_section = get_sub_field('show_testimonial_section');

                if( $show_testimonial_section == 1){
                    get_template_part( 'template-parts/testimonial-section/common', 'testimonialsection' );
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

get_footer(); ?>