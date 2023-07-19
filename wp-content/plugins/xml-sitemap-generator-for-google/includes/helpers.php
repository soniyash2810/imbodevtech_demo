<?php

function sgg_pro_enabled() {
	return defined( 'SGG_PRO_VERSION' );
}

function sgg_get_pro_url() {
	return 'https://wpgrim.net/google-xml-sitemaps-generator-pro/?utm_source=sgg-plugin&utm_medium=buy-now&utm_campaign=xml_sitemap';
}

function sgg_show_pro_badge() {
	if ( ! sgg_pro_enabled() ) {
		load_template( GRIM_SG_PATH . '/templates/partials/pro-badge.php', false );
	}
}

function sgg_show_pro_overlay() {
	if ( ! sgg_pro_enabled() ) {
		load_template( GRIM_SG_PATH . '/templates/partials/pro-overlay.php', false );
	}
}

function sgg_pro_class() {
	return sgg_pro_enabled() ? 'active' : 'inactive';
}

function sgg_parse_language( $lang ) {
	$lang = str_replace( '_', '-', convert_chars( strtolower( strip_tags( $lang ) ) ) );

	if ( 0 === strpos( $lang, 'zh' ) ) {
		$lang = strpos( $lang, 'hk' ) || strpos( $lang, 'hant' ) || strpos( $lang, 'tw' ) ? 'zh-tw' : 'zh-cn';
	} else {
		$explode = explode( '-', $lang );
		$lang    = $explode[0];
	}

	return ! empty( $lang ) ? $lang : 'en';
}
