<?php

defined( 'ABSPATH' ) || exit;

/**
 * Handle admin menu
 */
class Adminmenu {
    /**
     * Class constructor
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'register_menu' ] );
    }

    /**
     * Register Admin menu
     * 
     * @return void
     */
    public function register_menu() {
        $hook = add_menu_page( 
            __( 'React Menu', 'react-demo-starter' ),
            __( 'React Menu', 'react-demo-starter' ),
            'manage_options',
            'react-demo-starter',
            [ $this, 'display_menu' ],
            '',
            30
        );

        add_action( "load-{$hook}", [ $this, 'enqueue_script' ] );
    }

    /**
     * Display settings menu
     * 
     * @return void
     */
    public function display_menu() {
        echo "<div class='wrap'><div id='react-app'></div></div>";
    }

    /**
     * Enqueue script for new admin page
     * 
     * @return void
     */
    public function enqueue_script() {
        $script = require RDP_PATH . '/build/index.asset.php';
        wp_enqueue_script( 'react-app', RDP_REACT_APP . '/index.js', $script['dependencies'], $script['version'], true );
    }
}

