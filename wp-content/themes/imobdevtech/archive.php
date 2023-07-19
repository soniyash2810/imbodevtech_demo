<?php
/**
 * Archive page
 *
 */
get_header(); ?>

<!--hero section-->
<div class="serv-content-box">
    <div class="serv-content-sect bg-img position-relative" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/archive-placeholder.png)">
        <div class="container h-100">
            <div class="row justify-content-between align-items-end position-relative h-100">
                <div class="col-12 col-md-8 col-lg-8 align-self-end">
                    <div class="my-5">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <?php
                                    if ( is_category() ) {
                                        ?>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo single_cat_title( '', false ); ?></li>
                                        <?php
                                    } elseif ( is_tag() ) {
                                        ?>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo single_tag_title( '', false ); ?></li>
                                        <?php
                                    } elseif ( is_tax() ) { // Add this condition for custom taxonomy
                                        ?>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo single_term_title( '', false ); ?></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="breadcrumb-item active" aria-current="page">>No found....</li>
                                        <?php
                                    }
                                ?>
                            </ol>
                        </nav>
                        <?php
                            if ( is_category() ) {
                                ?>
                                <h1 class="sub-title mt-3 mb-0 c-white">Category : <?php echo single_cat_title( '', false ); ?></h1>
                                <?php
                            } elseif ( is_tag() ) {
                                ?>
                                <h1 class="sub-title mt-3 mb-0 c-white">Tag : <?php echo single_tag_title( '', false ); ?></h1>
                                <?php
                            } elseif ( is_tax() ) { // Add this condition for custom taxonomy
                                ?>
                                <h1 class="sub-title mt-3 mb-0 c-white"><?php echo get_taxonomy( get_queried_object()->taxonomy )->labels->singular_name; ?> : <?php echo single_term_title( '', false ); ?></h1>
                                <?php
                            } else {
                                ?>
                                <h1 class="sub-title mt-3 mb-0 c-white">No found....</h1>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--hero section-->

<!--Blog-->
<div class="p-y-100 blog-sect blog-pg portfolio-list-sect pt-5">
    <div class="container">
        <div class="row justify-content-center">

            <?php 
            if (have_posts()) :
                while (have_posts()) : the_post(); 

                    $news_img = get_post_thumbnail_id(get_the_id());
                    $news_feature_img = wp_get_attachment_image_src($news_img, 'full');
                    ?>
                    <div class="col-12 col-md-4 col-lg-4 mb-3 mb-md-5">
                        <div class="single-block d-flex overflow-hidden position-relative">
                            <div class="content align-self-end p-0 position-relative ">
                                <a href="<?php echo get_permalink(get_the_ID()); ?>" class="c-white">
                                    <img src="<?php echo $news_feature_img[0]; ?>" class="img-fluid" alt="alt" />
                                    <div class="p-4">
                                        <h3 class="h4 mt-1"><?php echo get_the_title(); ?></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
            <!-- Pagination -->
            <div class="col-12 col-md-12 col-lg-12 mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0 justify-content-center">
                        <?php
                        global $wp_query;
                        $total_pages = $wp_query->max_num_pages;

                        $prev_link = get_previous_posts_link('&laquo;');
                        if ($prev_link) {
                            echo '<li class="page-item">';
                            echo str_replace('<a', '<a class="page-link"', $prev_link);
                            echo '</li>';
                        }

                        $paged = max(1, get_query_var('paged')); // Current page number
                        $range = 2; // Number of page links to show before and after the current page

                        if ($total_pages > 1) {
                            // Show the first page link
                            if ($paged > 1 + $range) {
                                echo '<li class="page-item">';
                                echo '<a class="page-link" href="' . esc_url(get_pagenum_link(1)) . '">1</a>';
                                echo '</li>';
                                if ($paged > 2 + $range) {
                                    echo '<li class="page-item disabled">';
                                    echo '<span class="page-link">...</span>';
                                    echo '</li>';
                                }
                            }

                            // Loop through the pages
                            for ($i = max(1, $paged - $range); $i <= min($paged + $range, $total_pages); $i++) {
                                if ($i === $paged) {
                                    echo '<li class="page-item active">';
                                    echo '<span class="page-link">' . $i . '</span>';
                                    echo '</li>';
                                } else {
                                    echo '<li class="page-item">';
                                    echo '<a class="page-link" href="' . esc_url(get_pagenum_link($i)) . '">' . $i . '</a>';
                                    echo '</li>';
                                }
                            }

                            // Show the last page link
                            if ($paged < $total_pages - $range) {
                                if ($paged < $total_pages - $range - 1) {
                                    echo '<li class="page-item disabled">';
                                    echo '<span class="page-link">...</span>';
                                    echo '</li>';
                                }
                                echo '<li class="page-item">';
                                echo '<a class="page-link" href="' . esc_url(get_pagenum_link($total_pages)) . '">' . $total_pages . '</a>';
                                echo '</li>';
                            }
                        }

                        $next_link = get_next_posts_link('&raquo;', $total_pages);
                        if ($next_link) {
                            echo '<li class="page-item">';
                            echo str_replace('<a', '<a class="page-link"', $next_link);
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- End Pagination -->
        </div>
    </div>
</div>
<!--Blog-->

<?php
get_footer();

