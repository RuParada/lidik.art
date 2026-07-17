<?php add_action( 'vc_before_init', 'dt_sc_button_vc_map' );
function dt_sc_button_vc_map() {

	global $variations;
	global $dt_animation_types;

	vc_map( array(
		"name" => esc_html__( "Button", 'dtthemes-core' ),
		"base" => "dt_sc_button",
		"icon" => "dt_sc_button",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Button Text
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Text', 'dtthemes-core' ),
				'param_name' => 'title',
				'value' => esc_html__( 'Text on the button', 'dtthemes-core' ),
			),

			// Button Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'URL (Link)', 'dtthemes-core' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Add link to button', 'dtthemes-core' ),
			),

			// Button Size
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Size', 'dtthemes-core' ),
				'description' => esc_html__( 'Select button display size', 'dtthemes-core' ),
				'param_name' => 'size',
				'value' => array(
					esc_html__( 'Small', 'dtthemes-core' ) => 'small',
					esc_html__( 'Medium', 'dtthemes-core' ) => 'medium',
					esc_html__( 'Large', 'dtthemes-core' ) => 'large',
					esc_html__( 'Xlarge', 'dtthemes-core' ) => 'xlarge',
				),
				'std' => 'small'
			),

			// Content Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Text color", 'dtthemes-core' ),
      			"param_name" => "textcolor",
      			"description" => esc_html__( "Select text color", 'dtthemes-core' ),
      		),

      		// Variation
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Background Color', 'dtthemes-core' ),
      			'admin_label' => true,
      			'param_name' => 'color',
      			'value' => $variations,
      			'description' => esc_html__( 'Select button background color', 'dtthemes-core' ),
      		),

			// BG Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Custom Background color", 'dtthemes-core' ),
      			"param_name" => "bgcolor",
      			"description" => esc_html__( "Select button background color", 'dtthemes-core' ),
				'dependency' => array( 'element' => 'color', 'value' =>'-' )
      		),      		      					

			// Button Style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Style', 'dtthemes-core' ),
				'description' => esc_html__( 'Select button display style', 'dtthemes-core' ),
				'param_name' => 'style',
				'value' => array(
					esc_html__( 'None', 'dtthemes-core') => '',
					esc_html__( 'Bordered', 'dtthemes-core' ) => 'bordered',
					esc_html__( 'Filled', 'dtthemes-core' ) => 'filled',
					esc_html__( 'Filled Rounded Corner', 'dtthemes-core' ) => 'filled rounded-corner',
					esc_html__( 'Rounded Corner', 'dtthemes-core' ) => 'rounded-corner',
					esc_html__( 'Rounded Border', 'dtthemes-core' ) => 'rounded-border',
					esc_html__( 'Fully Rounded Border', 'dtthemes-core' ) => 'fully-rounded-border',
				),				
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
      			'std' => ''
      		),

			// Icon Alignment
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon Alignment', 'dtthemes-core' ),
				'description' => esc_html__( 'Select icon alignment', 'dtthemes-core' ),
				'param_name' => 'iconalign',
				'value' => array(
					esc_html__( 'Left', 'dtthemes-core' ) => 'icon-left with-icon',
					esc_html__( 'Right', 'dtthemes-core' ) => 'icon-right with-icon',
				),
				'dependency' => array( 'element' => 'icon_type', 'value' => array( 'fontawesome', 'css_class' ) ),
				'std' => ''
			),

      		// Font Awesome
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Font Awesome', 'dtthemes-core' ),
				'param_name' => 'iconclass',
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

			// Button Animation
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Animation', 'dtthemes-core' ),
				'description' => esc_html__( 'Select button animation', 'dtthemes-core' ),
				'param_name' => 'animation',
				'value' => $dt_animation_types
			),			

			// Hover Animation
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Hover Effect', 'dtthemes-core' ),
				'description' => esc_html__( 'Select effect', 'dtthemes-core' ),
				'param_name' => 'hanimate',
				'value' => array(
					esc_html__( 'None', 'dtthemes-core' ) => '',
					esc_html__( 'Horizontal', 'dtthemes-core' ) => 'dt-sc-expand dt-sc-expand-horizontal',
					esc_html__( 'Vertical', 'dtthemes-core' ) => 'dt-sc-expand dt-sc-expand-vertical',
					esc_html__( 'Middle', 'dtthemes-core' ) => 'dt-sc-expand dt-sc-expand-middle',
				),
				'std' => ''
			),

          	// Extra class name
          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'dtthemes-core' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'dtthemes-core' )
          	),

			// Custom CSS
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'dtthemes-core' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'dtthemes-core' )
			),
		)
	) );
} ?>