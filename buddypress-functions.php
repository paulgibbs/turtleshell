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

		wp_enqueue_script( $handle, $location . $file, array( 'jquery', 'hoverIntent', ), $this->version );
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






/**
 * Sort BuddyPress nav menu items by their position property.
 *
 * This is an internal convenience function and it will probably be removed in a later release. Do not use.
 *
 * @access private
 * @param array $a First item
 * @param array $b Second item
 * @return int Returns an integer less than, equal to, or greater than zero if the first argument is considered to be respectively less than, equal to, or greater than the second.
 * @since BuddyPress (1.7)
 */
function _bp_nav_menu_sort( $a, $b ) {
	if ( $a["position"] == $b["position"] )
		return 0;

	else if ( $a["position"] < $b["position"] )
		return -1;

	else
		return 1;
}

/**
 * Get an array of all the items registered in the primary and secondary BuddyPress navigation menus
 *
 * @return array
 * @since BuddyPress (1.7)
 */
function bp_get_nav_menu_items() {
	$menus = $selected_menus = array();

	// Get the second level menus
	foreach ( (array) buddypress()->bp_options_nav as $parent_menu => $sub_menus ) {

		// The root menu's ID is "xprofile", but the Profile submenus are using "profile". See BP_Core::setup_nav().
		if ( 'profile' == $parent_menu )
			$parent_menu = 'xprofile';

		// Sort the items in this menu's navigation by their position property
		$second_level_menus = (array) $sub_menus;
		usort( $second_level_menus, '_bp_nav_menu_sort' );

		// Iterate through the second level menus
		foreach( $second_level_menus as $sub_nav ) {

			// Skip items we don't have access to
			if ( ! $sub_nav['user_has_access'] )
				continue;

			// Add this menu
			$menu         = new stdClass;
			$menu->class  = array();
			$menu->css_id = $sub_nav['css_id'];
			$menu->link   = $sub_nav['link'];
			$menu->name   = $sub_nav['name'];
			$menu->parent = $parent_menu;  // Associate this sub nav with a top-level menu

			// If we're viewing this item's screen, record that we need to mark its parent menu to be selected
			if ( $sub_nav['slug'] == bp_current_action() ) {
				$menu->class      = array( 'current-menu-item' );
				$selected_menus[] = $parent_menu;
			}

			$menus[] = $menu;
		}
	}

	// Get the top-level menu parts (Friends, Groups, etc) and sort by their position property
	$top_level_menus = (array) buddypress()->bp_nav;
	usort( $top_level_menus, '_bp_nav_menu_sort' );

	// Iterate through the top-level menus
	foreach ( $top_level_menus as $nav ) {

		// Skip items marked as user-specific if you're not on your own profile
		if ( ! $nav['show_for_displayed_user'] && ! bp_is_my_profile() )
			continue;

		// Get the correct menu link. See http://buddypress.trac.wordpress.org/ticket/4624
		$link = bp_loggedin_user_domain() ? str_replace( bp_loggedin_user_domain(), bp_displayed_user_domain(), $nav['link'] ) : trailingslashit( bp_displayed_user_domain() . $nav['link'] );

		// Add this menu
		$menu         = new stdClass;
		$menu->class  = array();
		$menu->css_id = $nav['css_id'];
		$menu->link   = $link;
		$menu->name   = $nav['name'];
		$menu->parent = 0;

		// Check if we need to mark this menu as selected
		if ( in_array( $nav['css_id'], $selected_menus ) )
			$menu->class = array( 'current-menu-parent' );

		$menus[] = $menu;
	}

	return apply_filters( 'bp_get_nav_menu_items', $menus );
}


/**
 * Displays a navigation menu.
 *
 * @param string|array $args Optional arguments:
 *  before - Text before the link text.
 *  container - Whether to wrap the ul, and what to wrap it with. Defaults to div.
 *  container_class - The class that is applied to the container. Defaults to 'menu-bp-container'.
 *  container_id - The ID that is applied to the container. Defaults to blank.
 *  depth - How many levels of the hierarchy are to be included. 0 means all. Defaults to 0.
 *  echo - Whether to echo the menu or return it. Defaults to echo.
 *  fallback_cb - If the menu doesn't exists, a callback function will fire. Defaults to false (no fallback).
 *  items_wrap - How the list items should be wrapped. Defaults to a ul with an id and class. Uses printf() format with numbered placeholders.
 *  link_after - Text after the link.
 *  link_before - Text before the link.
 *  menu_class - CSS class to use for the ul element which forms the menu. Defaults to 'menu'.
 *  menu_id - The ID that is applied to the ul element which forms the menu. Defaults to 'menu-bp', incremented.
 *  walker - Allows a custom walker to be specified. Defaults to 'BP_Walker_Nav_Menu'.
 * @since BuddyPress (1.7)
 */
