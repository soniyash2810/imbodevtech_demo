<?php
$add_advice_experts_title           = get_field('add_advice_experts_title','option');
$add_advice_experts_subtitle        = get_field('add_advice_experts_subtitle','option');
$add_advice_experts_link            = get_field('add_advice_experts_link','option');

if ( $add_advice_experts_title || $add_advice_experts_subtitle || $add_advice_experts_link ) {

    ?>
    <div class="col-12 col-md-12 col-lg-12 p-b-100">
        <div class="line-box bg-black p-4 p-md-5 h-100 border-bottom border-top">
            <div class="row g-0 justify-content-center h-100">
                <div class="col-12 col-md-12 col-lg-8 align-self-center">
                    <div class="d-flex flex-column h-100 justify-content-between text-center c-white">
                        <div>
                            <?php
                                if ( $add_advice_experts_title ) {
                                    echo '<h3 class="mb-3"><b>'.$add_advice_experts_title.'</b></h3>';
                                }
                                if ( $add_advice_experts_subtitle ) {
                                    echo '<p class="desc mb-4">'.$add_advice_experts_subtitle.'</p>';
                                }
                                if ( $add_advice_experts_link ) {
                                    $link_url = $add_advice_experts_link['url'];
                                    $link_title = $add_advice_experts_link['title'];
                                    $link_target = $add_advice_experts_link['target'] ? $add_advice_experts_link['target'] : '_self';
                                    ?>
                                    <a class="bg-pink c-white p-3 d-inline-flex text-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}