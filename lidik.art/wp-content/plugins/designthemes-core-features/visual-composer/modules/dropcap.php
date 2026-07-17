<?php add_action( 'vc_before_init', 'dt_sc_dropcap_vc_map' );
function dt_sc_dropcap_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__( "Dropcap", 'dtthemes-core' ),
            "base" => "dt_sc_dropcap",
		"icon" => "dt_sc_dropcap",
		"category" => DT_VC_CATEGORY,
		"params" => array(

      		# Dropcap Text
      		array(
      			'type' => 'textfield',
      			'heading' => esc_html__( 'Text', 'dtthemes-core' ),
      			'param_name' => 'content',
      			'value' => 'A',
      			'admin_label' => true
      		),			

			# Types
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Types', 'dtthemes-core' ),
      			'param_name' => 'type',
      			'value' => array( 
      				esc_html__('Default','dtthemes-core') => 'default',
      				esc_html__('Circle','dtthemes-core') => 'circle'
      			),
      			'description' => esc_html__( 'Select Dropcap type', 'dtthemes-core' ),
      			'std' => 'default',
      			'admin_label' => true
      		),

      		# Variation
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Color', 'dtthemes-core' ),
      			'param_name' => 'variation',
      			'value' => $variations,
      			'description' => esc_html__( 'Select dropcap color', 'dtthemes-core' ),
      		),

      		# Text Color
      		array(
      			'type' => 'colorpicker',
      			'heading' => esc_html__( 'Custom text color', 'dtthemes-core' ),
      			'param_name' => 'textcolor',
      			'description' => esc_html__( 'Select text color', 'dtthemes-core' ),
      		),

      		# BG Color
      		array(
      			'type' => 'colorpicker',
      			'heading' => esc_html__( 'Custom Background color', 'dtthemes-core' ),
      			'param_name' => 'bgcolor',
      			'description' => esc_html__( 'Select Background color', 'dtthemes-core' ),
                        'dependency' => array( 'element' => 'type', 'value' => array('circle','bordered-circle','square','bordered-square') )                        
      		)    		      		      					
		)
	) );	
}?>