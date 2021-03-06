<?php

/**
 * Fired during plugin activation
 *
 * @link       http://viktormorales.com
 * @since      1.0.0
 *
 * @package    Vhm_Toc
 * @subpackage Vhm_Toc/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Vhm_Toc
 * @subpackage Vhm_Toc/includes
 * @author     Viktor H. Morales <viktor.morales@hotmail.com>
 */
class Vhm_Toc_Activator {
	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$plugin_name 	Option name of this plugin
	 */
	private static $plugin_name = 'vhm_toc';
	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() 
	{
		global $wpdb;
        
		// Add default options
		update_option(self::$plugin_name . '_title', 'Table of Content');
		update_option(self::$plugin_name . '_element', '.vhm-toc');
		update_option(self::$plugin_name . '_list_class', '');
		update_option(self::$plugin_name . '_each_item_class', '');
		
	}

}
