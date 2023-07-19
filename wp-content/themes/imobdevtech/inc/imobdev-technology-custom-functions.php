<?php

/**
 * Custom Function.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 */

/*==============================================================*/
/* Start your custom function here */
/*==============================================================*/


function imobdev_recent_posts_shortcode($atts) {
    $atts = shortcode_atts(array(
        'posts_per_page' => 3 // Default number of posts to display
    ), $atts);

    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => intval($atts['posts_per_page']),
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts_query = new WP_Query($query_args);

    ob_start(); // Start output buffering

    if ($posts_query->have_posts()) :
        while ($posts_query->have_posts()) :
            $posts_query->the_post();
            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
            <div class="col-12 col-md-6 col-xxl-3 mb-4 mb-xxl-0">
                <div class="single-block d-flex overflow-hidden position-relative" style="background-image: url(<?php echo $featured_image_url; ?>)">
                    <div class="content align-self-end p-4 position-relative">
                        <a href="<?php the_permalink(); ?>" class="c-white">
                            <h3><?php the_title(); ?></h3>
                            <p class="desc mb-4"><?php echo get_the_excerpt(); ?></p>
                            <div class="d-flex justify-content-between c-pink">
                                <span><?php echo get_the_date('d M Y'); ?></span>
                                <?php 
                                    $imobtech_blog_read_time_get = get_post_meta(get_the_ID(),'imobtech_blog_read_time_get', true);
                                    if ( !empty( $imobtech_blog_read_time_get ) ) {
                                        echo '<span>'.$imobtech_blog_read_time_get.' Min Read</span>';
                                    }else{
                                        echo '<span>0 Min Read</span>';
                                    }
                                ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    endif;

    wp_reset_postdata();

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('recent_posts', 'imobdev_recent_posts_shortcode');


/*==============================================================*/
/* Start FAQ Schema Generator */
/*==============================================================*/

if( !function_exists('imobtech_faq_question_array_generator'))
{
    function imobtech_faq_question_array_generator( $faq_question, $faq_answer ) {

        $question_array = array(
            '@type'          => 'Question',
            'name'           => $faq_question,
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => strip_tags($faq_answer)
            )
        );

        return $question_array;

    }

}


if( !function_exists('imobtech_faq_schema_generator'))
{
	function imobtech_faq_schema_generator( $faq_schema ) {

        if (!empty($faq_schema)) {
            $faq_schema_json = array(
                '@context'   => 'https://schema.org',
                '@type'      => 'FAQPage',
                'mainEntity' => $faq_schema
            );
    
            $script = '<script type="application/ld+json">' . json_encode( $faq_schema_json ) . '</script>';
    
            add_action('wp_footer', function () use ($script) {
                echo $script;
            });
        }
    }
    
}

/*==============================================================*/
/* End FAQ Schema Generator */
/*==============================================================*/


/*==============================================================*/
/* Start Blog readin time */
/*==============================================================*/

if( !function_exists('imobtech_blog_read_time_get'))
{
	function imobtech_blog_read_time_get( $content ) {

        $words_per_minute = 180; // Adjust this value as per your preference
        
        if ( !empty( $content ) ) {
            $word_count = str_word_count(strip_tags($content));
            $reading_time = ceil($word_count / $words_per_minute);
        }else{
            $reading_time = '0';
        }
        
        return $reading_time;
       
    }
    
}


/*==============================================================*/
/* End Blog readin time */
/*==============================================================*/