<?php

// Callback for register_activation_hook()
function grim_sg_activation() {
	\GRIM_SG\Frontend::activate_plugin();
}

// Callback for register_deactivation_hook()
function grim_sg_deactivation() {
	\GRIM_SG\Frontend::deactivate_plugin();
}

function sgg_polylang_post_language( $language, $post_id ) {
	if ( function_exists( 'pll_get_post_language' ) ) {
		$language = pll_get_post_language( $post_id, 'slug' );
	}

	return $language;
}
add_filter( 'sgg_news_language', 'sgg_polylang_post_language', 10, 2 );

function sgg_wpml_post_language( $language, $post_id, $post_type = 'post' ) {
	global $sitepress;

	if ( $sitepress ) {
		$language = apply_filters(
			'wpml_element_language_code',
			$language,
			array(
				'element_id'   => $post_id,
				'element_type' => $post_type,
			)
		);
	}

	return $language;
}
add_filter( 'sgg_news_language', 'sgg_wpml_post_language', 10, 3 );

function sgg_exclude_yoast_noindex_posts( $value, $post_id, $excluded_posts = array() ) {
	if ( '1' === get_post_meta( $post_id, '_yoast_wpseo_meta-robots-noindex', true ) ) {
		return false;
	}

	return $value;
}
add_filter( 'sgg_exclude_post', 'sgg_exclude_yoast_noindex_posts', 99, 3 );
add_filter( 'sgg_exclude_google_news_post', 'sgg_exclude_yoast_noindex_posts', 99, 3 );
