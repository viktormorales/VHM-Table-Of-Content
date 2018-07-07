<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://viktormorales.com
 * @since      1.0.0
 *
 * @package    Vhm_Toc
 * @subpackage Vhm_Toc/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vhm_Toc
 * @subpackage Vhm_Toc/public
 * @author     Viktor H. Morales <viktor.morales@hotmail.com>
 */
class Vhm_Toc_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	
	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'vhm_toc';


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vhm_Toc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vhm_Toc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vhm-toc-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vhm_Toc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vhm_Toc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vhm-toc-public.js', array( 'jquery' ), $this->version, false );
		
	}
	
	public function footer_script()
	{
		$element = get_option( $this->option_name . '_element' );
		$before_each_item_template = get_option( $this->option_name . '_before_each_item_template' );
		$each_item_class = get_option( $this->option_name . '_each_item_class' );
		$after_each_item_template = get_option( $this->option_name . '_after_each_item_template' );
		
		if (is_single())
			{
			?>
			<script>
			jQuery(function(){
				var vhm_toc_el = jQuery('<?php echo $element; ?>');
				var vhm_toc = jQuery('#vhm-toc');
				
				vhm_toc.hide();
				if (vhm_toc_el.length > 0) {
					vhm_toc_el.each(function(i){
						jQuery(this).attr('id', 'section-' + i);
						var item = jQuery('#vhm-toc-items').append('<?php echo $before_each_item_template; ?><a href="#section-' + i + '" class="<?php echo $each_item_class; ?>">' + jQuery(this).text() + '</a><?php echo $after_each_item_template; ?>' );
					});
					vhm_toc.show();
				}
			});
			</script>
			<?php
		}
	}
}