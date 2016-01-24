<p class="hide-if-no-js">
	<a title="Set CTA Badge Image" href="javascript:;" id="set-cta-badge">Set cta badge image</a>
</p>

<div id="cta-badge-container" class="hidden">
	<img src="<?php echo get_post_meta( $post->ID, 'cta-badge-src', true ); ?>" alt="<?php echo get_post_meta( $post->ID, 'cta-badge-alt', true ); ?>" title="<?php echo get_post_meta( $post->ID, 'cta-badge-title', true ); ?>" />
</div><!-- #featured-cta-badge-container -->

<p class="hide-if-no-js hidden">
	<a title="Remove CTA Badge Image" href="javascript:;" id="remove-cta-badge">Remove cta badge image</a>
</p><!-- .hide-if-no-js -->

<p id="cta-badge-info">
	<input type="hidden" id="cta-badge-src" name="cta-badge-src" value="<?php echo get_post_meta( $post->ID, 'cta-badge-src', true ); ?>" />
	<input type="hidden" id="cta-badge-title" name="cta-badge-title" value="<?php echo get_post_meta( $post->ID, 'cta-badge-title', true ); ?>" />
	<input type="hidden" id="cta-badge-alt" name="cta-badge-alt" value="<?php echo get_post_meta( $post->ID, 'cta-badge-alt', true ); ?>" />
</p><!-- #featured-cta-badge-meta -->