<?php
/**
 * @var $args
 */

use GRIM_SG\Dashboard;

$settings = $args['settings'] ?? new stdClass();
?>
<div class="postbox">
	<h3 class="hndle"><?php esc_html_e( 'Google News URL', 'xml-sitemap-generator-for-google' ); ?></h3>
	<div class="inside">
		<p class="google-news-depended"><?php esc_html_e( 'Here you can preview your Google News and customize Output URL.', 'xml-sitemap-generator-for-google' ); ?></p>
		<p>
			<?php
			Dashboard::render(
				'fields/input.php',
				array(
					'name'  => 'google_news_url',
					'value' => $settings->google_news_url,
					'label' => esc_html__( 'Google News URL:', 'xml-sitemap-generator-for-google' ),
					'class' => 'google-news-depended',
				)
			);
			?>
		</p>
		<p class="google-news-depended">
			<?php esc_html_e( 'Preview your Google News:', 'xml-sitemap-generator-for-google' ); ?>
			<a href="<?php echo esc_url( get_home_url( null, $settings->google_news_url ) ); ?>" target="_blank"><?php echo esc_url( get_home_url() . '/' . $settings->google_news_url ); ?></a>
		</p>
	</div>
</div>
