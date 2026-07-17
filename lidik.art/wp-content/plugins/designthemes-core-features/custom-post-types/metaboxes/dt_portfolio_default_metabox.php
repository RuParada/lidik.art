<?php
global $post;
$portfolio_settings = get_post_meta ( $post->ID, '_portfolio_settings', TRUE );
$portfolio_settings = is_array ( $portfolio_settings ) ? $portfolio_settings : array ();
echo '<input type="hidden" name="dt_theme_portfolio_meta_nonce" value="'.wp_create_nonce('dt_theme_portfolio_nonce').'" />'; ?>

<!-- 0. Sub Title -->
<div class="sub-title custom-box">
    <div class="column one-sixth"><?php esc_html_e( 'Title Background','dtthemes-core');?></div>
    <div class="column five-sixth last">
        <div class="two-third column image-preview-container" style="width:60%;">
            <?php $subtitlebg = array_key_exists ( 'sub-title-bg', $portfolio_settings ) ? $portfolio_settings ['sub-title-bg'] : '';?>
            <input name="sub-title-bg" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo esc_attr($subtitlebg);?>"/>
            <input type="button" value="<?php esc_html_e('Upload','dtthemes-core');?>" class="upload_image_button show_preview" />
            <input type="button" value="<?php esc_html_e('Remove','dtthemes-core');?>" class="upload_image_reset" />
            <?php if( !empty($subtitlebg) ) redart_adminpanel_image_preview($subtitlebg );?>
            <p class="note"><?php esc_html_e('Upload an image for the sub title background','dtthemes-core');?></p>
        </div>
        <div class="one-eighth column"></div>
        <div class="one-third column last">
            <label><?php esc_html_e('Opacity','dtthemes-core');?></label>
            <?php $opacity =  array_key_exists ( "sub-title-opacity", $portfolio_settings ) ? $portfolio_settings ['sub-title-opacity'] : ''; ?>
            <select name="sub-title-opacity">
                <option value=""><?php esc_html_e("Select",'dtthemes-core');?></option>
                <?php foreach( array('1','0.1','0.2','0.3','0.4','0.5','0.6','0.7','0.8','0.9') as $option): ?>
                       <option value="<?php echo esc_attr($option);?>" <?php selected($option,$opacity);?>><?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select background color opacity','dtthemes-core');?></p>
        </div>    
    </div>
</div>

<div class="sub-title custom-box">
    <div class="column one-sixth"></div>
    <div class="column five-sixth last">
        <div class="column one-third">
            <label><?php esc_html_e('Background Repeat','dtthemes-core');?></label>
            <?php $bgrepeat =  array_key_exists ( "sub-title-bg-repeat", $portfolio_settings ) ? $portfolio_settings ['sub-title-bg-repeat'] : ''; ?>
            <div class="clear"></div>
            <select class="dt-chosen-select" name="sub-title-bg-repeat">
                <option value=""><?php esc_html_e("Select",'dtthemes-core');?></option>
                <?php foreach( array('repeat','repeat-x','repeat-y','no-repeat') as $option): ?>
                       <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgrepeat);?>><?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select how would you like to repeat the background image','dtthemes-core');?></p>
        </div>

        <div class="column one-third">
            <label><?php esc_html_e('Background Position','dtthemes-core');?></label>
            <?php $bgposition =  array_key_exists ( "sub-title-bg-position", $portfolio_settings ) ? $portfolio_settings ['sub-title-bg-position'] : ''; ?>
            <div class="clear"></div>
            <select class="dt-chosen-select" name="sub-title-bg-position">
                <option value=""><?php esc_html_e('Select','dtthemes-core');?></option>
                <?php foreach( array('top left','top center','top right','center left','center center','center right','bottom left','bottom center','bottom right') as $option): ?>
                    <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgposition);?>> <?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select how would you like to position the background','dtthemes-core');?></p>
        </div>

        <div class="column one-third last">
        <?php $label = 		esc_html__('Background Color','dtthemes-core');
              $name  =		'sub-title-bg-color';
              $value =  	array_key_exists ( 'sub-title-bg-color', $portfolio_settings ) ? $portfolio_settings ['sub-title-bg-color'] : '';
              $tooltip = 	esc_html__('Select background color for sub title section e.g. #f2d607','dtthemes-core'); ?>
              <label><?php echo esc_html($label);?></label>
              <div class="clear"></div>
              <?php redart_admin_color_picker("",$name,$value,'');?>
              <p class="note"><?php echo esc_html($tooltip);?></p>
        </div>
    </div>
