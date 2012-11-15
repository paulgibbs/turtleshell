<?php
/**
 * The "turtleshell" template pack for BuddyPress.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 * @since BuddyPress (1.7)
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Temporary: add a version number to footer so people can find out what release they're using
function turtlepower_version_number() {
	echo "\n\n<!-- turtleshell: alpha 1 -->\n\n";
}
add_action( 'wp_footer', 'turtlepower_version_number' );

if ( ! class_exists( 'BP_TurtleShell' ) ) :

/**
 * Loads the BuddyPress "turtleshell" template pack
 *
 * This is not a real theme by WordPress standards, and is instead used as the
 * fallback for any WordPress theme that does not have BuddyPress templates in it.
 *
 * To make your custom theme BuddyPress compatible and customize the templates, you
 * can copy these files into your theme without needing to merge anything
 * together; BuddyPress should safely handle the rest.
 *
 * See @link BP_Theme_Compat() for more.
 *
 * @since BuddyPress (1.7)
 */
class BP_TurtleShell extends BP_Theme_Compat {

	/**
	 * Constructor
	 *
	 * @since BuddyPress (1.7)
	 */
	public function __construct() {
		// Bail if parent/child themes are bp-default
		if ( in_array( 'bp-default', array( get_template(), get_stylesheet() ) ) )
			return;

		$this->setup_globals();
		$this->setup_actions();
	}

	/**
	 * Component global variables
	 *
	 * Note that this function is currently commented out in the constructor.
	 * It will only be used if you copy this file into your current theme and
	 * uncomment the line above.
	 *
	 * You'll want to customize the values in here, so they match whatever your
	 * needs are.
	 *
	 * @since BuddyPress (1.7)
	 */
	private function setup_globals() {
		$bp            = buddypress();
		$this->id      = 'turtleshell';
		$this->name    = __( 'BuddyPress Turtle Shell', 'buddypress' );
		$this->version = bp_get_version();
		$this->dir     = trailingslashit( $bp->themes_dir . '/turtleshell' );
		$this->url     = trailingslashit( $bp->themes_url . '/turtleshell' );
	}

	/**
	 * Hooks into required actions and filters to set up the template pack
	 *
	 * @since BuddyPress (1.7)
	 */
	private function setup_actions() {
		add_action( 'bp_enqueue_scripts',    array( $this, 'enqueue_styles'         ) ); // Enqueue theme CSS
		add_action( 'bp_enqueue_scripts',    array( $this, 'enqueue_scripts'        ) ); // Enqueue theme JS
		add_action( 'widgets_init',          array( $this, 'widgets_init'           ) ); // Widgets          
		add_filter( 'bp_get_the_body_class', array( $this, 'add_nojs_body_class'    ) ); // JS helper
		add_action( 'bp_before_header',      array( $this, 'remove_nojs_body_class' ) ); // JS helper

		// Run an action for for third-party plugins to affect the template pack
		do_action_ref_array( 'bp_theme_compat_actions', array( &$this ) );
	}

	/**
	 * Enqueue template pack CSS
	 *
	 * @since BuddyPress (1.7)
	 */
	public function enqueue_styles() {
		// LTR or RTL
		$file = is_rtl() ? 'css/buddypress-rtl.css' : 'css/buddypress.css';

		// Check child theme
		if ( file_exists( trailingslashit( get_stylesheet_directory() ) . $file ) ) {
			$location = trailingslashit( get_stylesheet_directory_uri() );
			$handle   = 'bp-child-css';

		// Check parent theme
		} elseif ( file_exists( trailingslashit( get_template_directory() ) . $file ) ) {
			$location = trailingslashit( get_template_directory_uri() );
			$handle   = 'bp-parent-css';

		// BuddyPress Theme Compatibility
		} else {
			$location = trailingslashit( $this->url );
			$handle   = 'bp-turtleshell-css';
		}

		wp_enqueue_style( $handle, $location . $file, array(), $this->version, 'screen' );
	}

	/**
	 * Enqueue template pack javascript
	 *
	 * @since BuddyPress (1.7)
	 */
	public function enqueue_scripts() {
		// LTR or RTL
		$file = 'js/buddypress.js';

		// Check child theme
		if ( file_exists( trailingslashit( get_stylesheet_directory() ) . $file ) ) {
			$location = trailingslashit( get_stylesheet_directory_uri() );
			$handle   = 'bp-child-js';

		// Check parent theme
		} elseif ( file_exists( trailingslashit( get_template_directory() ) . $file ) ) {
			$location = trailingslashit( get_template_directory_uri() );
			$handle   = 'bp-parent-js';

		// BuddyPress Theme Compatibility
		} else {
			$location = trailingslashit( $this->url );
			$handle   = 'bp-turtleshell-js';
		}

		wp_enqueue_script( $handle, $location . $file, array( 'jquery', 'hoverIntent', ), $this->version );
	}

	/**
	 * Registers widget areas
	 *
	 * @since BuddyPress (1.7)
	 */
	public function widgets_init() {
		register_sidebar( array(
			'description' => __( 'Appears on member profiles pages', 'buddypress' ),
			'id'          => 'bp-member-profile-widgets',
			'name'        => __( '(BuddyPress) Member Profile', 'buddypress' ),
		) );
	}


	/**
	 * Adds the no-js class to the body tag.
	 *
	 * This function ensures that the <body> element will have the 'no-js' class by default. If you're
	 * using JavaScript for some visual functionality in your theme, and you want to provide noscript
	 * support, apply those styles to body.no-js.
	 *
	 * The no-js class is removed by the JavaScript created in {@link BP_TurtleShell::remove_nojs_body_class()}.
	 *
	 * @since BuddyPress (1.7)
	 */
	public function add_nojs_body_class( $classes ) {
		$classes[] = 'no-js';
		return array_unique( $classes );
	}

	/**
	 * Dynamically removes the no-js class from the <body> element.
	 *
	 * By default, the no-js class is added to the body (see {@link BP_TurtleShell::add_nojs_body_class()}). The
	 * JavaScript in this function is loaded into the <body> element immediately after the <body> tag
	 * (note that it's hooked to bp_before_header), and uses JavaScript to switch the 'no-js' body class
	 * to 'js'. If your theme has styles that should only apply for JavaScript-enabled users, apply them
	 * to body.js.
	 *
	 * This technique is borrowed from WordPress, wp-admin/admin-header.php.
	 *
	 * @since BuddyPress (1.7)
	 */
	public function remove_nojs_body_class() {
	?>
		<script type="text/javascript">
		//<![CDATA[
		(function(){var c=document.body.className;c=c.replace(/no-js/,'js');document.body.className=c;})();
		//]]>
		</script>
	<?php
	}
}
new BP_TurtleShell();
endif;


/**
 * Output the parent activity's user ID
 *
 * @since BuddyPress (1.7)
 */
function bp_activity_parent_user_id() {
	echo bp_get_activity_parent_user_id();
}

	/**
	 * Return the parent activity's user ID
	 *
	 * @global object $activities_template {@link BP_Activity_Template}
	 * @return bool|int False if parent activity can't be found, otherwise returns the parent activity's user ID
	 * @since BuddyPress (1.7)
	 */
	function bp_get_activity_parent_user_id() {
		global $activities_template;

		$retval = false;

		// Get the user ID of the parent activity
		$parent_id = $activities_template->activity->item_id;
		if ( $parent_id && ! empty( $activities_template->activity_parents[$parent_id] ) )
			$retval = $activities_template->activity_parents[$parent_id]->user_id;

		return apply_filters( 'bp_get_activity_parent_user_id', $retval );
	}
