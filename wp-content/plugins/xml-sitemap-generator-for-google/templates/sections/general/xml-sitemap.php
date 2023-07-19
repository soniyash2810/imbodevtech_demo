<?php
/**
 * @var $args
 */

use GRIM_SG\Dashboard;

$settings = $args['settings'] ?? new stdClass();
?>
<div class="postbox">
	<h3 class="hndle"><?php esc_html_e( 'XML Sitemap', 'xml-sitemap-generator-for-google' ); ?></h3>
	<div class="inside">
		<p><?php esc_html_e( 'Here you can preview your XML Sitemap and customize Output URL.', 'xml-sitemap-generator-for-google' ); ?></p>
		<p>
			<?php
			Dashboard::render(
				'fields/input.php',
				array(
					'name'  => 'sitemap_url',
					'value' => $settings->sitemap_url,
					'label' => esc_html__( 'XML Sitemap URL:', 'xml-sitemap-generator-for-google' ),
				)
			);
			?>
		</p>
		<p>
			<?php esc_html_e( 'Preview your XML Sitemap:', 'xml-sitemap-generator-for-google' ); ?>
			<a href="<?php echo esc_url( get_home_url( null, $settings->sitemap_url ) ); ?>" target="_blank"><?php echo esc_url( get_home_url() . '/' . $settings->sitemap_url ); ?></a>
		</p>
	</div>
</div>
