<?php add_action( 'vc_before_init', 'dt_sc_twitter_tweets_vc_map' );
function dt_sc_twitter_tweets_vc_map() {

	vc_map( array( 
		"name" => esc_html__( "Twitter tweets", 'dtthemes-core' ),
		"base" => "dt_sc_twitter_tweets",
		"icon" => "dt_sc_twitter_tweets",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Consumer Key
			array(
				'type' => 'textfield',
				'param_name' => 'consumerkey',
				'heading' => esc_html__( 'Consumer key', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter Consumer key', 'dtthemes-core' ),
			),

			# Consumer secret
			array(
				'type' => 'textfield',
				'param_name' => 'consumersecret',
				'heading' => esc_html__( 'Consumer secret', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter Consumer secret', 'dtthemes-core' ),
			),

			# Access token 
			array(
				'type' => 'textfield',
				'param_name' => 'accesstoken',
				'heading' => esc_html__( 'Access token', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter Access token', 'dtthemes-core' ),
			),

			# Access token secret
			array(
				'type' => 'textfield',
				'param_name' => 'accesstokensecret',
				'heading' => esc_html__( 'Access token secret', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter Access token secret', 'dtthemes-core' ),
			),

			# Consumer Key
			array(
				'type' => 'textfield',
				'param_name' => 'username',
				'heading' => esc_html__( 'Twitter username', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter Twitter username', 'dtthemes-core' ),
			),

			# Avatar
			array(
				'type' => 'dropdown',
				'param_name' => 'useravatar',
				'heading' => esc_html__('Show avatar?','dtthemes-core'),
				'value' => array( esc_html__('Yes','dtthemes-core') => 'yes' , esc_html__('No','dtthemes-core') => 'no' ),
				'std' => 'no'
			)
		)		
	) );
}?>