function bp_nav_menu( $args = array() ) {
	static $menu_id_slugs = array();

	$defaults = array(
		'after'           => '',
		'before'          => '',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => '',
		'depth'           => 0,
		'echo'            => true,
		'fallback_cb'     => false,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'link_after'      => '',
		'link_before'     => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'walker'          => '',
	);
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'bp_nav_menu_args', $args );
	$args = (object) $args;

	$items = $nav_menu = '';
	$show_container = false;

	// Create custom walker if one wasn't set
	if ( empty( $args->walker ) )
		$args->walker = new BP_Walker_Nav_Menu;

	// Sanitise values for class and ID
	$args->container_class = sanitize_html_class( $args->container_class );
	$args->container_id    = sanitize_html_class( $args->container_id );

	// Whether to wrap the ul, and what to wrap it with
	if ( $args->container ) {
		$allowed_tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav', ) );

		if ( in_array( $args->container, $allowed_tags ) ) {
			$show_container = true;

			$class     = $args->container_class ? ' class="' . esc_attr( $args->container_class ) . '"' : ' class="menu-bp-container"';
			$id        = $args->container_id    ? ' id="' . esc_attr( $args->container_id ) . '"'       : '';
			$nav_menu .= '<' . $args->container . $id . $class . '>';
		}
	}

	// Get the BuddyPress menu items
	$menu_items = apply_filters( 'bp_nav_menu_objects', bp_get_nav_menu_items(), $args );
	$items      = walk_nav_menu_tree( $menu_items, $args->depth, $args );
	unset( $menu_items );

	// Set the ID that is applied to the ul element which forms the menu.
	if ( ! empty( $args->menu_id ) ) {
		$wrap_id = $args->menu_id;

	} else {
		$wrap_id = 'menu-bp';

		// If a specific ID wasn't requested, and there are multiple menus on the same screen, make sure the autogenerated ID is unique
		while ( in_array( $wrap_id, $menu_id_slugs ) ) {
			if ( preg_match( '#-(\d+)$#', $wrap_id, $matches ) )
				$wrap_id = preg_replace('#-(\d+)$#', '-' . ++$matches[1], $wrap_id );
			else
				$wrap_id = $wrap_id . '-1';
		}
	}
	$menu_id_slugs[] = $wrap_id;

	// Allow plugins to hook into the menu to add their own <li>'s
	$items = apply_filters( 'bp_nav_menu_items', $items, $args );

	// Build the output
	$wrap_class  = $args->menu_class ? $args->menu_class : '';
	$nav_menu   .= sprintf( $args->items_wrap, esc_attr( $wrap_id ), esc_attr( $wrap_class ), $items );
	unset( $items );

	// If we've wrapped the ul, close it
	if ( $show_container )
		$nav_menu .= '</' . $args->container . '>';

	// Final chance to modify output
	$nav_menu = apply_filters( 'bp_nav_menu', $nav_menu, $args );

	if ( $args->echo )
		echo $nav_menu;
	else
		return $nav_menu;
}

/**
 * Create HTML list of BP nav items
 *
 * @since BuddyPress (1.7)
 */
