<?php add_action( 'vc_before_init', 'dt_sc_portfolios_vc_map' );
function dt_sc_portfolios_vc_map() {

	$arr = array( esc_html__('Yes','dtthemes-core') => 'yes', esc_html__('No','dtthemes-core') => 'no' );

	vc_map( array(
		"name" => esc_html__( "Portfolio Items", 'dtthemes-core' ),
		"base" => "dt_sc_portfolios",
		"icon" => "dt_sc_portfolios",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Post Count
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Post Counts', 'dtthemes-core' ),
				'param_name' => 'count',
				'description' => esc_html__( 'Enter post count', 'dtthemes-core' ),
				'admin_label' => true
			),

			// Post column
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Columns','dtthemes-core'),
				'param_name' => 'column',
				'value' => array(
					esc_html__('II Columns','dtthemes-core') => 2 ,
					esc_html__('III Columns','dtthemes-core') => 3,
					esc_html__('IV Columns','dtthemes-core') => 4,

				),
				'std' => '3'
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
				'std' => 'type1',
				'admin_label' => true
			),

			// Ajax Load More
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Ajax Load More','dtthemes-core'),
				'param_name' => 'ajax_loadmore',
				'value' => $arr,
				'std' => 'no',
			),

			// Allow Grid Space
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Allow Grid Space','dtthemes-core'),
				'param_name' => 'allow_gridspace',
				'value' => $arr
			),

			// Allow Filter
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Allow Filter','dtthemes-core'),
				'param_name' => 'allow_filter',
				'value' => $arr
			),

			// Term ID(s)
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Terms', 'dtthemes-core' ),
				'param_name' => 'terms',
				'description' => esc_html__( 'Enter Portfolio Terms', 'dtthemes-core' )
			),						
		)
	) );
} ?>