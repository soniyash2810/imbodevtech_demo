</main>
<?php
    $add_footer_logo                = get_field('add_footer_logo','option');
    $add_footer_short_description   = get_field('add_footer_short_description','option');

    $add_facebook_url               = get_field('add_facebook_url','option');
    $add_youtube_url                = get_field('add_youtube_url','option');
    $add_linkdin_url                = get_field('add_linkdin_url','option');
    $add_twitter_url                = get_field('add_twitter_url','option');
    $add_instagram_url              = get_field('add_instagram_url','option');
?>
<footer class="bg-black">
    <div class="container border-start border-end">
        <div class="row py-5">
            <div class="col-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                <div class="px-0 px-md-4">
                    <?php
                        if ( $add_footer_logo ) {
                            echo '<a href="'.home_url().'"><img src="'.esc_url($add_footer_logo['url']).'" alt="'.esc_attr($add_footer_logo['alt']).'"/></a>';
                        }
                        if ( $add_footer_short_description ) {
                            echo '<p class="desc mb-0 c-white mt-3">'.$add_footer_short_description.'</p>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <ul class="list-unstyled d-flex mb-0 justify-content-start justify-content-lg-end px-0 px-md-4 mt-4 mt-lg-0">
                    <?php
                        if( $add_facebook_url ){
                            echo '<li class="me-2"><a href="'.$add_facebook_url.'"><img src="'.get_stylesheet_directory_uri().'/assets/img/fb.svg" alt="facebook"/></a></li>';
                        }
                        if( $add_youtube_url ){
                            echo '<li class="me-2"><a href="'.$add_youtube_url.'"><img src="'.get_stylesheet_directory_uri().'/assets/img/yt.svg" alt="youtube"/></a></li>';
                        }
                        if( $add_linkdin_url ){
                            echo '<li class="me-2"><a href="'.$add_linkdin_url.'"><img src="'.get_stylesheet_directory_uri().'/assets/img/in.svg" alt="linkedin"/></a></li>';
                        }
                        if( $add_twitter_url ){
                            echo '<li class="me-2"><a href="'.$add_twitter_url.'"><img src="'.get_stylesheet_directory_uri().'/assets/img/tw.svg" alt="twitter"/></a></li>';
                        }
                        if( $add_instagram_url ){
                            echo '<li class="me-2"><a href="'.$add_instagram_url.'"><img src="'.get_stylesheet_directory_uri().'/assets/img/insta.svg" alt="instagram"/></a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row border-top">
            <div class="col-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 border-end">
                <div class="p-0 p-md-4">
                    <?php
                        $add_quick_links_title = get_field('add_quick_links_title','option');
                        if( $add_quick_links_title ){
                            echo '<h2 class="sub-title c-white mb-3">'.$add_quick_links_title.'</h2>';
                        }

                        if ( !empty( have_rows('add_quick_links_link','option') ) ) {
                            if( have_rows('add_quick_links_link','option') ):
                                echo '<ul class="list-unstyled mb-0 links">';
                                    while( have_rows('add_quick_links_link','option') ) : the_row();

                                        $add_link = get_sub_field('add_link');
                                        if( $add_link ){
                                            $link_url = $add_link['url'];
                                            $link_title = $add_link['title'];
                                            $link_target = $add_link['target'] ? $add_link['target'] : '_self';
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
            <div class="col-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                <div class="p-0 p-md-4">
                    <?php
                        $add_services_title = get_field('add_services_title','option');
                        if( $add_services_title ){
                            echo '<h2 class="sub-title c-white mb-3">'.$add_services_title.'</h2>';
                        }
                    ?>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                            <?php
                                if ( !empty( have_rows('add_services_first_part_link','option') ) ) {
                                    if( have_rows('add_services_first_part_link','option') ):
                                        echo '<ul class="list-unstyled mb-0 links">';
                                            while( have_rows('add_services_first_part_link','option') ) : the_row();

                                                $add_link = get_sub_field('add_link');
                                                if( $add_link ){
                                                    $link_url = $add_link['url'];
                                                    $link_title = $add_link['title'];
                                                    $link_target = $add_link['target'] ? $add_link['target'] : '_self';
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
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                            <?php
                                if ( !empty( have_rows('add_services_second_part_link','option') ) ) {
                                    if( have_rows('add_services_second_part_link','option') ):
                                        echo '<ul class="list-unstyled mb-0 links">';
                                            while( have_rows('add_services_second_part_link','option') ) : the_row();

                                                $add_link = get_sub_field('add_link');
                                                if( $add_link ){
                                                    $link_url = $add_link['url'];
                                                    $link_title = $add_link['title'];
                                                    $link_target = $add_link['target'] ? $add_link['target'] : '_self';
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
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                            <?php
                                if ( !empty( have_rows('add_services_third_part_link','option') ) ) {
                                    if( have_rows('add_services_third_part_link','option') ):
                                        echo '<ul class="list-unstyled mb-0 links">';
                                            while( have_rows('add_services_third_part_link','option') ) : the_row();

                                                $add_link = get_sub_field('add_link');
                                                if( $add_link ){
                                                    $link_url = $add_link['url'];
                                                    $link_title = $add_link['title'];
                                                    $link_target = $add_link['target'] ? $add_link['target'] : '_self';
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
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border-top">
                <div class="p-3 p-md-4">
                    <?php
                        $add_copyright_content = get_field('add_copyright_content','option');
                        if ( $add_copyright_content ) {
                            echo $add_copyright_content;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/owl.carousel.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.accordionjs.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/custom.js" type="text/javascript"></script>

<!--footer end--> 

    <?php wp_footer(); ?>

    </body>

</html>