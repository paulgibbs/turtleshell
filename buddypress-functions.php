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
		add_action( 'bp_enqueue_scripts', array( $this, 'enqueue_styles'   ) ); // Enqueue theme CSS
		add_action( 'bp_enqueue_scripts', array( $this, 'enqueue_scripts'  ) ); // Enqueue theme JS

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

		wp_enqueue_script( $handle, $location . $file, array( 'jquery' ), $this->version );
	}
}
new BP_TurtleShell();
endif;

/**
 * Output the activity action
 *
 * @since BuddyPress (1.2)
 *
 * @param arrays $args See bp_get_activity_action()
 * @uses bp_get_activity_action()
 */
function ts_bp_activity_action( $args = array() ) {
	echo ts_bp_get_activity_action( $args );
}

	/**
	 * Return the activity action
	 *
	 * @since BuddyPress (1.2)
	 *
	 * @global object $activities_template {@link BP_Activity_Template}
	 * @param arrays $args Only parameter is "no_timestamp". If true, timestamp is shown in output.
	 * @uses apply_filters_ref_array() To call the 'bp_get_activity_action_pre_meta' hook
	 * @uses bp_insert_activity_meta()
	 * @uses apply_filters_ref_array() To call the 'bp_get_activity_action' hook
	 *
	 * @return string The activity action
	 */
	function ts_bp_get_activity_action( $args = array() ) {
		global $activities_template;

		$defaults = array(
			'no_timestamp' => false,
		);

		$r = wp_parse_args( $args, $defaults );
		extract( $r, EXTR_SKIP );

		$action = $activities_template->activity->action;
		$action = apply_filters_ref_array( 'bp_get_activity_action_pre_meta', array( $action, &$activities_template->activity ) );

		if ( !empty( $action ) && ! $no_timestamp )
			$action = bp_insert_activity_meta( $action );

		return apply_filters_ref_array( 'bp_get_activity_action', array( $action, &$activities_template->activity ) );
	}


function ts_bp_member_menu() {
	foreach ( (array) buddypress()->bp_nav as $nav_item ) {
		if ( empty( $nav_item['show_for_displayed_user'] ) && ! bp_is_my_profile() )
			continue;

		$class   = array();
		$class[] = 'member-menu-' . esc_attr( $nav_item['slug'] );

		if ( bp_is_current_component( $nav_item['slug'] ) )
			$class[] = 'selected';

		$class = implode( ' ', $class );
		$link  = esc_url( trailingslashit( $nav_item['link'] ) );

		printf( '<li class="%1$s"><a href="%2$s">%3$s</a></li>', $class, esc_attr( $link ), $nav_item['name'] );
	}
}
