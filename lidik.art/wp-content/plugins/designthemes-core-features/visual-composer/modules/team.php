<?php add_action( 'vc_before_init', 'dt_sc_team_vc_map' );
function dt_sc_team_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Team", 'dtthemes-core' ),
		"base" => "dt_sc_team",
		"icon" => "dt_sc_team",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Name
			array(
				'type' => 'textfield',
				'param_name' => 'name',
				'heading' => esc_html__( 'Name', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter name', 'dtthemes-core' )
			),

			# Role
			array(
				'type' => 'textfield',
				'param_name' => 'role',
				'heading' => esc_html__( 'Role', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter role', 'dtthemes-core' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','dtthemes-core'),
                'param_name' => 'image'
            ),

            # Team style
            array(
				'type' => 'dropdown',
				'heading' => esc_html__('Team Style','dtthemes-core'),
            	'param_name' => 'teamstyle',
            	'value' => array(
            		esc_html__('Classic','dtthemes-core') => '',
					esc_html__('Modern','dtthemes-core') => 'type2',
					esc_html__('Rounded','dtthemes-core') => 'hide-social-show-on-hover rounded'
            	)
            ),

            # Social Icon Style
            array(
				'type' => 'dropdown',
				'heading' => esc_html__('Social Icon Style','dtthemes-core'),
            	'param_name' => 'socialstyle',
            	'value' => array(
            		esc_html__('Default','dtthemes-core') => '' ,
            		esc_html__('Rounded Border','dtthemes-core') => 'rounded-border' ,
            		esc_html__('Rounded Square','dtthemes-core') => 'rounded-square' ,
            		esc_html__('Square Border','dtthemes-core') => 'square-border' ,
            		esc_html__('Diamond Square Border','dtthemes-core') => 'diamond-square-border' ,
            		esc_html__('Hexagon Border','dtthemes-core') => 'hexagon-border'
            	)
            ),

            # Facebook
			array(
				'type' => 'textfield',
				'param_name' => 'facebook',
				'heading' => esc_html__( 'Facebook', 'dtthemes-core' ),
			),

            # Twitter
			array(
				'type' => 'textfield',
				'param_name' => 'twitter',
				'heading' => esc_html__( 'Twitter', 'dtthemes-core' ),
			),

            # Google
			array(
				'type' => 'textfield',
				'param_name' => 'google',
				'heading' => esc_html__( 'Google', 'dtthemes-core' ),
			),

            # Linkedin
			array(
				'type' => 'textfield',
				'param_name' => 'linkedin',
				'heading' => esc_html__( 'Linkedin', 'dtthemes-core' ),
			),

      		// Content
            array(
            	'type' => 'textarea_html',
            	'heading' => esc_html__('Content','dtthemes-core'),
            	'param_name' => 'content',
            	'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.'
            ),

      		# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'dtthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','dtthemes-core')
      		)			
		)
	) );	
}?>