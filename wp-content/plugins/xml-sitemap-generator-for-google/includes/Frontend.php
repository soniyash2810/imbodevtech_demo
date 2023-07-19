<?php

namespace GRIM_SG;

use GRIM_SG\Vendor\Controller;

class Frontend extends Controller {
	private static $rules_option  = 'grim_sg_rules';
	private static $rules_version = '1.0';

	/**
	 * Sitemap constructor.
	 */
	public function __construct() {
		add_filter( 'query_vars', array( $this, 'register_query_vars' ), 1 );
		add_filter( 'template_redirect', array( $this, 'template_redirect' ), 1 );
		add_action( 'do_robots', array( $this, 'do_robots_link' ), 100 );
	}

	/**
	 * Register Sitemap Query Variable
	 * @param $query_vars
	 * @return mixed
	 */
	public function register_query_vars( $query_vars ) {
		$query_vars[] = 'sitemap_xml';
		$query_vars[] = 'sitemap_html';
		$query_vars[] = 'google_news';
		$query_vars[] = 'image_sitemap';
		$query_vars[] = 'video_sitemap';

		return $query_vars;
	}

	/**
	 * Template Redirect
	 */
	public function template_redirect() {
		global $wp_query;

		$is_xml_sitemap   = ! empty( $wp_query->query_vars['sitemap_xml'] );
		$is_html_sitemap  = ! empty( $wp_query->query_vars['sitemap_html'] );
		$is_google_news   = ! empty( $wp_query->query_vars['google_news'] );
		$is_image_sitemap = ! empty( $wp_query->query_vars['image_sitemap'] );
		$is_video_sitemap = ! empty( $wp_query->query_vars['video_sitemap'] );

		if ( $is_xml_sitemap || $is_html_sitemap || $is_google_news || $is_image_sitemap || $is_video_sitemap ) {
			$wp_query->is_404  = false;
			$wp_query->is_feed = true;

			if ( $is_google_news ) {
				( new GoogleNews() )->show_sitemap( true, 'google-news' );
			} elseif ( $is_image_sitemap ) {
				( new ImageSitemap() )->show_sitemap( true, 'image-sitemap' );
			} elseif ( $is_video_sitemap ) {
				( new VideoSitemap() )->show_sitemap( true, 'video-sitemap' );
			} else {
				( new Sitemap() )->show_sitemap( $is_xml_sitemap );
			}

			exit;
		}
	}

	/**
	 * Add Sitemap Links to Robots
	 */
	public function do_robots_link() {
		$settings = $this->get_settings();
		$home_url = get_home_url();

		if ( $settings->sitemap_to_robots ) {
			echo "\nSitemap: {$home_url}/{$settings->sitemap_url}\n";
		}
	}

	/**
	 * Add Custom Rewrite Rules
	 *
	 * @param $wp_rules
	 * @return array
	 */
	public static function add_rewrite_rules( $wp_rules ) {
		$settings    = get_option( self::$slug, new Settings() );
		$sitemap_url = str_replace( '.', '\.', $settings->sitemap_url ) . '$';

		$grim_sg_rules = array(
			$sitemap_url => 'index.php?sitemap_xml=true',
		);

		if ( sgg_pro_enabled() && $settings->enable_html_sitemap ) {
			$html_sitemap_url = str_replace( '.', '\.', $settings->html_sitemap_url ) . '$';
			$grim_sg_rules[ $html_sitemap_url ] = 'index.php?sitemap_html=true';
		}

		if ( $settings->enable_google_news ) {
			$google_news_url = str_replace( '.', '\.', $settings->google_news_url ) . '$';
			$grim_sg_rules[ $google_news_url ] = 'index.php?google_news=true';
		}

		if ( $settings->enable_image_sitemap ) {
			$image_sitemap_url = str_replace( '.', '\.', $settings->image_sitemap_url ) . '$';
			$grim_sg_rules[ $image_sitemap_url ] = 'index.php?image_sitemap=true';
		}

		if ( $settings->enable_video_sitemap ) {
			$video_sitemap_url = str_replace( '.', '\.', $settings->video_sitemap_url ) . '$';
			$grim_sg_rules[ $video_sitemap_url ] = 'index.php?video_sitemap=true';
		}

		return array_merge( $grim_sg_rules, $wp_rules );
	}

	/**
	 * Set Rewrite Hooks
	 */
	public static function set_rewrite_hooks() {
		add_filter( 'rewrite_rules_array', array( self::class, 'add_rewrite_rules' ), 100, 1 );
	}

	/**
	 * Activate Rewrite Rules
	 */
	public static function activate_rewrite_rules() {
		global $wp_rewrite;

		$wp_rewrite->flush_rules( false );

		update_option( self::$rules_option, self::$rules_version );
	}

	/**
	 * Run on Plugin Activate
	 */
	public static function activate_plugin() {
		self::set_rewrite_hooks();
		self::activate_rewrite_rules();
		flush_rewrite_rules();
	}

	/**
	 * Run on Plugin Deactivate
	 */
	public static function deactivate_plugin() {
		// Do Something after Plugin Deactivate
	}
}
