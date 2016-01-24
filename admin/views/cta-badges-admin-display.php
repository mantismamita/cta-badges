<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.kirstencassidy.com
 * @since      1.0.0
 *
 * @package    Cta_Badges
 * @subpackage Cta_Badges/admin/partials
 */
?>

<h2><?php esc_attr_e( 'CTA Badges page', 'wp_admin_style' ); ?></h2>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><?php esc_attr_e( 'Heading String', 'wp_admin_style' ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e( 'CTA Badges', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">
							<p class="hide-if-no-js">
								<a title="Set CTA Badge Image" href="javascript:;" id="set-cta-badge">Set featured image</a>
							</p>

							<div id="cta-badge-image-container" class="hidden">
								<img src="<?php echo get_post_meta( $post->ID, 'cta-badge-src', true ); ?>" alt="<?php echo get_post_meta( $post->ID, 'cta-badge-alt', true ); ?>" title="<?php echo get_post_meta( $post->ID, 'cta-badge-title', true ); ?>" />

							</div><!-- #cta-badge-image-container -->

							<p class="hide-if-no-js hidden">
								<a title="Remove Footer Image" href="javascript:;" id="remove-cta-badge">Remove featured image</a>
							</p><!-- .hide-if-no-js -->

							<p id="cta-badge-image-info">
								<input type="hidden" id="cta-badge-src" name="cta-badge-src" value="<?php echo get_post_meta( $post->ID, 'cta-badge-src', true ); ?>" />
								<input type="hidden" id="cta-badge-title" name="cta-badge-title" value="<?php echo get_post_meta( $post->ID, 'cta-badge-title', true ); ?>" />
								<input type="hidden" id="cta-badge-alt" name="cta-badge-alt" value="<?php echo get_post_meta( $post->ID, 'cta-badge-alt', true ); ?>" />
							</p><!-- #cta-badge-image-meta -->
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e(
									'Description', 'wp_admin_style'
								); ?></span></h2>

						<div class="inside">
							<p><?php esc_attr_e( 'These badges are displayed on the home page.', 'wp_admin_style' ); ?></p>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->


