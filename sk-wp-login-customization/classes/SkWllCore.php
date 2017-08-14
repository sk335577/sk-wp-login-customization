<?php

class SkWllCore extends SkWllCommon {

    public $css_cache = false;
    public $js_cache = false;

    public function __construct() {
        $this->css_cache = $this->skwllGetCSSCacheStatus(); //set the css cache

        add_action('plugins_loaded', array($this, 'skwllPluginLoadedHook'));
//        add_action('init', array($this, 'skwllInitHook'));
        add_action('admin_init', array($this, 'skwllAdminInitHook'));
        add_action('admin_menu', array($this, 'skwllAddPluginMenu'));
        add_action('admin_footer', array($this, 'skwllAdminPrintFooter'));
        add_action('admin_enqueue_scripts', array($this, 'skwllAdminEnqueueScripts')); /* add admin enqueue hook function */
        add_action('admin_print_scripts', array($this, 'skwllAdminPrintHeader'));
        add_action('wp_ajax_skwll_save_settings', array($this, 'skwllSaveAjaxSettings'));
        add_action('login_enqueue_scripts', array($this, 'skwllLoginLogo'),1);
    }

    public function skwllPluginLoadedHook() {

        if (load_plugin_textdomain(SK_WLL_SLUG, false, plugin_basename(SK_WLL_DIRECTORY_PATH) . '/languages')) {
            
        }
        else {
            
        }
    }

    public function skwllAdminInitHook() {
        $this->skwllRegisterSettings();
    }

    public function skwllAddPluginMenu() {
        add_options_page(SK_WLL_NAME, SK_WLL_NAME, ('manage_options'), SK_WLL_SLUG, array($this, 'skwllPluginDashboard'));
//        add_submenu_page(SK_WLL_SLUG, __('Settings', 'dnd-audio-player'), __('Settings', 'dnd-audio-player'), ('manage_options'), SK_WLL_SLUG . '-settings', array($this, 'skwllPluginSettings'));
    }

    public function skwllAdminEnqueueScripts($hook) {
//        if ($hook == 'toplevel_page_sk-dnd-audio-player') {
        $this->skwllRegisterJsNCss(); //register scripts and style
        $this->skwllEnqeueJsNCss(); //register scripts and style
//        }
    }

    public function skwllRegisterJsNCss() {
        wp_register_script('skwll-core-js', SK_WLL_URL_JS . '/skwll-core.js' . (!($this->js_cache) ? '?' . date('l jS \of F Y h:i:s A') : ''), array('jquery'), NULL, TRUE);
        wp_register_script('skwll-uikit', SK_WLL_URL_LIB . '/uikit/js/uikit.min.js' . (!($this->js_cache) ? '?' . date('l jS \of F Y h:i:s A') : ''), array('jquery'), NULL, TRUE);
        wp_register_script('skwll-notify-uikit', SK_WLL_URL_LIB . '/uikit/js/components/notify.min.js' . (!($this->js_cache) ? '?' . date('l jS \of F Y h:i:s A') : ''), array('jquery'), NULL, TRUE);                
        wp_register_style('sk-dndap-font-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,700,700italic,800', array(), NULL); //font-family: 'Open Sans', sans-serif;        
        wp_register_style('skwll-core', SK_WLL_URL_CSS . '/skwll-core.css' . (!($this->css_cache) ? '?' . date('l jS \of F Y h:i:s A') : ''), array(), NULL);
        wp_register_style('skwll-uikit-css', SK_WLL_URL_LIB . '/uikit/css/uikit.gradient.css' . (!($this->css_cache) ? '?' . date('l jS \of F Y h:i:s A') : ''), array(), NULL);
        wp_register_style('skwll-notify-css', SK_WLL_URL_LIB . '/uikit/css/components/notify.gradient.min.css' . (!($this->css_cache) ? '?' . date('l jS \of F Y h:i:s A') : ''), array(), NULL);
    }

    /**
     * 
     */
    public function skwllEnqeueJsNCss() {
        wp_enqueue_media();
        wp_enqueue_style('skwll-core');
        wp_enqueue_style('skwll-uikit-css');
        wp_enqueue_style('skwll-notify-css');
        wp_enqueue_script('skwll-core-js');
        wp_enqueue_script('skwll-uikit');
        wp_enqueue_script('skwll-notify-uikit');        
    }

    /**
     * include dashboard page i.e. the php file
     */
    public function skwllPluginDashboard() {
        $this->skwllIncludeTemplate('dashboard');
    }

