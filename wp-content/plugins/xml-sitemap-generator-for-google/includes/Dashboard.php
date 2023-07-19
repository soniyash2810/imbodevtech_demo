<?php

namespace GRIM_SG;

use GRIM_SG\Vendor\Controller;
use SGG_PRO\Classes\Video_Sitemap;
use SGG_PRO\Classes\Youtube_Cache;

class Dashboard extends Controller {

	/**
	 * Dashboard constructor.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu_pages' ) );
		add_filter( 'plugin_action_links_' . GRIM_SG_BASENAME, array( $this, 'plugin_action_links' ) );
		add_filter( 'plugin_row_meta', array( $this, 'plugin_meta_links' ), 10, 2 );
	}

	/**
	 * Menu
	 */
	public function admin_menu_pages() {
		add_options_page(
			esc_html__( 'Google XML Sitemaps Generator Settings', 'xml-sitemap-generator-for-google' ),
			esc_html__( 'XML Sitemaps', 'xml-sitemap-generator-for-google' ),
			'manage_options',
			self::$slug,
			array( $this, 'render_settings_page' )
		);
	}

	/**
	 * Register Settings
	 */
	public function register_settings() {
		register_setting( self::$slug, self::$slug );
	}

	/**
	 * Save Settings
	 */
	public function save_settings() {
		if ( 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) || ! isset( $_POST['save_settings'] ) ) {
			return;
		}

		if ( ! isset( $_POST['sgg_settings_nonce'] ) || ! wp_verify_nonce( $_POST['sgg_settings_nonce'], GRIM_SG_BASENAME . '-settings' ) ) {
			return;
		}

		if ( ! empty( $_POST['clear_cache'] ) ) {
			Cache::clear();

			add_settings_error(
				self::$slug,
				'sitemap_cache',
				esc_html__( 'Sitemaps Cache cleared.', 'xml-sitemap-generator-for-google' ),
				'success'
			);

			return;
		}

		if ( ! empty( $_POST['clear_youtube_cache'] ) && is_callable( 'SGG_PRO\Classes\Youtube_Cache::delete' ) ) {
			Youtube_Cache::delete();

			add_settings_error(
				self::$slug,
				'youtube_cache',
				esc_html__( 'YouTube Data Cache cleared.', 'xml-sitemap-generator-for-google' ),
				'success'
			);

			return;
		}

		$settings       = new Settings();
		$saved_settings = $this->get_settings();

		if ( ! empty( $_POST['youtube_api_key'] ) && is_callable( 'SGG_PRO\Classes\Video_Sitemap::request_youtube_data' )
			&& ( ! empty( $_POST['youtube_check_api_key'] ) || $saved_settings->youtube_api_key !== $_POST['youtube_api_key'] ) ) {
			$youtube_data = Video_Sitemap::request_youtube_data( 'dQw4w9WgXcQ', sanitize_text_field( $_POST['youtube_api_key'] ) );

			if ( ! empty( $youtube_data ) && is_array( $youtube_data ) ) {
				add_settings_error( self::$slug, 'youtube_api_key_success', esc_html__( 'YouTube API key passed the check successfully.', 'xml-sitemap-generator-for-google' ), 'success' );
			} else {
				add_settings_error( self::$slug, 'youtube_api_key_error', "YouTube API: $youtube_data" );
			}

			if ( ! empty( $_POST['youtube_check_api_key'] ) ) {
				return;
			}
		}

