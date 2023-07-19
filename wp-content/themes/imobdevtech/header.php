<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <!--title end-->
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl.carousel.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl.theme.default.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/cdnjs.cloudflare.com_ajax_libs_animate.css_4.1.1_animate.compat.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/jquery.accordionjs.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <!--favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon-16x16.png">
        <?php wp_head();?>
    </head>
    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part( 'template-parts/header/page', 'header' ); ?>

