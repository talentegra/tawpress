<?php
/**
 * Plugin Name: LearnPress - Assignments
 * Plugin URI: http://thimpress.com/learnpress
 * Description: Assignments add-on for LearnPress.
 * Author: ThimPress
 * Version: 4.0.0
 * Author URI: http://thimpress.com
 * Tags: learnpress, lms, assignment
 * Text Domain: learnpress-assignments
 * Domain Path: /languages/
 * Require_LP_Version: 4.0.0
 *
 * @package learnpress-assigments
 */

defined( 'ABSPATH' ) || exit;

define( 'LP_ADDON_ASSIGNMENT_FILE', __FILE__ );
define( 'LP_ADDON_ASSIGNMENT_PATH', dirname( __FILE__ ) );
define( 'LP_ADDON_ASSIGNMENT_INC_PATH', LP_ADDON_ASSIGNMENT_PATH . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR );

/**
 * Class LP_Addon_Assignment_Preload
 */
class LP_Addon_Assignment_Preload {
	/**
	 * @var array
	 */
	public static $addon_info = array();

	/**
	 * LP_Addon_Assignment_Preload constructor.
	 */
	public function __construct() {
		$can_load = true;
		define( 'LP_ADDON_ASSIGNMENT_BASENAME', plugin_basename( __FILE__ ) );

		// Set version addon for LP check .
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		self::$addon_info = get_file_data(
			LP_ADDON_ASSIGNMENT_FILE,
			array(
				'Name'               => 'Plugin Name',
				'Require_LP_Version' => 'Require_LP_Version',
				'Version'            => 'Version',
			)
		);

		define( 'LP_ADDON_ASSIGNMENT_VER', self::$addon_info['Version'] );
		define( 'LP_ADDON_ASSIGNMENT_REQUIRE_VER', self::$addon_info['Require_LP_Version'] );

		// Check LP activated .
		if ( ! is_plugin_active( 'learnpress/learnpress.php' ) ) {
			$can_load = false;
		} else {
			// Check version LP
			if ( version_compare( LP_ADDON_ASSIGNMENT_REQUIRE_VER, get_option( 'learnpress_version', '3.0.0' ), '>' ) ) {
				$can_load = false;
			}
		}

		if ( ! $can_load ) {
			add_action( 'admin_notices', array( $this, 'show_note_errors_require_lp' ) );
			deactivate_plugins( LP_ADDON_ASSIGNMENT_BASENAME );

			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}

			return;
		}

		add_action( 'learn-press/ready', array( $this, 'load' ) );
	}

	/**
	 * Load addon
	 */
	public function load() {
		LP_Addon::load( 'LP_Addon_Assignment', 'inc/load.php', __FILE__ );
	}

	public function show_note_errors_require_lp() {
		?>
		<div class="notice notice-error">
			<p><?php echo( 'Please active <strong>LearnPress version ' . LP_ADDON_ASSIGNMENT_REQUIRE_VER . ' or later</strong> before active <strong>' . self::$addon_info['Name'] . '</strong>' ); ?></p>
		</div>
		<?php
	}
}

new LP_Addon_Assignment_Preload();
