<?php
/**
 * @var $args
 */

use GRIM_SG\Dashboard;
use GRIM_SG\PTSettings;

$settings = $args['settings'] ?? new stdClass();
?>
<div class="postbox">
	<h3 class="hndle"><?php esc_html_e( 'Additional URLs', 'xml-sitemap-generator-for-google' ); ?></h3>
	<div class="inside">
		<p><?php esc_html_e( 'External URLs which should be included in your Sitemap:', 'xml-sitemap-generator-for-google' ); ?></p>
		<table class="wp-list-table widefat striped additional_urls" cellpadding="3" cellspacing="3">
			<thead>
			<tr>
				<th scope="col"><?php esc_html_e( 'URL to External Page', 'xml-sitemap-generator-for-google' ); ?></th>
				<th scope="col"><?php esc_html_e( 'Priority', 'xml-sitemap-generator-for-google' ); ?></th>
				<th scope="col"><?php esc_html_e( 'Update Frequency', 'xml-sitemap-generator-for-google' ); ?></th>
				<th scope="col">#</th>
			</tr>
			</thead>
			<tbody id="additional_urls">
			<?php if ( count( $settings->additional_pages ) === 0 ) { ?>
				<tr class="no_urls">
					<td colspan="4" align="center"><?php esc_html_e( 'No URLs added yet!', 'xml-sitemap-generator-for-google' ); ?></td>
				</tr>
				<?php
			} else {
				foreach ( $settings->additional_pages as $page ) {
					?>
					<tr>
						<td><input type="text" name="additional_urls[]" value="<?php echo esc_attr( $page['url'] ); ?>"></td>
						<td><?php Dashboard::render_priority_field( 'additional_priorities[]', $page['priority'] ); ?></td>
						<td><?php Dashboard::render_frequency_field( 'additional_frequencies[]', $page['frequency'] ); ?></td>
						<td><a href="#" class="remove_url">x</a></td>
					</tr>
					<?php
				}
			}
			?>
			</tbody>
		</table>
		<br>
		<a href="#" id="add_new_url" class="button button-default"><?php esc_html_e( 'Add New URL', 'xml-sitemap-generator-for-google' ); ?></a>
	</div>
</div>
<div class="hidden-area">
	<div id="additional_priorities_selector">
		<?php Dashboard::render_priority_field( 'additional_priorities[]', 3 ); ?>
	</div>
	<div id="additional_frequencies_selector">
		<?php Dashboard::render_frequency_field( 'additional_frequencies[]', PTSettings::$WEEKLY ); ?>
	</div>
</div>