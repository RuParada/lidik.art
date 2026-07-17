<?php add_action( 'vc_before_init', 'dt_sc_iconbox_vc_map' );
function dt_sc_iconbox_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Icon box", 'dtthemes-core' ),
        "base" => "dt_sc_iconbox",
		"icon" => "dt_sc_iconbox",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Types
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Types', 'dtthemes-core' ),
      			'param_name' => 'type',
      			'value' => array( 
      				esc_html__('Icon BG','dtthemes-core') => 'type1',		esc_html__('Icon Title','dtthemes-core') => 'type2',	esc_html__('Classic','dtthemes-core') => 'type3',
      				esc_html__('Modern','dtthemes-core') => 'type4',		esc_html__('Modern BG','dtthemes-core') => 'type5',		esc_html__('Box BG','dtthemes-core') => 'type6',
      				esc_html__('Boxed','dtthemes-core') => 'type7',			esc_html__('Seperated','dtthemes-core') => 'type8',		esc_html__('Icon Hover','dtthemes-core') => 'type9',
      				esc_html__('Stamp','dtthemes-core') => 'type10',		esc_html__('Multipurpose','dtthemes-core') => 'type11', esc_html__('Animated','dtthemes-core') => 'type12',
					esc_html__('Icon Over Title','dtthemes-core') => 'type13'
      			),
      			'description' => esc_html__( 'Select icon box type', 'dtthemes-core' ),
      			'std' => 'type1',
      			'admin_label' => true
      		),

      		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'dtthemes-core' ),
      			"param_name" => "title"
      		),

      		# Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub Title", 'dtthemes-core' ),
      			"param_name" => "subtitle"
      		),

      		# Icon Type
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__('Icon Type','dtthemes-core'),
      			'param_name' => 'icon_type',
      			'value' => array( 
                              esc_html__('Image','dtthemes-core') => 'image',
                              esc_html__('Font Awesome', 'dtthemes-core' ) => 'fontawesome' ,
                              esc_html__('Class','dtthemes-core') => 'css_class',
                              esc_html__('None','dtthemes-core') => 'none' ),
      			'std' => 'fontawesome'
      		),

      		# Font Awesome
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Font Awesome', 'dtthemes-core' ),
				'param_name' => 'icon',
				'value' => 'fa fa-info-circle',
				'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library', 'dtthemes-core' ),
			),

			# Custom Icon
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'dtthemes-core' ),
				'param_name' => 'iconurl',
				'description' => esc_html__( 'Select image from media library', 'dtthemes-core' ),
				'dependency' => array( 'element' => 'icon_type', 'value' => 'image' )
			),

                  # Custom Class
                  array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Custom class', 'dtthemes-core' ),
                        'param_name' => 'icon_css_class',
                        'value' => '',
                        'dependency' => array(
                              'element' => 'icon_type',
                              'value' => 'css_class',
                        )
                  ),      		

      		# URL
      		array(
      			'type' => 'vc_link',
      			'heading' => esc_html__( 'URL (Link)', 'dtthemes-core' ),
      			'param_name' => 'link',
      			'description' => esc_html__( 'Add link to icon box', 'dtthemes-core' )
      		),

      		# Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'dtthemes-core' ),
      			'param_name' => 'content',
      			'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
      		),

      		# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'dtthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','dtthemes-core')
      		),

                  array(
                        'type' => 'textarea',
                        'heading' => "Inline styles",
                        'param_name' => 'addstyles',
                        'description' => esc_html__( 'Enter inline styles for this iconbox', 'dtthemes-core' )
                  )      		
		)
	) );
}?>