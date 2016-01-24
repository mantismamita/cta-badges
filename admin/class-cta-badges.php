<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, the meta box functionality
 * and the JavaScript for loading the Media Uploader.
 *
 * @package    CTA_Badges
 * @subpackage CTA_Badges/admin
 * @author     Kirsten Cassidy <mantismamita@gmail.com>
 */
class CTA_Badges {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $name    The ID of this plugin.
	 */
	private $name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The version of the plugin
	 */
	private $version;

	/**
	 * Initializes the plugin by defining the properties.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {

		$this->name = 'cta-badges';
		$this->version = '1.0.0';

	}

	/**
	 * Defines the hooks that will register and enqueue the JavaScriot
	 * and the meta box that will render the option.
	 *
	 * @since 0.1.0
	 */
	public function run() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
		add_action( 'hostel_mama_after_logo', array( $this, 'cta_content' ) );
		add_action('admin_menu', array($this,'add_plugin_admin_menu'));


	}

	/**
	 * Renders the meta box on the post and pages.
	 *
	 * @since 0.1.0
	 */
	public function add_meta_box() {
		global $post;
		$screens = array( 'page' );
		if ($post->ID == '702' || $post->ID == '138') {
			foreach ( $screens as $screen ) {

				add_meta_box(
					$this->name,
					'CTA Badge Image',
					array( $this, 'display_cta_badge' ),
					$screen,
					'side'
				);
			}
		}
	}

	public function validate($input) {
		// All checkboxes inputs
		$valid = array();

		//Cleanup
		$valid['image'] = (isset($input['cleanup']) && !empty($input['image'])) ? 1 : 0;

		return $valid;
	}

	public function options_update() {
		register_setting($this->name, $this->name , array($this, 'validate'));
	}

	/**
	 * Registers the JavaScript for handling the media uploader.
	 *
	 * @since 0.1.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_media();

		wp_enqueue_script(
			$this->name,
			plugin_dir_url( __FILE__ ) . 'js/admin.js',
			array( 'jquery' ),
			$this->version,
			'all'
		);

	}

	/**
	 * Registers the stylesheets for handling the meta box
	 *
	 * @since 0.2.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			$this->name,
			plugin_dir_url( __FILE__ ) . 'css/admin.css',
			array()
		);

	}

	public function add_plugin_admin_menu() {

		add_options_page( 'CTA Badges Setup', 'CTA Badges', 'manage_options', $this->name, array($this, 'display_plugin_setup_page')
		);
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {

		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->name ) . '">' . __('Settings', $this->name) . '</a>',
		);
		return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_setup_page() {
		include_once( 'views/cta-badges-admin-display.php' );
	}

	/**
	 * Sanitized and saves the post featured footer image meta data specific with this post.
	 *
	 * @param    int    $post_id    The ID of the post with which we're currently working.
	 * @since    1.0.0
	 */
	public function save_post( $post_id ) {

		if ( isset( $_REQUEST['cta-badge-src'] ) ) {
			update_post_meta( $post_id, 'cta-badge-src', sanitize_text_field( $_REQUEST['cta-badge-src'] ) );
		}

		if ( isset( $_REQUEST['cta-badge-title'] ) ) {
			update_post_meta( $post_id, 'cta-badge-title', sanitize_text_field( $_REQUEST['cta-badge-title'] ) );
		}

		if ( isset( $_REQUEST['cta-badge-alt'] ) ) {
			update_post_meta( $post_id, 'cta-badge-alt', sanitize_text_field( $_REQUEST['cta-badge-alt'] ) );
		}

	}

	/**
	 * If the current post is a single post, check to see if there is a featured image.
	 * If so, append is to the post content prior to rendering the post.
	 *
	 * @param   string    $content    The content of the post.
	 * @since   1.0.0
	 */
	public function cta_content() {

		// We only care about appending the image to single pages
		if ( is_front_page() ) {

			// In order to append an image, there has to be at least a source attribute
			if ( '' !== ( $src = get_post_meta( get_the_ID(), 'cta-badge-src', true ) ) ) {

				// read the remaining attributes even if they are empty strings
				$alt = get_post_meta( get_the_ID(), 'cta-badge-alt', true );
				$title = get_post_meta( get_the_ID(), 'cta-badge-title', true );

				// create the image element within its own container
				$img_html = '<div id="cta-badge">';
				$img_html .= '<a href="javascript:;" data-reveal-id="groupModal">';
				$img_html .= "<img src='$src' alt='$alt' title='$title' />";
				$img_html .= '</a>';
				$img_html .= '</div><!-- #cta-badge -->';

			}
			echo $img_html;
		}

	}



	/**
	 * Renders the view that displays the contents for the meta box that for triggering
	 * the meta box.
	 *
	 * @param    WP_Post    $post    The post object
	 * @since    0.1.0
	 */
	public function display_cta_badge( $post ) {
		include_once( dirname( __FILE__ ) . '/views/admin.php' );
	}

}
