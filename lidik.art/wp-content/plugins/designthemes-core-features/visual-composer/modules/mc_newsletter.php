<?php add_action( 'vc_before_init', 'dt_sc_mc_newsletter_vc_map' );
function dt_sc_mc_newsletter_vc_map() {
	vc_map( array(
		"name" => esc_html__("Mailchimp Newsletter", 'dtthemes-core'),
		"base" => "dt_sc_mc_newsletter",
		"icon" => "dt_sc_mc_newsletter",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add mailchimp newsletter signup form",'dtthemes-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type','dtthemes-core'),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Description','dtthemes-core') => 'type1',
					esc_html__('Minimal','dtthemes-core') => 'type2',
					esc_html__('Background','dtthemes-core') => 'type3',
					esc_html__('Squeeze','dtthemes-core') => 'type4'
				),
				'std' => 'type1'
			),

			# Main Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Main Title', 'dtthemes-core' ),
				'param_name' => 'title',
			),

			# Sub Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Sub Title', 'dtthemes-core' ),
				'param_name' => 'subtitle',
			),

			# Tooltip
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Tooltip', 'dtthemes-core' ),
				'param_name' => 'tooltip',
			),

			# List id
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'List ID', 'dtthemes-core' ),
				'param_name' => 'listid',
			),

			# Name
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name Field', 'dtthemes-core' ),
				'param_name' => 'name',
				'value' => esc_html__('Your Name', 'dtthemes-core')
			),

			# Email
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Email Field', 'dtthemes-core' ),
				'param_name' => 'email',
				'value' => esc_html__('Your Email Address', 'dtthemes-core')
			),

			# Button
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button Field', 'dtthemes-core' ),
				'param_name' => 'button',
				'value' => esc_html__('Subscribe Now', 'dtthemes-core')
			),

			# Show Name
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Show Name Field', 'dtthemes-core' ),
				'param_name' => 'show_name',
				'value' => array( esc_html__('Yes','dtthemes-core') => 'true', esc_html__('No','dtthemes-core') => 'false' ),
				'std' => 'false'
			),

			# Content - type = Decoration , Triangle
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Content', 'dtthemes-core' ),
				'param_name' => 'content',
				'value' => '<br><p>Sign-up to get the latest offers and news and stay updated.</p><i>Note: We do not spam</i><br>',
			),			

			# Extra class name
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'dtthemes-core' ),
				'param_name' => 'class',
				'description' => esc_html__( 'Style particular element differently - add a class name and refer to it in custom CSS', 'dtthemes-core' )
      		)
		)
	) );	
}?>