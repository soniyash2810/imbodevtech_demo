<div class="p-y-100 blog-sect">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6 text-center">
                <span class="text-uppercase small-title-txt d-block">Blog</span>
                <h2 class="sub-title text-capitalize mb-0">latest insights</h2>
                <p class="desc mb-0">Explore our perspectives and analysis of the newest trends in technology and business.</p>
            </div>
            <div class="clearfix mb-4 mb-lg-5"></div>
            <?php
                //Get Dynamic Career posts
                $blog_args['post_type'] 		= 'post';
                $blog_args['post_status'] 	    = 'publish';
                $blog_args['posts_per_page'] 	= 3;
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
                        <div class="col-10 col-sm-8 col-md-4 col-lg-4 mb-3 mb-md-0">
                            <div class="single-block d-flex overflow-hidden position-relative" style="background-image: url(<?php echo $backgroundImg[0]; ?>)">
                                <div class="content align-self-end p-4 p-md-3 p-lg-4 position-relative ">
                                    <a href="<?php echo get_the_permalink($ID); ?>" class="c-white">
                                        <h3><?php echo get_the_title($ID); ?></h3>
                                        <p class="desc mb-4"><?php echo get_the_content($ID); ?></p>
                                        <div class="d-flex justify-content-between c-pink">
                                            <span><?php echo get_the_date('j F Y'); ?></span>
                                            <span>5 Min Read</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
            ?>
            <div class="col-12 col-md-12 col-lg-12 text-center mt-4">
                <a href="<?php echo home_url().'/blog'; ?>" class="c-pink desc d-flex justify-content-center">View All <img class="align-self-center ms-2" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow.svg" alt=""/></a>
            </div>
        </div>
    </div>
</div>