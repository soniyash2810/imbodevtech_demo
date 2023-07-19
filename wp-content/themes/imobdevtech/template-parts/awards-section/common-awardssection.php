<?php
    $add_awards_title               = get_field('add_awards_title','option');
    $add_awards_subtitle            = get_field('add_awards_subtitle','option');
    $add_awards_short_description   = get_field('add_awards_short_description','option');
?>
<div class="border-bottom border-top">
    <div class="container border-end border-start">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-6 align-self-center">
                <div class="px-3 py-4 p-md-4">
                    <?php
                        if ( $add_awards_title ) {
                            echo '<span class="text-uppercase small-title-txt d-block">'.$add_awards_title.'</span>';
                        }
                        if ( $add_awards_subtitle ) {
                            echo '<h2 class="sub-title text-capitalize mb-1">'.$add_awards_subtitle.'</h2>';
                        }
                        if ( $add_awards_short_description ) {
                            echo '<p class="desc mb-0">'.$add_awards_short_description.'</p>';
                        }
                    ?>
                </div>
            </div>
            <?php
                if ( !empty( have_rows('add_awards_images','option') ) ) {
                    if( have_rows('add_awards_images','option') ):
                        $classes = array(
                            'col-4 col-md-4 col-lg-3 text-center border-bottom border-end border-start border-sm-t-1 border-sm-l-0',
                            'col-4 col-md-4 col-lg-3 text-center border-bottom border-sm-r-1 border-sm-t-1',
                            'col-4 col-md-4 col-lg-3 text-center border-top border-sm-b-1',
                            'col-4 col-md-4 col-lg-3 text-center border-end border-top border-start border-sm-t-0 border-sm-l-0',
                            'col-4 col-md-4 col-lg-3 text-center border-end',
                            'col-4 col-md-4 col-lg-3 text-center'
                        );
                    
                        $counter = 0;

                        while( have_rows('add_awards_images','option') ) : the_row();

                            $add_image = get_sub_field('add_image');
                            $class = $classes[$counter % count($classes)];
                            $counter++;
                            ?>
                            <div class="<?php echo $class; ?>">
                                <div class="p-3">
                                    <img src="<?php echo esc_url($add_image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($add_image['alt']); ?>"/>
                                </div>
                            </div>
                            <?php
                            
                        endwhile;
                    endif;
                }
            ?>
        </div>
    </div>
</div>