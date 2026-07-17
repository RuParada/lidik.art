<?php
add_action( 'vc_before_init', 'dt_sc_google_map_vc_map' );
function dt_sc_google_map_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Google Map", 'dtthemes-core' ),
		"base" => "dt_sc_google_map",
		"category" => DT_VC_CATEGORY,
		"class" => "dt_vc_style",
		"icon" => "dt_sc_google_map",
		'as_parent' => array( 'only' => 'dt_sc_google_map_marker' ),
		"content_element" => true,
		"params" => array(

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Map Type', 'dtthemes-core' ),
      			'param_name' => 'map_type',
      			'value' => array(
      				esc_html__('Roadmap','dtthemes-core') => 'roadmap',
      				esc_html__('Satellite','dtthemes-core') => 'satellite',
      				esc_html__('Terrain','dtthemes-core') => 'terrain',
      				esc_html__('Hybrid','dtthemes-core') => 'hybrid'
      			),
				'save_always' => true,
      			'description' => esc_html__( 'The popup window which appears when a marker is clicked.', 'dtthemes-core' ),				
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Map Style', 'dtthemes-core' ),
      			'param_name' => 'map_style',
      			'value' => array(
      				esc_html__('Default','dtthemes-core') => '',
      				esc_html__('Custom','dtthemes-core') => 'custom',
					esc_html__('Style 1','dtthemes-core') => '1',
					esc_html__('Style 2','dtthemes-core') => '2',
					esc_html__('Style 3','dtthemes-core') => '3',
					esc_html__('Style 4','dtthemes-core') => '4',
					esc_html__('Style 5','dtthemes-core') => '5',
					esc_html__('Style 6','dtthemes-core') => '6',
					esc_html__('Style 7','dtthemes-core') => '7',
					esc_html__('Style 8','dtthemes-core') => '8',
					esc_html__('Style 9','dtthemes-core') => '9',
					esc_html__('Style 10','dtthemes-core') => '10',
					esc_html__('Style 11','dtthemes-core') => '11',
					esc_html__('Style 12','dtthemes-core') => '12',
					esc_html__('Style 13','dtthemes-core') => '13',
					esc_html__('Style 14','dtthemes-core') => '14',
					esc_html__('Style 15','dtthemes-core') => '15',
					esc_html__('Style 16','dtthemes-core') => '16',
					esc_html__('Style 17','dtthemes-core') => '17',
					esc_html__('Style 18','dtthemes-core') => '18',
					esc_html__('Style 19','dtthemes-core') => '19',
					esc_html__('Style 20','dtthemes-core') => '20',
					esc_html__('Style 21','dtthemes-core') => '21',
					esc_html__('Style 22','dtthemes-core') => '22',
					esc_html__('Style 23','dtthemes-core') => '23',
					esc_html__('Style 24','dtthemes-core') => '24',
					esc_html__('Style 25','dtthemes-core') => '25',
					esc_html__('Style 26','dtthemes-core') => '26',
					esc_html__('Style 27','dtthemes-core') => '27',
					esc_html__('Style 28','dtthemes-core') => '28',
					esc_html__('Style 29','dtthemes-core') => '29',
					esc_html__('Style 30','dtthemes-core') => '30',
					esc_html__('Style 31','dtthemes-core') => '31',
					esc_html__('Style 32','dtthemes-core') => '32',
					esc_html__('Style 33','dtthemes-core') => '33',
					esc_html__('Style 34','dtthemes-core') => '34',
					esc_html__('Style 35','dtthemes-core') => '35',
					esc_html__('Style 36','dtthemes-core') => '36',
					esc_html__('Style 37','dtthemes-core') => '37',
					esc_html__('Style 38','dtthemes-core') => '38',
					esc_html__('Style 39','dtthemes-core') => '39',
					esc_html__('Style 40','dtthemes-core') => '40',
					esc_html__('Style 41','dtthemes-core') => '41',
					esc_html__('Style 42','dtthemes-core') => '42',
					esc_html__('Style 43','dtthemes-core') => '43',
					esc_html__('Style 44','dtthemes-core') => '44',
					esc_html__('Style 45','dtthemes-core') => '45',
					esc_html__('Style 46','dtthemes-core') => '46',
					esc_html__('Style 47','dtthemes-core') => '47',
					esc_html__('Style 48','dtthemes-core') => '48',
					esc_html__('Style 49','dtthemes-core') => '49',
					esc_html__('Style 50','dtthemes-core') => '50',      				
      			),
      			'description' => esc_html__( 'Choose map custom style.', 'dtthemes-core' ),				
			),

			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Custom Style", 'dtthemes-core' ),
      			"param_name" => "custom_map_style",
      			"description" => esc_html__( "Select custom color for map", 'dtthemes-core' ),
				'dependency' => array( 'element' => 'map_style', 'value' =>'custom' )				
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Map Width', 'dtthemes-core' ),
				'param_name' => 'map_width',
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'value' => '100%',
      			'description' => esc_html__( 'In px or % , 100% for a responsive map.', 'dtthemes-core' ),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Map Height', 'dtthemes-core' ),
				'param_name' => 'map_height',
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'value' => '500px',
      			'description' => esc_html__( 'In px or % ,eg: 500px or 30%.', 'dtthemes-core' ),
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Map Zoom Level', 'dtthemes-core' ),
      			'param_name' => 'map_zoom_level',
      			'value' => array( 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),
				'save_always' => true,
				'std' => 12
			),			

			// Controls
			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Street View Control', 'dtthemes-core' ),
      			'param_name' => 'map_street_view_control',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','dtthemes-core') => 'enable',
      				esc_html__('Disable','dtthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Map Type Control', 'dtthemes-core' ),
      			'param_name' => 'map_type_control',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','dtthemes-core') => 'enable',
      				esc_html__('Disable','dtthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Zoom Control', 'dtthemes-core' ),
      			'param_name' => 'map_zoom_control',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','dtthemes-core') => 'enable',
      				esc_html__('Disable','dtthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Scale Control', 'dtthemes-core' ),
      			'param_name' => 'map_scale_control',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','dtthemes-core') => 'enable',
      				esc_html__('Disable','dtthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Scroll wheel', 'dtthemes-core' ),
      			'param_name' => 'map_scroll_wheel',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','dtthemes-core') => 'enable',
      				esc_html__('Disable','dtthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( ' Draggable?', 'dtthemes-core' ),
      			'param_name' => 'map_draggable',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','dtthemes-core') => 'enable',
      				esc_html__('Disable','dtthemes-core') => 'disable'
      			),
				'save_always' => true,
			),															
			// Controls
			
			// Markers
			array(
				'type' => 'param_group',
				'param_name' => 'map_markers',
				'group' => esc_html__( 'Markers', 'dtthemes-core' ),
				'params' => array(

					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Latitude', 'dtthemes-core' ),
						'param_name' => 'marker_latitude',
						'save_always' => true
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Longitude', 'dtthemes-core' ),
						'param_name' => 'marker_longitude',
						'save_always' => true
					),

					array(
						'type' => 'textarea_raw_html',
						'heading' => esc_html__('Content', 'dtthemes-core'),
						'param_name' => 'marker_content',
					),

					array(
		      			'type' => 'dropdown',
		      			'heading' => esc_html__( 'Icon', 'dtthemes-core' ),
		      			'param_name' => 'marker_icon',
						'save_always' => true,
		      			'value' => array( 
		      				esc_html__('Built in','dtthemes-core') => 'pin.png',
		      				esc_html__('Custom','dtthemes-core') => 'custom',
		      				esc_html__('Black','dtthemes-core') => 'black.png',
		      				esc_html__('Blue','dtthemes-core') => 'blue.png',
		      				esc_html__('Gray','dtthemes-core') => 'gray.png',
		      				esc_html__('Green','dtthemes-core') => 'green.png',
		      				esc_html__('Magenta','dtthemes-core') => 'magenta.png',
		      				esc_html__('Orange','dtthemes-core') => 'orange.png',
		      				esc_html__('Purple','dtthemes-core') => 'purple.png',
		      				esc_html__('Red','dtthemes-core') => 'red.png',
		      				esc_html__('White','dtthemes-core') => 'white.png',
		      				esc_html__('Yellow','dtthemes-core') => 'yellow.png',
		      			),
		      			'description' => esc_html__( 'Select marker icon', 'dtthemes-core' ),
		      			'std' => 'green.png',
					),

					array(
						"type" => "attach_image",
		      			"heading" => esc_html__( "Custom Marker icon", 'dtthemes-core' ),
		      			"param_name" => "custom_marker_icon",
		      			"group" => esc_html__( 'Marker', 'dtthemes-core' ),
		      			"description" => esc_html__( "Select custom marker icon", 'dtthemes-core' ),
						'dependency' => array( 'element' => 'marker_icon', 'value' =>'custom' )				
					),

					array(
		      			'type' => 'dropdown',
		      			'heading' => esc_html__( 'Popup Window', 'dtthemes-core' ),
		      			'group' => esc_html__( 'Marker', 'dtthemes-core' ),
		      			'param_name' => 'popup',
		      			'value' => array(
		      				esc_html__('Hidden','dtthemes-core') => 'hidden',
		      				esc_html__('Visible','dtthemes-core') => 'visible'
		      			),
						'save_always' => true,
		      			'description' => esc_html__( 'The popup window which appears when a marker is clicked.', 'dtthemes-core' ),
					),
				)
			)
			// markers
		)
	) );
}
