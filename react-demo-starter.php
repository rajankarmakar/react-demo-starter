<?php
/**
 * Plugin Name:       React Demo Starter
 * Plugin URI:        https://example.com/
 * Description:       This is a react demo starter plugin working with wordpress and react together
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      5.6
 * Author:            Rajan K.
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       react-demo-starter
 * Domain Path:       /languages/
 */

//Prevent Direct access
defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/includes/Adminmenu.php';

/**
 * Plugin main class
 */
final class ReactDemoStarter {
    /**
     * Plugin version
     * 
     * @var string VERSION
     */
    const VERSION = '1.0.0';

    /**
     * Plugin instance
     * 
     * @var string $instance
     */
    private static $instance = null;

    /**
     * Class constructor
     */
    private function __construct() {
        $this->define_constants();

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Run all plugin functionalities
     * 
     * @return void
     */
    public function init_plugin() {
        new Adminmenu();
    }

    /**
     * Define necessary constants
     * 
     * @return void
     */
    public function define_constants() {
        define( 'RDP_VERSION', self::VERSION );
        define( 'RDP_PATH', __DIR__ );
        define( 'RDP_FILE', __FILE__ );
        define( 'RDP_URL', plugins_url( '', RDP_FILE ) );
        define( 'RDP_ASSETS', RDP_URL . '/assets' );
        define( 'RDP_REACT_APP', RDP_URL . '/build' );
    }

    /**
     * Initialize a singleton instance
     * 
     * @return ReactDemoStarter
     */
    public static function init() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

/**
 * Initialize the plugin
 * 
 * @return ReactDemoStarter
 */
function rdp_react_demo_stater_boot() {
    return ReactDemoStarter::init();
}

//Start the plugin
rdp_react_demo_stater_boot();