</div><!-- 0. Sub title End-->

<!-- Layout -->
<div id="page-layout" class="custom-box">
    <div class="column one-sixth"><label><?php esc_html_e('Layout','dtthemes-core');?> </label></div>
    <div class="column five-sixth last">
        <ul class="bpanel-layout-set"><?php
			$portfolio_layout = array( 'content-full-width'=>'without-sidebar', 'with-left-sidebar'=>'left-sidebar', 'with-right-sidebar'=>'right-sidebar' , 'with-both-sidebar'=>'both-sidebar');
			$v =  array_key_exists("layout",$portfolio_settings) ?  $portfolio_settings['layout'] : 'content-full-width';
			foreach($portfolio_layout as $key => $value):
				$class = ($key == $v) ? " class='selected' " : "";
				echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
			endforeach;?>
        </ul>
        <input id="dttheme-page-layout" name="layout" type="hidden"  value="<?php echo esc_attr($v);?>"/>
        <p class="note"> <?php esc_html_e("You can choose between a left, right or no sidebar layout.",'dtthemes-core');?> </p>
    </div>
</div><!-- Layout End-->
<?php 
 $sb_layout = array_key_exists("layout",$portfolio_settings) ? $portfolio_settings['layout'] : 'content-full-width';
 $sidebar_both = $sidebar_left = $sidebar_right = '';
 if($sb_layout == 'content-full-width') {
	$sidebar_both = 'style="display:none;"'; 
 } elseif($sb_layout == 'with-left-sidebar') {
	$sidebar_right = 'style="display:none;"'; 
 } elseif($sb_layout == 'with-right-sidebar') {
	$sidebar_left = 'style="display:none;"'; 
 } 
