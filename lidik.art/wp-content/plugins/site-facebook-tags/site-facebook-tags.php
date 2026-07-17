<?php
/**
 * Plugin Name: Facebook Site Share Tags
 * Plugin URI:
 * Description: This plugin adds some Facebook Open Graph tags to site.
 * Version: 1.0.0
 * Author: Viktor Kukurba
 * Author URI:
 * License: GPL2
 */


// add_action( 'wp_head', 'facebook_tags' );
function facebook_tags()
{
    ?>
    <meta property="fb:app_id" content="<?php echo get_option('fb_site_app_id') ?>"/>
    <meta property="og:title" content="<?php echo get_option('fb_site_title') ?>"/>
    <meta property="og:site_name" content="<?php echo get_option('fb_site_name') ?>"/>
    <meta property="og:url" content="<?php echo get_option('fb_site_url') ?>"/>
    <meta property="og:description" content="<?php echo get_option('fb_site_description') ?>"/>
    <meta property="og:image" content="<?php echo get_option('fb_site_image') ?>"/>
    <?php
}

add_action('admin_menu', 'facebook_site_share_menu');
add_action('admin_init', 'facebook_site_share_settings');

function facebook_site_share_settings() {
    register_setting('facebook-site-share-data', 'fb_site_app_id');
    register_setting('facebook-site-share-data', 'fb_site_title');
    register_setting('facebook-site-share-data', 'fb_site_name');
    register_setting('facebook-site-share-data', 'fb_site_url');
    register_setting('facebook-site-share-data', 'fb_site_description');
    register_setting('facebook-site-share-data', 'fb_site_image');
}

add_action('admin_enqueue_scripts', 'add_fb_share_scripts' );
add_action('admin_enqueue_style', 'add_fb_share_styles' );

function facebook_site_share_menu() {
    add_menu_page('Site facebook share settings', 'Facebook share data', 'administrator', 'my-plugin-settings', 'fb_site_share_settings_page', 'dashicons-admin-generic');
}

function add_fb_share_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('wp_image_upload', plugin_dir_url(__FILE__) . '/image-upload.js');
    wp_enqueue_style('wp_fb_site_share_settings_style', plugin_dir_url(__FILE__) . '/style.css');
}

function site_facebook_tags_activate(){
    update_option('fb_site_url', get_site_url());
    update_option('fb_site_name', get_bloginfo());
    update_option('fb_site_title', get_bloginfo('title'));
    update_option('fb_site_description', get_bloginfo('description'));
}

register_activation_hook( __FILE__, 'site_facebook_tags_activate' );

function fb_site_share_settings_page() {
    ?>
    <div class="wrap fb_share_settings">
        <h2>Facebook share details</h2>
        <form method="post" action="options.php">
            <?php settings_fields('facebook-site-share-data'); ?>
            <?php do_settings_sections('facebook-site-share-data'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Title</th>
                    <td><input type="text" name="fb_site_title"
                               value="<?php echo esc_attr(get_option('fb_site_title')); ?>"/></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Site name</th>
                    <td><input type="text" name="fb_site_name"
                               value="<?php echo esc_attr(get_option('fb_site_name')); ?>"/></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Site url</th>
                    <td><input type="text" name="fb_site_url"
                               value="<?php echo esc_attr(get_option('fb_site_url')); ?>"/></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Description</th>
                    <td><textarea name="fb_site_description"><?php echo esc_attr(get_option('fb_site_description')); ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Facebook App Id</th>
                    <td><input type="text" name="fb_site_app_id" value="<?php echo esc_attr(get_option('fb_site_app_id')); ?>"/>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Site share image</th>
                    <td>
                        <input type="hidden" id="image-hidden-field" name="fb_site_image"
                               value="<?php echo esc_attr(get_option('fb_site_image')) ?>"/>
                        <input type="button" class="button" id="image-upload-button" value="<?php if (get_option('fb_site_image')) echo 'Change Image'; else echo 'Add Image'?>">
                        <input type="button" class="button <?php if (!get_option('fb_site_image')) echo 'hidden' ?>" id="image-delete-button" value="Remove Image">
                    </td>
                </tr>
            </table>
            <img id="display-image" src="<?php echo esc_attr(get_option('fb_site_image')) ?>">
            <div class="clear-fix"></div>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}