<?php

namespace GRIM_SG;

class GoogleNews extends Sitemap {
	private $blog_language = null;

	/**
	 * Add URLS Callback function
	 */
	public function urlsCallback() {
		return 'addNewsUrl';
	}

	/**
	 * Adding Google News Sitemap Headers
	 */
	public function extraSitemapHeader() {
		return ' xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"';
	}

	/**
	 * Collect Sitemap URLs
	 */
	public function collect_urls() {
		$this->add_posts();

		if ( sgg_pro_enabled() ) {
			$this->add_categories();
		}
	}

	/**
	 * Add all Posts to Sitemap
	 */
	public function add_posts() {
		$post_types = ( isset( $this->settings->post->google_news ) && ! $this->settings->post->google_news )
			? array()
			: array( 'post' );
		$exclude_posts     = json_decode( stripslashes( $this->settings->google_news_exclude ?? '' ) );

		if ( sgg_pro_enabled() ) {
			foreach ( $this->get_cpt() as $cpt ) {
				if ( ! empty( $this->settings->{$cpt} ) && ! empty( $this->settings->{$cpt}->google_news ) ) {
					$post_types[] = $cpt;
				}
			}
		}

		$args = array(
			'post_type'      => $post_types,
			'post_status'    => 'publish',
			'has_password'   => false,
			'orderby'        => 'post_modified',
			'order'          => 'DESC',
			'posts_per_page' => -1,
		);

		$posts = new \WP_Query( $args );

		foreach ( $posts->posts as $post ) {
			if ( apply_filters( 'sgg_exclude_google_news_post', true, $post->ID, $exclude_posts ) ) {
				$this->add_url(
					get_permalink( $post ),
					$post->ID,
					$post->post_title,
					get_date_from_gmt( $post->post_date_gmt, DATE_W3C ),
					$post->post_type
				);
			}
		}
	}

	/**
	 * Add all Categories & Tags
	 */
	public function add_categories() {
		$taxonomy_types = array();

		foreach ( $this->get_taxonomy_types() as $taxonomy_type ) {
			if ( ! empty( $this->settings->{$taxonomy_type} ) ) {
				if ( $this->settings->{$taxonomy_type}->google_news ) {
					$taxonomy_types[] = $taxonomy_type;
				}
			} else {
				if ( $this->settings->category->google_news ) {
					$taxonomy_types[] = $taxonomy_type;
				}
			}
		}

		if ( ! empty( $taxonomy_types ) ) {
			$args = array(
				'taxonomy'   => $taxonomy_types,
				'hide_empty' => false,
				'number'     => false,
				'fields'     => 'all',
			);

			$terms = get_terms( $args );

			foreach ( $terms as $term ) {
				if ( is_callable( '\WPSEO_Taxonomy_Meta::get_term_meta' ) ) {
					$noindex = \WPSEO_Taxonomy_Meta::get_term_meta( $term->term_id, $term->taxonomy, 'noindex' );
					if ( 'noindex' === $noindex ) {
						continue;
					}
				}

				$args = array(
					'post_type'      => 'any',
					'posts_per_page' => 1,
					'orderby'        => 'date',
					'order'          => 'DESC',
					'tax_query'      => array(
						array(
							'taxonomy' => $term->taxonomy,
							'field'    => 'id',
							'terms'    => array( $term->term_id ),
						),
					),
				);

				$latest_posts = new \WP_Query( $args );
				$latest_post  = $latest_posts->posts;

				if ( ! empty( $latest_post[0] ) ) {
					$this->add_url(
						get_category_link( $term ),
						$term->term_id,
						$term->name,
						get_post_modified_time( 'c', false, $latest_post[0] )
					);
				}
			}
		}
	}

	/**
	 * Add Google News Sitemap Url
	 *
	 * @param string $url
	 * @param int $id
	 * @param string $title
	 * @param string $last_modified
	 * @param string $post_type
	 */
	public function add_url( $url, $id, $title, $last_modified = '', $post_type = 'post' ) {
		$this->urls[] = array(
			$url, // URL
			! empty( $settings->google_news_name ) ? $settings->google_news_name : get_bloginfo( 'name' ), // Publication Name
			apply_filters( 'sgg_news_language', $this->get_blog_language(), $id, $post_type ), // Publication Language
			$title, // Title
			$last_modified, // Last Modified
			$id, // ID
		);
	}

	/**
	 * Get Blog Language
	 */
	public function get_blog_language() {
		if ( null === $this->blog_language ) {
			$this->blog_language = sgg_parse_language( get_bloginfo( 'language' ) );
		}

		return $this->blog_language;
	}
}
