<?php
if ( !empty(have_rows('add_client_logo','option')) ) {
    ?>
    <div class="meet-our-client p-b-100">
        <div class="container">
            <?php
                if( have_rows('add_client_logo','option') ):
                    ?>
                    <div class="row justify-content-between mt-5 pt-5">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="owl-carousel our-client-carousel">
                                <?php
                                    while( have_rows('add_client_logo','option') ) : the_row();

                                        $add_logo = get_sub_field('add_logo');
                                        ?>
                                        <div>
                                            <img src="<?php echo esc_url($add_logo['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($add_logo['alt']); ?>"/>
                                        </div>
                                        <?php 
                                    endwhile; 
                                ?>         
                            </div>
                        </div> 
                    </div>
                    <?php 
                endif; 
            ?>
        </div>
    </div>
    <?php 
}