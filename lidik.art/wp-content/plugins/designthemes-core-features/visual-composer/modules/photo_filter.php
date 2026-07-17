<?php add_action( 'vc_before_init', 'dt_sc_photo_filter_vc_map' );
function dt_sc_photo_filter_vc_map() {
	vc_map( array(
		'name' => __( 'Photo Filter', 'dtthemes-core' ),
		'base' => 'dt_sc_photo_filter',
		'icon' => 'dt_sc_images_carousel',
		'category' => __( 'Content', 'dtthemes-core' ),
		'description' => __( 'Isotope Photo Filter', 'dtthemes-core' ),
		'params' => array(
			array(
				'type' => 'param_group',
				'heading' => __( 'Categories', 'dtthemes-core' ),
				'param_name' => 'categories',
				'description' => __( 'Enter categories for photo filter.', 'dtthemes-core' ),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Name', 'dtthemes-core' ),
						'param_name' => 'name',
						'description' => __( 'Enter the name of category.', 'dtthemes-core' ),
						'admin_label' => true,
					),
					array(
						'type' => 'textarea',
						'heading' => __( 'Description', 'dtthemes-core' ),
						'param_name' => 'description',
						'description' => __( 'Enter the description of category.', 'dtthemes-core' ),
						'admin_label' => false,
					),
					array(
						'type' => 'attach_images',
						'heading' => __( 'Images', 'dtthemes-core' ),
						'param_name' => 'images',
						'description' => __( 'Select images from media library.', 'dtthemes-core' ),
						'admin_label' => false,
					),
				),
			),

      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'General Content', 'dtthemes-core' ),
      			'param_name' => 'allcontent',
      			'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
      		),

			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'dtthemes-core' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dtthemes-core' ),
			),
		),
	));	
}