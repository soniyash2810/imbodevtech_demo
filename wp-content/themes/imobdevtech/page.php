<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Imobdev Technology
 */

get_header(); ?>

<div class="p-y-100 blog-content blog-pg pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-10">
                <?php
                    echo do_shortcode(get_the_content());
                ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
