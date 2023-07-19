<header class="cd-main-header p-50 sticky-top header-bg-color bg-white border-bottom">
    <div class="navbar navbar-expand-sm py-0">
        <div class="container-fluid justify-content-between px-0">
            <?php
                $add_header_logo = get_field('add_header_logo','option');
                if ( !empty( $add_header_logo ) ) {
                    ?>
                     <a class="navbar-brand p-0 m-0 ms-4" href="<?php echo home_url(); ?>"><img height="40px" src="<?php echo $add_header_logo['url']; ?>" alt="logo"></a>
                    <?php
                }else{
                    ?>
                     <a class="navbar-brand p-0 m-0 ms-4" href="<?php echo home_url(); ?>"><img height="40px" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="logo"></a>
                    <?php
                }
            ?>
            <!--Desktop menu-->

            <?php
                // Display the menu in the header template
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'main-menu d-flex p-0 m-0 list-unstyled',
                ));

                //Request Quote Link
                $add_request_quote_link = get_field('add_request_quote_link','option');

                if( $add_request_quote_link ){
                    $link_url = $add_request_quote_link['url'];
                    $link_title = $add_request_quote_link['title'];
                    $link_target = $add_request_quote_link['target'] ? $add_request_quote_link['target'] : '_self';
                    ?>
                    <a class="p-4 bg-pink c-white text-uppercase" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php
                }

            ?>
            <!--End Desktop menu-->
        </div>
    </div>
</header>
<div class="cd-main-content"></div>
<main>