		$settings->sitemap_url         = ( isset( $_POST['sitemap_url'] ) ) ? sanitize_text_field( $_POST['sitemap_url'] ) : $settings->sitemap_url;
		$settings->html_sitemap_url    = ( isset( $_POST['html_sitemap_url'] ) ) ? sanitize_text_field( $_POST['html_sitemap_url'] ) : $settings->html_sitemap_url;
		$settings->enable_html_sitemap = ( isset( $_POST['enable_html_sitemap'] ) ) ? sanitize_text_field( $_POST['enable_html_sitemap'] ) : 0;
		$settings->sitemap_to_robots   = ( isset( $_POST['sitemap_to_robots'] ) ) ? sanitize_text_field( $_POST['sitemap_to_robots'] ) : 0;
		$settings->ping_sitemap        = ( isset( $_POST['ping_sitemap'] ) ) ? sanitize_text_field( $_POST['ping_sitemap'] ) : 0;
		$settings->exclude_posts       = ( isset( $_POST['exclude_posts'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['exclude_posts'] ) : '';
		$settings->posts_priority      = ( isset( $_POST['posts_priority'] ) ) ? sanitize_text_field( $_POST['posts_priority'] ) : '';

		$settings->enable_google_news    = ( isset( $_POST['enable_google_news'] ) ) ? sanitize_text_field( $_POST['enable_google_news'] ) : 0;
		$settings->ping_google_news      = ( isset( $_POST['ping_google_news'] ) ) ? sanitize_text_field( $_POST['ping_google_news'] ) : 0;
		$settings->ping_google_news_post = ( isset( $_POST['ping_google_news_post'] ) ) ? sanitize_text_field( $_POST['ping_google_news_post'] ) : 0;
		$settings->google_news_name      = ( isset( $_POST['google_news_name'] ) ) ? sanitize_text_field( $_POST['google_news_name'] ) : '';
		$settings->google_news_url       = ( isset( $_POST['google_news_url'] ) ) ? sanitize_text_field( $_POST['google_news_url'] ) : $settings->google_news_url;
		$settings->google_news_keywords  = ( isset( $_POST['google_news_keywords'] ) ) ? sanitize_text_field( $_POST['google_news_keywords'] ) : '';
		$settings->google_news_stocks    = ( isset( $_POST['google_news_stocks'] ) ) ? sanitize_text_field( $_POST['google_news_stocks'] ) : 0;
		$settings->google_news_exclude   = ( isset( $_POST['google_news_exclude'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['google_news_exclude'] ) : '';

		$settings->enable_image_sitemap    = ( isset( $_POST['enable_image_sitemap'] ) ) ? sanitize_text_field( $_POST['enable_image_sitemap'] ) : 0;
		$settings->enable_video_sitemap    = ( isset( $_POST['enable_video_sitemap'] ) ) ? sanitize_text_field( $_POST['enable_video_sitemap'] ) : 0;
		$settings->image_sitemap_url       = ( isset( $_POST['image_sitemap_url'] ) ) ? sanitize_text_field( $_POST['image_sitemap_url'] ) : $settings->image_sitemap_url;
		$settings->video_sitemap_url       = ( isset( $_POST['video_sitemap_url'] ) ) ? sanitize_text_field( $_POST['video_sitemap_url'] ) : $settings->video_sitemap_url;
		$settings->image_mime_types        = ( isset( $_POST['image_mime_types'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['image_mime_types'] ) : array();
		$settings->youtube_api_key         = ( isset( $_POST['youtube_api_key'] ) ) ? sanitize_text_field( $_POST['youtube_api_key'] ) : $settings->youtube_api_key;
		$settings->include_featured_images = ( isset( $_POST['include_featured_images'] ) ) ? sanitize_text_field( $_POST['include_featured_images'] ) : 0;
		$settings->include_woo_gallery     = ( isset( $_POST['include_woo_gallery'] ) ) ? sanitize_text_field( $_POST['include_woo_gallery'] ) : 0;

		$settings->enable_cache             = ( isset( $_POST['enable_cache'] ) ) ? sanitize_text_field( $_POST['enable_cache'] ) : 0;
		$settings->cache_timeout            = ( isset( $_POST['cache_timeout'] ) ) ? sanitize_text_field( $_POST['cache_timeout'] ) : $settings->cache_timeout;
		$settings->cache_timeout_period     = ( isset( $_POST['cache_timeout_period'] ) ) ? sanitize_text_field( $_POST['cache_timeout_period'] ) : $settings->cache_timeout_period;
		$settings->clear_cache_on_save_post = ( isset( $_POST['clear_cache_on_save_post'] ) ) ? sanitize_text_field( $_POST['clear_cache_on_save_post'] ) : 0;
		$settings->enable_youtube_cache     = ( isset( $_POST['enable_youtube_cache'] ) ) ? sanitize_text_field( $_POST['enable_youtube_cache'] ) : 0;

		$settings->home          = $settings->get_row_value( 'home' );
		$settings->page          = $settings->get_row_value( 'page' );
		$settings->post          = $settings->get_row_value( 'post' );
		$settings->archive       = $settings->get_row_value( 'archive' );
		$settings->archive_older = $settings->get_row_value( 'archive_older' );
		$settings->authors       = $settings->get_row_value( 'authors' );

		foreach ( $this->get_cpt() as $cpt ) {
			$settings->{$cpt} = $settings->get_row_value( $cpt );
		}

		foreach ( $this->get_taxonomy_types() as $taxonomy_type ) {
			$settings->{$taxonomy_type} = $settings->get_row_value( $taxonomy_type );
		}

		$additional_urls        = ( isset( $_POST['additional_urls'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['additional_urls'] ) : array();
		$additional_priorities  = ( isset( $_POST['additional_priorities'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['additional_priorities'] ) : array();
		$additional_frequencies = ( isset( $_POST['additional_frequencies'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['additional_frequencies'] ) : array();

		foreach ( $additional_urls as $key => $value ) {
			$page = array(
				'url'       => $additional_urls[ $key ],
				'priority'  => $additional_priorities[ $key ],
				'frequency' => $additional_frequencies[ $key ],
			);

			$settings->additional_pages[] = $page;
		}

		update_option( self::$slug, $settings );

		$new_cache_expires = Cache::get_expiration( $settings );
		if ( Cache::get_expiration( $saved_settings ) !== $new_cache_expires ) {
			Cache::maybe_clear( $new_cache_expires );
		}

		add_settings_error(
			self::$slug,
			'sitemap_settings',
			esc_html__( 'Changes saved!', 'xml-sitemap-generator-for-google' ),
			'success'
		);

		flush_rewrite_rules();
	}

	/**
	 * Settings page
	 */
	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		wp_enqueue_style( 'grim-sgg', GRIM_SG_URL . 'assets/css/styles.css', array(), GRIM_SG_VERSION );
		wp_enqueue_script( 'jquery-ui', GRIM_SG_URL . 'assets/js/jquery-ui.min.js', array( 'jquery' ), GRIM_SG_VERSION, true );
		wp_enqueue_script( 'grim-sgg', GRIM_SG_URL . 'assets/js/scripts.js', array( 'jquery' ), GRIM_SG_VERSION, true );

		wp_localize_script(
			'grim-sgg',
			'sgg',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			)
		);

		$this->save_settings();

		self::render(
			'settings.php',
			array(
				'settings'   => $this->get_settings(),
				'cpt'        => $this->get_cpt( 'objects' ),
				'taxonomies' => $this->get_taxonomy_types( 'objects' ),
			)
		);
	}

	/**
	 * Render Sitemap Post Row
	 * @param $title
	 * @param $option
	 * @param $data
	 */
	public static function render_post_row( $title, $option, $data ) {
		self::render(
			'fields/post-row.php',
			array(
				'title'  => $title,
				'option' => $option,
				'data'   => $data,
			)
		);
	}

	/**
	 * Render Priority Selectbox
	 * @param $name
	 * @param $value
	 */
	public static function render_priority_field( $name, $value ) {
		self::render(
			'fields/priority.php',
			array(
				'name'  => $name,
				'value' => $value,
			)
		);
	}

	/**
	 * Render Frequency Selectbox
	 * @param $name
	 * @param $value
	 */
	public static function render_frequency_field( $name, $value ) {
		self::render(
			'fields/frequency.php',
			array(
				'name'  => $name,
				'value' => $value,
			)
		);
	}

	/**
	 * Render Google News Selectbox
	 * @param $title
	 * @param $name
	 * @param $value
	 */
	public static function render_content_field( $title, $name, $value, $class = '' ) {
		self::render(
			'fields/content.php',
			array(
				'title' => $title,
				'name'  => $name,
				'value' => $value,
				'class' => $class,
			)
		);
	}

	/**
	 * Render Template
	 * @param $template_name
	 * @param $args
	 */
	public static function render( $template_name, $args = array() ) {
		load_template( GRIM_SG_PATH . "/templates/{$template_name}", false, $args );
	}

	/**
	 * Setting Link
	 *
	 * @param $links
	 * @return mixed
	 */
	public function plugin_action_links( $links ) {
		$settings_link = sprintf(
			'<a href="%1$s">%2$s</a>',
			admin_url( 'options-general.php?page=' . self::$slug ),
			esc_html__( 'Settings', 'xml-sitemap-generator-for-google' )
		);

		array_unshift( $links, $settings_link );

		if ( sgg_pro_enabled() ) {
			unset( $links['deactivate'] );

			$no_deactivation = sprintf(
				'<span style="color: #2c3338;">Required by %s</span>',
				esc_html__( 'Pro Version', 'xml-sitemap-generator-for-google' )
			);

			array_unshift( $links, $no_deactivation );
		} else {
			$pro_link = sprintf(
				'<a href="%1$s" style="font-weight: 600; color: #00b000;" target="_blank">%2$s</a>',
				sgg_get_pro_url(),
				esc_html__( 'Get Pro', 'xml-sitemap-generator-for-google' )
			);

			$links[] = $pro_link;
		}

		return $links;
	}

	/**
	 * Meta Links
	 *
	 * @param $links
	 * @return mixed
	 */
	public function plugin_meta_links( $links, $file ) {
		if ( GRIM_SG_BASENAME === $file ) {
			$links[] = '<a href="https://wordpress.org/support/plugin/xml-sitemap-generator-for-google/" target="_blank">' . __( 'Support', 'xml-sitemap-generator-for-google' ) . '</a>';
			$links[] = '<a href="https://wordpress.org/support/plugin/xml-sitemap-generator-for-google/reviews/?filter=5#new-post" target="_blank">' . __( 'Rate ★★★★★', 'xml-sitemap-generator-for-google' ) . '</a>';
		}

		return $links;
	}
}
