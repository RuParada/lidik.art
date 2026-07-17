<?php
if (! class_exists ( 'DTCoreVC' )) {

	class DTCoreVC {

		function __construct() {

			add_action( 'vc_before_init', array ( $this, 'dt_vcSetAsTheme') );
			add_action( 'admin_enqueue_scripts', array ( $this, 'dt_vc_admin_scripts') );
			add_filter( 'vc_load_default_templates',  array( $this, 'dt_vc_custom_template_modify_array' ) );
			add_action( 'after_setup_theme', array( $this, 'dt_map_shortcodes') );
			add_action( 'init', array( $this, 'dt_vs_contanct_form_7_fields') );
		}

		function dt_vcSetAsTheme() {
			vc_set_as_theme();
			
			# Set Shortcode templates folder
			$path = plugin_dir_path ( __FILE__ ) . 'vc_templates';
			vc_set_shortcodes_templates_dir( $path );	

		}

		function dt_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {

				wp_enqueue_style( 'dt-vc-admin', plugins_url('designthemes-core-features') .'/visual-composer/admin.css', false, REDART_VERSION, 'all' );
			}
		}

		function dt_vc_custom_template_modify_array( $templates ) {
			return array();
		}

		function dt_map_shortcodes() {

			require_once plugin_dir_path( __FILE__ ).'modules/index.php';
		}

		function dt_vs_contanct_form_7_fields() {
			vc_add_param('contact-form-7',array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'dtthemes-core' ),
				'param_name' => 'html_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dtthemes-core' ),
			) );
		}
	}
}