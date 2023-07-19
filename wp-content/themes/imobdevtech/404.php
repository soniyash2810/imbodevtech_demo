<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Africa Institute
 */

get_header();
?>

<!--hero section-->
<div class="serv-hero-sect pb-0 p-y-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md-5 col-lg-4 align-self-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">404</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--hero section-->

<!--Blog-->
<div class="p-y-100 blog-sect blog-pg pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-9 text-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png" class="img-fluid w-50" alt="alt"/>
                <h1 class="sub-title mt-5 mb-1">Ooops, Page Not Found</h1>
                <p class="h5 c-gray lh-30 mb-4"><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</i></p>
                <a href="<?php echo home_url(); ?>" class="c-pink">Back to Home</a>
            </div>
        </div>
    </div>
</div>
<!--Blog-->

<!--Portfolio-->
<?php
    $select_portfolio                   = get_field('select_portfolio','option');
    $add_portfolio_main_title           = get_field('add_portfolio_main_title','option');
    $add_portfolio_subtitle             = get_field('add_portfolio_subtitle','option');
    $add_portfolio_description          = get_field('add_portfolio_description','option');
    $add_portfolio_main_title           = get_field('add_portfolio_main_title','option');

    if ( !empty( $select_portfolio ) ){
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
                                                                            echo '<img class="me-5" src="'.$add_portfolio_icon_image.'" alt=""/>';
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
?>
<!--Portfolio-->

<!--Awards & Recognition-->
<?php get_template_part( 'template-parts/awards-section/common', 'awardssection' ); ?>
<!--Awards & Recognition-->

<!--contact us-->
<?php get_template_part( 'template-parts/contatcus-footer/common', 'contactus' ); ?>
<!--contact us-->

<?php
get_footer();
