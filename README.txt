=== CTA Badges ===
Contributors: mantismamita, tommcfarlin
Donate link: http://kirstencassidy.com/
Tags: images
Requires at least: 3.9.2
Tested up to: 4.0.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add markup for a CTA (call to action) Image

== Description ==

Adds markup containing an image from the media library to a custom hook (within the theme)
Stage one using hard-coded ids from theme and meta box on specific page
will eventually use settings page.

== Installation ==

1. Upload the `cta-badges` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('hostel_mama_after_logo'); ?>` or `<?php do_action('cta_badges'); ?>` in your templates

== Changelog ==

= 1.0.0 =
* Completed all functionality for first stage of the plugin (uses hardcoded ids specific to site for now)

= 0.2.0 =
* Introduced functionality for adding an image
* Introduced functionality for resetting the meta box

= 0.1.0 =
* Initial release