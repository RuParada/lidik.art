<?php add_action( 'vc_before_init', 'dt_sc_colored_button_vc_map' );
function dt_sc_colored_button_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__( "Colored Button", 'dtthemes-core' ),
            "base" => "dt_sc_colored_button",
		"icon" => "dt_sc_colored_button",
		"category" => DT_VC_CATEGORY,
		"params" => array(

      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'dtthemes-core' ),
      			"param_name" => "title"
      		),

      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub Title", 'dtthemes-core' ),
      			"param_name" => "subtitle"
      		),

      		array(
      			'type' => 'vc_link',
      			'heading' => esc_html__( 'URL (Link)', 'dtthemes-core' ),
      			'param_name' => 'link',
      			'description' => esc_html__( 'Add link to button', 'dtthemes-core' )
      		),

      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Color', 'dtthemes-core' ),
      			'param_name' => 'color',
      			'value' => $variations,
      			'description' => esc_html__( 'Select button color', 'dtthemes-core' ),
      		),

                  // Icon Type
                  array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon Type','dtthemes-core'),
                        'param_name' => 'icon_type',
                        'value' => array(
                              esc_html__('None', 'dtthemes-core' ) => '',      
                              esc_html__('Font Awesome', 'dtthemes-core' ) => 'fontawesome' ,
                              esc_html__('Class','dtthemes-core') => 'css_class'
                        ),
                        'std' => 'fontawesome'
                  ),                  

      		# Font Awesome
			array(
                        'type' => 'iconpicker',
				'heading' => esc_html__( 'Font Awesome', 'dtthemes-core' ),
				'param_name' => 'icon',
				'value' => 'fa fa-info-circle',
				'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'fontawesome' ),
                        'description' => esc_html__( 'Select icon from library', 'dtthemes-core' ),
			),

                  // Custom Class
                  array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Custom icon class', 'dtthemes-core' ),
                        'param_name' => 'icon_css_class',
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'css_class' )
                  ),                  

      		array(
      			"type" => "textfield",
      			"heading" => esc_html__('Extra class name','dtthemes-core'),
      			"param_name" => "class"
      		),      					
		)
	) );
}?>