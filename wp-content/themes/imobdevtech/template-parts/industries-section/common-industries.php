<?php
    //Get Dynamic Career posts
    $blog_args['post_type'] 		= 'imobdev-industries';
    $blog_args['post_status'] 	    = 'publish';
    $blog_args['posts_per_page'] 	= -1;
    $blog_args['order'] 			= 'DESC';
    $blog_args['orderby'] 		    = 'DATE';

    $blog_loop = new WP_Query( $blog_args );

    if( $blog_loop->have_posts() )
    {
        while( $blog_loop->have_posts() )
        {
            $blog_loop->the_post();
            $ID = get_the_ID();

            $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );

            ?>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="bg-img p-y-100" style="background-image: url(<?php echo $backgroundImg[0]; ?>)"></div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 p-b-100">
                <div class="line-box bg-white p-4 p-md-5 h-100 border-bottom border-top">
                    <div class="row g-0 justify-content-between h-100">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="d-flex flex-column h-100 justify-content-between">
                                <div>
                                    <h3 class="mb-2"><b><?php echo get_the_title($ID); ?></b></h3>
                                    <p class="desc mb-0"><?php echo get_the_content($ID); ?></p>
                                    <a class="c-pink mt-4 d-inline-flex" href="<?php echo get_the_permalink($ID); ?>">Read More <img class="ms-3" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow.svg" alt="alt"/></a>
                                </div>
                            </div>
                        </div>
                        <?php
                            if ( !empty( have_rows('add_industries_social_link', $ID) ) ) {
                                if( have_rows('add_industries_social_link', $ID) ):
                                    echo'<div class="col-12 col-md-4 col-lg-4">';
                                        echo'<ul class="listing-list list-unstyled m-0">';
                                            while( have_rows('add_industries_social_link', $ID) ) : the_row();

                                                $add_link = get_sub_field('add_link');
                                                
                                                if ( $add_link ) {
                                                    $link_url = $add_link['url'];
                                                    $link_title = $add_link['title'];
                                                    $link_target = $add_link['target'] ? $add_link['target'] : '_self';
                                                    ?>
                                                    <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                                                    <?php
                                                }
                                                
                                            endwhile;
                                        echo'</ul>';
                                    echo'</div>';
                                endif;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
    }
?>