class BP_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * @since BuddyPress (1.7)
	 * @var array
	 */
	var $db_fields = array( 'id' => 'css_id', 'parent' => 'parent' );

	/**
	 * @since BuddyPress (1.7)
	 * @var string
	 */
	var $tree_type = array();

	/**
	 * Display array of elements hierarchically.
	 *
	 * This method is almost identical to the version in {@link Walker::walk()}. The only change is on one line
	 * which has been commented. An IF was comparing 0 to a non-empty string which was preventing child elements
	 * being grouped under their parent menu element.
	 *
	 * This caused a problem for BuddyPress because our primary/secondary navigations doesn't have a unique numerical
	 * ID that describes a hierarchy (we use a slug). Obviously, WordPress Menus use Posts, and those have ID/post_parent.
	 *
	 * @param array $elements
	 * @param int $max_depth
	 * @return string
	 * @see Walker::walk()
	 * @since BuddyPress (1.7)
	 */
	function walk( $elements, $max_depth ) {
		$args   = array_slice( func_get_args(), 2 );
		$output = '';

		if ( $max_depth < -1 ) // invalid parameter
			return $output;

		if ( empty( $elements ) ) // nothing to walk
			return $output;

		$id_field     = $this->db_fields['id'];
		$parent_field = $this->db_fields['parent'];

		// flat display
		if ( -1 == $max_depth ) {

			$empty_array = array();
			foreach ( $elements as $e )
				$this->display_element( $e, $empty_array, 1, 0, $args, $output );

			return $output;
		}

		/*
		 * need to display in hierarchical order
		 * separate elements into two buckets: top level and children elements
		 * children_elements is two dimensional array, eg.
		 * children_elements[10][] contains all sub-elements whose parent is 10.
		 */
		$top_level_elements = array();
		$children_elements  = array();

		foreach ( $elements as $e ) {
			// BuddyPress: changed '==' to '==='. This is the only change from version in Walker::walk().
			if ( 0 === $e->$parent_field )
				$top_level_elements[] = $e;
			else
				$children_elements[$e->$parent_field][] = $e;
		}

		/*
		 * when none of the elements is top level
		 * assume the first one must be root of the sub elements
		 */
		if ( empty( $top_level_elements ) ) {

			$first              = array_slice( $elements, 0, 1 );
			$root               = $first[0];
			$top_level_elements = array();
			$children_elements  = array();

			foreach ( $elements as $e ) {
				if ( $root->$parent_field == $e->$parent_field )
					$top_level_elements[] = $e;
				else
					$children_elements[$e->$parent_field][] = $e;
			}
		}

		foreach ( $top_level_elements as $e )
			$this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );

		/*
		 * if we are displaying all levels, and remaining children_elements is not empty,
		 * then we got orphans, which should be displayed regardless
		 */
		if ( ( $max_depth == 0 ) && count( $children_elements ) > 0 ) {
			$empty_array = array();

			foreach ( $children_elements as $orphans )
				foreach ( $orphans as $op )
					$this->display_element( $op, $empty_array, 1, 0, $args, $output );
		 }

		 return $output;
	}

	/**
	 * Displays the current <li> that we are on.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding. Optional, defaults to 0.
	 * @param array $args Optional
	 * @param int $current_page Menu item ID. Optional.
	 * @since BuddyPress (1.7)
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		// If we're someway down the tree, indent the HTML with the appropriate number of tabs
		$indent = $depth ? str_repeat( "\t", $depth ) : '';

		// Add HTML classes
		$class_names = join( ' ', apply_filters( 'bp_nav_menu_css_class', array_filter( $item->class ), $item, $args ) );
		$class_names = ! empty( $class_names ) ? ' class="' . esc_attr( $class_names ) . '"' : '';

		// Add HTML ID
		$id = sanitize_html_class( $item->css_id . '-personal-li' );  // Backpat with BP pre-1.7
		$id = apply_filters( 'bp_nav_menu_item_id', $id, $item, $args );
		$id = ! empty( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		// Opening tag; closing tag is handled in Walker_Nav_Menu::end_el().
		$output .= $indent . '<li' . $id . $class_names . '>';

		// Add href attribute
		$attributes = ! empty( $item->link ) ? ' href="' . esc_attr( esc_url( $item->link ) ) . '"' : '';

		// Construct the link
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->name, 0 ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		// $output is byref
		$output .= apply_filters( 'bp_walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Renders a list of all the registered activity types for use in a <select> element, or as <input type="checkbox">.
 *
 * @param string $output Optional. Either 'select' or 'checkbox'. Defaults to select.
 * @param string|array $args Optional extra arguments:
 *  checkbox_name - Used when type=checkbox. Sets the item's name property.
 *  selected      - Array of strings of activity types to mark as selected/checked.
 * @since BuddyPress (1.7)
 */
function bp_activity_types_list( $output = 'select', $args = '' ) {
	$defaults = array(
		'checkbox_name' => 'bp_activity_types',
		'selected'      => array(),
	);
	$args = wp_parse_args( $args, $defaults );

	$activities = bp_activity_get_types();
	natsort( $activities );

	// Loop through the activity types and output markup
	foreach ( $activities as $type => $description ) {

		// See if we need to preselect the current type
		$checked  = checked(  true, in_array( $type, (array) $args['selected'] ), false );
		$selected = selected( true, in_array( $type, (array) $args['selected'] ), false );

		if ( 'select' == $output )
			printf( '<option value="%1$s" %2$s>%3$s</option>', esc_attr( $type ), $selected, esc_html( $description ) );

		elseif ( 'checkbox' == $output )
			printf( '<label style="">%1$s<input type="checkbox" name="%2$s[]" value="%3$s" %4$s/></label>', esc_html( $description ), esc_attr( $args['checkbox_name'] ), esc_attr( $type ), $checked );

		// Allow custom markup
		do_action( 'bp_activity_types_list_' . $output, $args, $type, $description );
	}

	// Backpat with BP-Default for dropdown boxes only
	if ( 'select' == $output )
		do_action( 'bp_activity_filter_options' );
}