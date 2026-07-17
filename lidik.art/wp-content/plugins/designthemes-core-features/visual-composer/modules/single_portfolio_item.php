<?php add_action( 'vc_before_init', 'dt_sc_portfolio_item_vc_map' );
function dt_sc_portfolio_item_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Single Portfolio Item", 'dtthemes-core' ),
		"base" => "dt_sc_portfolio_item",
		"icon" => "dt_sc_portfolio_item",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Post ID
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'ID', 'dtthemes-core' ),
				'param_name' => 'id',
				'description' => esc_html__( 'Enter post ID', 'dtthemes-core' ),
				'admin_label' => true
			),

			// Post style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style','dtthemes-core'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Classic','dtthemes-core') => 'type1',
					esc_html__('Curly','dtthemes-core') => 'type2',
					esc_html__('Minimal','dtthemes-core') => 'type3',
					esc_html__('Icon Only','dtthemes-core') => 'type4',
					esc_html__('Colorful','dtthemes-core') => 'type5',
					esc_html__('Gradient','dtthemes-core') => 'type6',
					esc_html__('Lightbox Plus','dtthemes-core') => 'type7'
				),
				'std' => 'type1'
			)
		)
	) );
}?>