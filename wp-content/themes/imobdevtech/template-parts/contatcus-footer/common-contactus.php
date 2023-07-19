<?php
//Get value for general settings using common contact us field.
$add_small_contact_us_title = get_field('add_small_contact_us_title', 'option');
$add_main_contact_us_title = get_field('add_main_contact_us_title', 'option');
$add_short_contact_us_description = get_field('add_short_contact_us_description', 'option');
$add_telephone_number = get_field('add_telephone_number', 'option');
$add_email = get_field('add_email', 'option');
$add_skype_contact = get_field('add_skype_contact', 'option');
$add_common_form_shortcode = get_field('add_common_form_shortcode', 'option');
?>
<div class="contact-us-sect bg-light-gray pt-5 pt-xl-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12 col-xl-4 text-center align-self-center">
                <div class="row">
                    <?php
                    if ($add_small_contact_us_title) {
                        echo '<span class="text-uppercase small-title-txt d-block">' . $add_small_contact_us_title . '</span>';
                    }
                    if ($add_main_contact_us_title) {
                        echo '<h2 class="sub-title text-capitalize mb-0">' . $add_main_contact_us_title . '</h2>';
                    }
                    if ($add_short_contact_us_description) {
                        echo '<p class="desc mb-0">' . $add_short_contact_us_description . '</p>';
                    }
                    if ($add_telephone_number) {
                        $converted_number = str_replace(array(' '), '', $add_telephone_number);
                        echo '<div class="col-12 col-md-4 col-xl-12 mt-4 text-center">';
                        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/call-rounded-icn.svg" alt=""/>';
                        echo '<a href="tel:' . $converted_number . '" class="c-black d-block mt-2">' . $add_telephone_number . '</a>';
                        echo '</div>';
                    }
                    if ($add_email) {
                        echo '<div class="col-12 col-md-4 col-xl-12 mt-4 text-center">';
                        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/mail-rounded-icn.svg" alt=""/>';
                        echo '<a href="mailto:' . $add_email . '" class="c-black d-block mt-2">' . $add_email . '</a>';
                        echo '</div>';
                    }
                    if ($add_skype_contact) {
                        echo '<div class="col-12 col-md-4 col-xl-12 mt-4 text-center">';
                        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/skype-rounded-icn.svg" alt=""/>';
                        echo '<a href="Skype:' . $add_skype_contact . '" class="c-black d-block mt-2">' . $add_skype_contact . '</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-8 mt-5 mt-xl-0">
                <?php
                if ($add_common_form_shortcode) {
                    echo do_shortcode($add_common_form_shortcode);
                }
                ?>
            </div>
        </div>
    </div>
</div>