?>
<div id="widget-area-options" <?php echo redart_wp_kses($sidebar_both);?>>
	<div id="left-sidebar-container" class="page-left-sidebar" <?php echo redart_wp_kses($sidebar_left); ?>>
		<!-- 2. Standard Sidebar Left Start -->
		<div id="page-commom-sidebar" class="sidebar-section custom-box">
			<div class="column one-sixth"><label><?php esc_html_e('Show Standard Left Sidebar','dtthemes-core');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("show-standard-sidebar-left",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("show-standard-sidebar-left",$portfolio_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-show-standard-sidebar-left" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-show-standard-sidebar-left" class="hidden" type="checkbox" name="show-standard-sidebar-left" value="true" <?php echo redart_wp_kses($checked);?>/>
				<p class="note"> <?php esc_html_e('Yes! to show "Standard Left Sidebar" on this page.','dtthemes-core');?> </p>
			 </div>
		</div><!-- Standard Sidebar Left End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Left Sidebar','dtthemes-core');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-left",$portfolio_settings) ? array_unique($portfolio_settings["widget-area-left"]) : array();
				$widgets = redart_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-left][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'dtthemes-core');?>"><?php
					echo "<option value=''></option>";
					foreach ( $widgets as $widget ) :
						$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
						$id = str_replace(" ", "-", $id);
						$selected = in_array( $id , $widgetareas ) ? " selected='selected' " : "";
						echo "<option value='{$id}' {$selected}>{$widget}</option>";
					endforeach;?>
				</select>
			</div>
		</div><!-- Choose Widget Areas End -->
	</div>
	<div id="right-sidebar-container" class="page-right-sidebar" <?php echo redart_wp_kses($sidebar_right); ?>>
		<!-- 3. Standard Sidebar Right Start -->
		<div id="page-commom-sidebar" class="sidebar-section custom-box page-right-sidebar">
			<div class="column one-sixth"><label><?php esc_html_e('Show Standard Right Sidebar','dtthemes-core');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("show-standard-sidebar-right",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("show-standard-sidebar-right",$portfolio_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-show-standard-sidebar-right" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-show-standard-sidebar-right" class="hidden" type="checkbox" name="show-standard-sidebar-right" value="true" <?php echo redart_wp_kses($checked);?>/>
				<p class="note"> <?php esc_html_e('Yes! to show "Standard Right Sidebar" on this page.','dtthemes-core');?> </p>
			 </div>
		</div><!-- Standard Sidebar Right End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Right Sidebar','dtthemes-core');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-right",$portfolio_settings) ? array_unique($portfolio_settings["widget-area-right"]) : array();
				$widgets = redart_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-right][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'dtthemes-core');?>"><?php
					echo "<option value=''></option>";
					foreach ( $widgets as $widget ) :
						$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
						$id = str_replace(" ", "-", $id);
						$selected = in_array( $id , $widgetareas ) ? " selected='selected' " : "";
						echo "<option value='{$id}' {$selected}>{$widget}</option>";
					endforeach;?>
				</select>
			</div>
		</div><!-- Choose Widget Areas End -->
	</div>
</div>

<!-- Portfolio Layout -->
<div id="portfolio-layout" class="custom-box">
	<div class="column one-sixth">
		<label><?php esc_html_e('Portfolio Layout','dtthemes-core');?> </label>
	</div>
	<div class="column five-sixth last">
		<ul class="dt-bpanel-layout-set"><?php
			$layouts = array (
				'full-width-portfolio'=>'portfolio-fullwidth',
				'with-left-portfolio'=>'portfolio-with-left-gallery',
				'with-right-portfolio'=>'portfolio-with-right-gallery',);

			$v = array_key_exists ( "portfolio-layout", $portfolio_settings ) ? $portfolio_settings ['portfolio-layout'] : 'full-width-portfolio';
			foreach ( $layouts as $key => $value ) {
				$class = ($key == $v) ? " class='selected' " : "";
				echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
			}?></ul>
			<?php $v = array_key_exists("portfolio-layout",$portfolio_settings) ? $portfolio_settings['portfolio-layout'] : 'full-width-portfolio';
			$cs = ( $v == "content-full-width") ? "style='display:none;'":"";?>
		<input id="dttheme-portfolio-layout" name="portfolio-layout" type="hidden"
			value="<?php echo esc_attr($v);?>" />
		<p class="note"> <?php esc_html_e("You can choose between a left, right or full width portfolio layout.",'dtthemes-core');?> </p>
	</div>
</div><!-- Portfolio Layout End-->

<!-- Medias -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php esc_html_e('Images','dtthemes-core');?> </label>
	</div>
	<div class="column five-sixth last">
		<div class="dt-media-btns-container">
			<a href="#" class="dt-open-media button button-primary"><?php esc_html_e( 'Click Here to Add Images', 'dtthemes-core' );?> </a>
			<a href="#" class="dt-add-video button button-primary"><?php esc_html_e( 'Click Here to Add Video', 'dtthemes-core' );?> </a>
		</div>
		<div class="clear"></div>

		<div class="dt-media-container">
			<ul class="dt-items-holder"><?php
			if (array_key_exists ( "items", $portfolio_settings )) {
				foreach ( $portfolio_settings ["items_thumbnail"] as $key => $thumbnail ) {
					$item = $portfolio_settings ['items'] [$key];
					$out = "";
					$name = "";
					$foramts = array (
							'jpg',
							'jpeg',
							'gif',
							'png' 
					);
					$parts = explode ( '.', $item );
					$ext = strtolower ( $parts [count ( $parts ) - 1] );
					if (in_array ( $ext, $foramts )) {
						$name = $portfolio_settings ['items_name'] [$key];
						$out .= "<li>";
						$out .= "<img src='{$thumbnail}' alt='' />";
						$out .= "<span class='dt-image-name'>{$name}</span>";
						$out .= "<input type='hidden' name='items[]' value='{$item}' />";
					} else {
						$name = "video";
						$out .= "<li>";
						$out .= "<span class='dt-video'></span>";
						$out .= "<input type='text' name='items[]' value='{$item}' />";
					}
					
					$out .= "<input class='dt-image-name' type='hidden' name='items_name[]' value='{$name}' />";
					$out .= "<input type='hidden' name='items_thumbnail[]' value='{$thumbnail}' />";
					$out .= "<span class='my_delete'></span>";
					$out .= "</li>";
					echo redart_wp_kses($out);
				}
			}
			?></ul>
		</div>
	</div>
</div><!-- Medias End -->

<!-- Show Slider -->
<div class="custom-box">
  <div class="column one-sixth">
      <label><?php esc_html_e('Enable Slider','dtthemes-core');?></label>
  </div>
  <div class="column five-sixth last">
      <?php $switchclass = array_key_exists("portfolio-slider",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
            $checked = array_key_exists("portfolio-slider",$portfolio_settings) ? ' checked="checked"' : '';?>
      <div data-for="dttheme-portfolio-slider" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
      <input id="dttheme-portfolio-slider" class="hidden" type="checkbox" name="dttheme-portfolio-slider" value="true" <?php echo redart_wp_kses($checked);?>/>
      <p class="note"> <?php esc_html_e('YES! to enable portfolio slider.','dtthemes-core');?> </p>
  </div>
</div><!-- Show Slider End-->

<!-- Additional Fields --><?php
// checking meta files from back-end
$fields = redart_opts_get( 'portfolio-custom-fields', array() );
$fields = array_unique(array_filter($fields));

if(!empty($fields)) : ?>
    <div class="custom-box">
        <div class="column one-sixth">
            <label><?php esc_html_e('Additional Fields','dtthemes-core');?></label>
        </div>
        <div class="column five-sixth last">
            <div class="meta-fields">
				<div class="column one-fifth" style="text-align:center;">
                	<strong><?php esc_html_e('Title','dtthemes-core');?></strong>
                </div>
				<div class="column one-sixth">
                	<strong><?php esc_html_e('Icon','dtthemes-core');?></strong>
                </div>
                <div class="column three-fifth last">
                	<strong><?php esc_html_e('Value','dtthemes-core');?></strong>
                </div>
				<div class="hr_invisible"></div><?php
                // getting filed values
                foreach($fields as $field):
                    $metaslug = strtolower(str_replace(' ', '-', $field)); ?>
                    <div class="column one-fifth"><?php
                        if(isset($portfolio_settings['meta_title'])):
                            $t = array_key_exists($metaslug, $portfolio_settings['meta_title']) ? 
                                        (!empty($portfolio_settings['meta_title'][$metaslug]) ? $portfolio_settings['meta_title'][$metaslug] : $field) : $field;
                        else:
                            $t = $field;				
                        endif;?>
                        <input type="text" name="dttheme-meta-title[<?php echo esc_attr($metaslug); ?>]" class="medium" style="width:98%; box-shadow:none; background-color:whitesmoke;" value="<?php echo esc_attr($t); ?>">
                    </div>
                    <div class="column one-sixth"><?php
                        $v = '';
                        if(isset($portfolio_settings['meta_class'])):
                            $v = array_key_exists($metaslug, $portfolio_settings['meta_class']) ?  $portfolio_settings['meta_class'][$metaslug] : '';
                        endif;?>
                        <input name="dttheme-meta-class[<?php echo esc_attr($metaslug); ?>]" class="medium" style="width:98%;" type="text" value="<?php echo esc_attr($v);?>" />
                    </div>
                    <div class="column three-fifth last"><?php
                        $v = '';
                        if(isset($portfolio_settings['meta_value'])):
                            $v = array_key_exists($metaslug, $portfolio_settings['meta_value']) ?  $portfolio_settings['meta_value'][$metaslug] : '';
                        endif;?>
                        <input name="dttheme-meta-value[<?php echo esc_attr($metaslug); ?>]" class="large" type="text" value="<?php echo esc_attr($v);?>" />
                    </div>
                    <div class="hr_invisible"></div><?php
                endforeach; ?>
            </div>
            <p class="note"> <?php esc_html_e("Here you can change Additional field title & values for this item.",'dtthemes-core');?> </p>
        </div>
    </div><?php
endif; ?><!-- Additional Fields End -->