    public function skwllAdminPrintHeader() {

        $this->skwllIncludeTemplate('dashboard-print-head-scripts');
    }

    public function skwllAdminPrintFooter() {
//        $this->skwllIncludeTemplate('dashboard-print-footer-scripts', 'back');
    }

    public function skwllGetPluginDisplayName() {
        return SK_WLL_COMMERCIAL_NAME;
    }

    public function skwllGetCSSCacheStatus() {
        return $this->css_cache;
    }

    public function skwllRegisterSettings() {
        register_setting('skwll-settings-group', 'skwll_login_img', array($this, 'skwllSanitizeSetting'));
        register_setting('skwll-settings-group', 'skwll_login_img_size', array($this, 'skwllSanitizeSetting'));
        register_setting('skwll-settings-group', 'skwll_login_img_size_custom', array($this, 'skwllSanitizeSetting'));
        register_setting('skwll-settings-group', 'skwll_login_img_position', array($this, 'skwllSanitizeSetting'));
        register_setting('skwll-settings-group', 'skwll_login_img_position_custom', array($this, 'skwllSanitizeSetting'));
        register_setting('skwll-settings-group', 'skwll_login_img_container_width', array($this, 'skwllSanitizeSetting'));
    }

    public function skwllSanitizeSetting($data) {
        return $data;
    }

    public function skwllLoginLogo() {
        $this->skwllIncludeTemplate('login-form-customization');
    }

