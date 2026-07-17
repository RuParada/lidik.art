<?php
if (! class_exists ( 'DTPortfolioPostType' )) {
	class DTPortfolioPostType {
		
		/**
		 * A function constructor calls initially
		 */
		function __construct() {
			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this,
					'dt_init' 
			) );
			
			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array (
					$this,
					'dt_admin_init' 
			) );
			
			// Add Hook into the 'template_include' filter
			add_filter ( 'template_include', array (
					$this,
					'dt_template_include' 
			) );
		}
		
		/**
		 * A function hook that the WordPress core launches at 'init' points
		 */
		function dt_init() {
			$this->createPostType ();
			add_action ( 'save_post', array (
					$this,
					'save_post_meta' 
			) );
		}
		
		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 */
		function dt_admin_init() {
			wp_enqueue_script ( 'jquery-ui-sortable' );
			
			add_action ( 'add_meta_boxes', array (
					$this,
					'dt_add_portfolio_meta_box' 
			) );
			
			add_filter ( "manage_edit-dt_portfolios_columns", array (
					$this,
					"dt_portfolios_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
					$this,
					"dt_portfolios_columns_display" 
			), 10, 2 );
		}

		/**
		 */
		function createPostType() {

			$portslug = 'dt_portfolios';
			$taxslug  = 'portfolio_entries';
			$tagslug  = 'portfolio_tags';

			if( function_exists( 'redart_opts_get' ) ) {
				$portslug =	redart_opts_get( 'single-portfolio-slug', 'dt_portfolios' );
				$taxslug  =	redart_opts_get( 'portfolio-category-slug', 'portfolio_entries' );
				$tagslug  =	redart_opts_get( 'portfolio-tag-slug', 'portfolio_tags' );
			}

			$labels = array (
					'name' => __ ( 'Portfolios', 'dtthemes-core' ),
					'all_items' => __ ( 'All Portfolios', 'dtthemes-core' ),
					'singular_name' => __ ( 'Portfolio', 'dtthemes-core' ),
					'add_new' => __ ( 'Add New', 'dtthemes-core' ),
					'add_new_item' => __ ( 'Add New Portfolio', 'dtthemes-core' ),
					'edit_item' => __ ( 'Edit Portfolio', 'dtthemes-core' ),
					'new_item' => __ ( 'New Portfolio', 'dtthemes-core' ),
					'view_item' => __ ( 'View Portfolio', 'dtthemes-core' ),
					'search_items' => __ ( 'Search Portfolios', 'dtthemes-core' ),
					'not_found' => __ ( 'No Portfolios found', 'dtthemes-core' ),
					'not_found_in_trash' => __ ( 'No Portfolios found in Trash', 'dtthemes-core' ),
					'parent_item_colon' => __ ( 'Parent Portfolio:', 'dtthemes-core' ),
					'menu_name' => __ ( 'Portfolios', 'dtthemes-core' ) ,					
			);
			
			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => __( 'This is custom post type portfolios', 'dtthemes-core' ),
					'supports' => array (
							'title',
							'editor',
							'comments',
							'thumbnail',
							'revisions'
					),
					
					'public' => true,
					'show_in_rest' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 5,
					'menu_icon' => 'dashicons-format-gallery',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => array( 'slug' => $portslug ),
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_portfolios', $args );

			register_taxonomy ( 'portfolio_entries', array (
					'dt_portfolios'
			), array (
					"hierarchical" => true,
					"label" => __( "Categories",'dtthemes-core' ),
					"singular_label" => __( "Category",'dtthemes-core' ),
					"show_admin_column" => true,
					"rewrite" => array( 'slug' => $taxslug ),
					"query_var" => true,
					"show_in_rest" => true
			) );

			register_taxonomy ( 'portfolio_tags', array (
				'dt_portfolios'
			), array (
					"label" => esc_html__( "Tags",'designthemes-core' ),
					"singular_label" => esc_html__( "Tag",'designthemes-core' ),
					"show_admin_column" => true,
					"rewrite" => array( 'slug' => $tagslug ),
					"query_var" => true,
					"show_in_rest" => true
			) );
		}

		/**
		 */
		function dt_add_portfolio_meta_box() {
			add_meta_box ( "dt-portfolio-default-metabox", __ ( 'Default Options', 'dtthemes-core' ), array (
					$this,
					'dt_default_metabox' 
			), 'dt_portfolios', "normal", "default" );
		}
		
		/**
		 */
		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_portfolio_default_metabox.php';
		}
		
		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_portfolios_edit_columns($columns) {

			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_portfolio_thumb" => __("Image", "dtthemes-core"),
				"title" => __("Title", "dtthemes-core"),
				"author" => __("Author", "dtthemes-core")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}
		
		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_portfolios_columns_display($columns, $id) {
			global $post;
			
			switch ($columns) {
				
				case "dt_portfolio_thumb" :

				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo redart_wp_kses($image);
				    else:
						$portfolio_settings = get_post_meta ( $post->ID, '_portfolio_settings', TRUE );
						$portfolio_settings = is_array ( $portfolio_settings ) ? $portfolio_settings : array ();
					
						if( array_key_exists("items_thumbnail", $portfolio_settings)) {
							$item = $portfolio_settings ['items_thumbnail'] [0];
							$name = $portfolio_settings ['items_name'] [0];
						
							if( "video" === $name ) {
								echo '<span class="dt-video"></span>';
							}else{
								echo "<img src='{$item}' height='75px' width='75px' />";
							}
						}
					endif;
				break;
			}
		}

		/**
		 */
		function save_post_meta($post_id) {

			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;
			
			if( key_exists( 'dt_theme_portfolio_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_portfolio_meta_nonce'], 'dt_theme_portfolio_nonce') ) return;
			endif;
		 
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

			if (!current_user_can('edit_post', $post_id)) :
				return;
			endif;

			if ( (key_exists('post_type', $_POST)) && ('dt_portfolios' == $_POST['post_type']) ) :

				$layout = isset($_POST['layout']) ? $_POST['layout'] : '';
				if($layout) :
					$settings = array ();
					$settings['layout'] = $layout;

					$settings['sub-title-bg'] = isset ( $_POST['sub-title-bg'] ) ? $_POST['sub-title-bg'] : "";
					$settings['sub-title-bg-repeat'] = isset ( $_POST['sub-title-bg-repeat'] ) ? $_POST['sub-title-bg-repeat'] : "";
					$settings['sub-title-opacity'] = isset ( $_POST['sub-title-opacity'] ) ? $_POST['sub-title-opacity'] : "";
					$settings['sub-title-bg-position'] = isset ( $_POST['sub-title-bg-position'] ) ? $_POST['sub-title-bg-position'] : "";
					$settings['sub-title-bg-color'] = isset ( $_POST['sub-title-bg-color'] ) ? $_POST['sub-title-bg-color'] : "";

					if($layout == 'with-both-sidebar') {
						$settings['show-standard-sidebar-left'] = isset( $_POST['show-standard-sidebar-left'] ) ? $_POST['show-standard-sidebar-left'] : '';
						$settings['show-standard-sidebar-right'] = isset( $_POST['show-standard-sidebar-right'] ) ? $_POST['show-standard-sidebar-right'] : '';
						$settings['widget-area-left'] = isset( $_POST['dttheme']['widgetareas-left'] ) ? array_unique(array_filter($_POST['dttheme']['widgetareas-left'])) : '';
						$settings['widget-area-right'] = isset( $_POST['dttheme']['widgetareas-right'] ) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					} elseif($layout == 'with-left-sidebar') {
						$settings['show-standard-sidebar-left'] = isset( $_POST['show-standard-sidebar-left'] ) ? $_POST['show-standard-sidebar-left'] : '';
						$settings['widget-area-left'] =  isset($_POST['dttheme']['widgetareas-left']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-left'])) : '';
					} elseif($layout == 'with-right-sidebar') {
						$settings['show-standard-sidebar-right'] = $_POST['show-standard-sidebar-right'];
						$settings['widget-area-right'] =  isset($_POST['dttheme']['widgetareas-right']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					}

					$settings ['portfolio-layout'] = isset ( $_POST ['portfolio-layout'] ) ? $_POST ['portfolio-layout'] : "";
					$settings ['portfolio-slider'] = isset ( $_POST['dttheme-portfolio-slider'] ) ? $_POST['dttheme-portfolio-slider'] : "";

					$settings ['items'] = isset ( $_POST ['items'] ) ? $_POST ['items'] : "";
					$settings ['items_thumbnail'] = isset ( $_POST ['items_thumbnail'] ) ? $_POST ['items_thumbnail'] : "";
					$settings ['items_name'] = isset ( $_POST ['items_name'] ) ? $_POST ['items_name'] : "";

					$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
					$settings ['meta_class'] = isset ( $_POST['dttheme-meta-class'] ) ? $_POST['dttheme-meta-class'] : "";
					$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";
	
					update_post_meta ( $post_id, "_portfolio_settings", array_filter ( $settings ) );
	
					// for default category
					$terms = wp_get_object_terms ( $post_id, 'portfolio_entries' );
					if (empty ( $terms )) :
						wp_set_object_terms ( $post_id, 'Uncategorized', 'portfolio_entries', true );
					endif;
				endif;
			endif;
		}

		/**
		 * To load portfolio pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_singular( 'dt_portfolios' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_portfolios.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_portfolios.php';
				}
			} elseif (is_tax ( 'portfolio_entries' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-portfolio_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-portfolio_entries.php';
				}
			} elseif (is_tax ( 'portfolio_tags' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-portfolio_tags.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-portfolio_tags.php';
				}
			}
			return $template;
		}
	}
}
?>