    public function skwllSaveAjaxSettings() {

        $skwll_ajax_status = 0;
        if (DOING_AJAX) {
            if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'skwll_save_settings') {
                switch ($_REQUEST['skwll_action']) {
                    case 'skwll_save_login_settings':
                        if (empty($_REQUEST['skwll_login_img'])) {
                            delete_option('skwll_login_img');
                        }
                        else {
                            update_option('skwll_login_img', sanitize_text_field($_REQUEST['skwll_login_img']));
                        }
                        $skwll_ajax_status = 1;
                        break;
                    case 'skwll_save_login_form_logo_size':
                        if (empty($_REQUEST['skwll_login_img_size'])) {

                            delete_option('skwll_login_img_size');
                        }
                        else {
                            update_option('skwll_login_img_size', sanitize_text_field($_REQUEST['skwll_login_img_size']));
                            if (isset($_REQUEST['skwll_login_img_size_custom'])) {
                                update_option('skwll_login_img_size_custom', sanitize_text_field($_REQUEST['skwll_login_img_size_custom']));
                            }
                        }
                        $skwll_ajax_status = 1;
                        break;
                    case 'skwll_save_login_form_logo_position':
                        if (empty($_REQUEST['skwll_login_img_position'])) {
                            delete_option('skwll_login_img_position');
                        }
                        else {
                            update_option('skwll_login_img_position', sanitize_text_field($_REQUEST['skwll_login_img_position']));
                            if (isset($_REQUEST['skwll_login_img_position_custom'])) {
                                update_option('skwll_login_img_position_custom', sanitize_text_field($_REQUEST['skwll_login_img_position_custom']));
                            }
                        }
                        $skwll_ajax_status = 1;
                        break;
                    case 'skwll_save_login_form_logo_width':
                        if (empty($_REQUEST['skwll_login_img_container_width'])) {
                            delete_option('skwll_login_img_container_width');
                        }
                        else {
                            update_option('skwll_login_img_container_width', sanitize_text_field($_REQUEST['skwll_login_img_container_width']));
                        }
                        $skwll_ajax_status = 1;
                        break;
                    case 'skwll_save_login_form_logo_height':
                        if (empty($_REQUEST['skwll_login_img_container_height'])) {
                            delete_option('skwll_login_img_container_height');
                        }
                        else {
                            update_option('skwll_login_img_container_height', sanitize_text_field($_REQUEST['skwll_login_img_container_height']));
                        }
                        $skwll_ajax_status = 1;
                        break;
                    case 'skwll_save_login_form_logo_custom_css':
                        if (empty($_REQUEST['skwll_login_img_custom_css'])) {
                            delete_option('skwll_login_img_custom_css');
                        }
                        else {
                            update_option('skwll_login_img_custom_css', ($_REQUEST['skwll_login_img_custom_css']));
                        }
                        $skwll_ajax_status = 1;
                        break;


                    case 'skwll_save_login_background_img':
                        update_option('skwll_login_background_img', sanitize_text_field($_REQUEST['skwll_login_background_img']));




                        $skwll_ajax_status = 1;

                        break;


                    case 'skwll_save_login_background_img_size':
                        if (empty($_REQUEST['skwll_login_background_img_size'])) {
                            delete_option('skwll_login_background_img_size');
                        }
                        else {
                            update_option('skwll_login_background_img_size', sanitize_text_field($_REQUEST['skwll_login_background_img_size']));
                            if (isset($_REQUEST['skwll_login_background_img_size_custom'])) {
                                update_option('skwll_login_background_img_size_custom', sanitize_text_field($_REQUEST['skwll_login_background_img_size_custom']));
                            }
                        }
                        $skwll_ajax_status = 1;
                        break;
                    case 'skwll_save_login_background_img_position':
                        if (empty($_REQUEST['skwll_login_background_img_position'])) {
                            delete_option('skwll_login_background_img_position_custom');
                        }
                        else {
                            update_option('skwll_login_background_img_position', sanitize_text_field($_REQUEST['skwll_login_background_img_position']));
                            if (isset($_REQUEST['skwll_login_background_img_position_custom'])) {
                                update_option('skwll_login_background_img_position_custom', sanitize_text_field($_REQUEST['skwll_login_background_img_position_custom']));
                            }
                        }
                        $skwll_ajax_status = 1;
                        break;
                    case 'skwll_save_login_background_custom_css':
                        if (empty($_REQUEST['skwll_login_background_img_custom_css'])) {
                            delete_option('skwll_login_background_img_custom_css');
                        }
                        else {
                            update_option('skwll_login_background_img_custom_css', ($_REQUEST['skwll_login_background_img_custom_css']));
                        }
                        $skwll_ajax_status = 1;
                        break;


                    case 'skwll_save_more_css':
                        if (empty($_REQUEST['skwll_more_css'])) {
                            delete_option('skwll_more_css');
                        }
                        else {
                            update_option('skwll_more_css', ($_REQUEST['skwll_more_css']));
                        }
                        $skwll_ajax_status = 1;
                        break;



                    case 'skwll_save_custom_login_url':
                        update_option('skwll_custom_login_url', trim($_REQUEST['skwll_custom_login_url']));
                        $skwll_ajax_status = 1;
                        break;
                    case 'skwll_save_login_form_customization':

                        update_option('skwll_form_margin_status', sanitize_text_field($_REQUEST['skwll_form_margin_status']));
                        update_option('skwll_margin_left', sanitize_text_field($_REQUEST['skwll_margin_left']));
                        update_option('skwll_margin_right', sanitize_text_field($_REQUEST['skwll_margin_right']));
                        update_option('skwll_margin_top', sanitize_text_field($_REQUEST['skwll_margin_top']));
                        update_option('skwll_margin_bottom', sanitize_text_field($_REQUEST['skwll_margin_bottom']));

                        update_option('skwll_border_radius_status', sanitize_text_field($_REQUEST['skwll_border_radius_status']));
                        update_option('skwll_border_radius_left', sanitize_text_field($_REQUEST['skwll_border_radius_left']));
                        update_option('skwll_border_radius_bottom', sanitize_text_field($_REQUEST['skwll_border_radius_bottom']));
                        update_option('skwll_border_radius_right', sanitize_text_field($_REQUEST['skwll_border_radius_right']));
                        update_option('skwll_border_radius_top', sanitize_text_field($_REQUEST['skwll_border_radius_top']));

                        update_option('skwll_form_shadow_status', sanitize_text_field($_REQUEST['skwll_form_shadow_status']));
                        update_option('skwll_form_shadow_left', sanitize_text_field($_REQUEST['skwll_form_shadow_left']));
                        update_option('skwll_form_shadow_bottom', sanitize_text_field($_REQUEST['skwll_form_shadow_bottom']));
                        update_option('skwll_form_shadow_right', sanitize_text_field($_REQUEST['skwll_form_shadow_right']));
                        update_option('skwll_form_shadow_top', sanitize_text_field($_REQUEST['skwll_form_shadow_top']));

                        update_option('skwll_login_form_container_width', sanitize_text_field($_REQUEST['skwll_login_form_container_width']));
                        $skwll_ajax_status = 1;

                        break;
                    default:
                        break;
                }
            }
        }
        echo json_encode(array(
            'skwll_ajax_status' => $skwll_ajax_status
        ));
        die();
    }

    function skwllGetImage($post_id, $size = 'medium') {

        return wp_get_attachment_image_url(($post_id), $size);
    }

}
