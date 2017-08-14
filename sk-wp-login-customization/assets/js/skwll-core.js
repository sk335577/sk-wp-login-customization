jQuery(document).ready(function () {
    jQuery.fn.skwllPreviewUrl = function () {
        jQuery.ajax({
            url: 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=' + jQuery(this).attr('data-preview-login-url') + '&screenshot=true',
            context: this,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                data = data.screenshot.data.replace(/_/g, '/').replace(/-/g, '+');
                jQuery(this).attr('src', 'data:image/jpeg;base64,' + data);

            }
        });
    };
    jQuery('.skwll-custom-values').on('change', function () {
        var skwll_custom_values_el = jQuery(this).attr('data-custom-value-container');
        if (jQuery(this).val() == 'custom')
        {
            jQuery(skwll_custom_values_el).show();
        } else {

            jQuery(skwll_custom_values_el).hide();
        }
    });
    jQuery(".skwll-media-browser").click(function (e) {
        e.preventDefault();
        var result_value_save_class = jQuery(this).attr('data-save-result-element');
        var result_preview_class = jQuery(this).attr('data-media-file-preview');
        var valid_files = jQuery(this).attr('data-valid-file-types');
        var file_type = jQuery(this).attr('data-media-file-type');
        var upload_message = jQuery(this).attr('data-media-file-upload-message');
        valid_files = valid_files.split(',');

        var image = wp.media({
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
                .on('select', function (e) {
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_file = image.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    var subtype = uploaded_file.toJSON().subtype;
                    var file_type_found = 0;
                    jQuery(valid_files).each(function (i, val) {
                        if (val == subtype)
                        {
                            file_type_found = 1;
                        }
                    });
                    if (file_type_found == 1)
                    {
                        jQuery(result_value_save_class).val(uploaded_file.toJSON().id);
                        if (file_type == 'image') {
                            jQuery(result_preview_class).attr('src', uploaded_file.toJSON().url);
                        }
                        if (upload_message == 1)
                        {
                            UIkit.notify({
                                message: 'Image uploaded successfully!!!',
                                status: 'info',
                                timeout: 5000,
                                pos: 'bottom-right'
                            });
                        }
                    }
                    else {
                        UIkit.notify({
                            message: 'Not a valid image..',
                            status: 'info',
                            timeout: 5000,
                            pos: 'bottom-right'
                        });
                    }
                });
    });
    jQuery(".skwll-media-browser-remove").click(function (e) {
        var file_preview = jQuery(this).attr('data-media-file-preview');
        var file_save_element = jQuery(this).attr('data-save-result-element');
        if (jQuery(file_preview).attr('src') != skwll_no_img_url)
        {
            jQuery(file_preview).attr('src', skwll_no_img_url);
        } else {

        }
        jQuery(file_save_element).val('');

    });
    jQuery(".skwll-save").click(function (e) {

        var save_action = jQuery(this).attr('data-save-action');
        var data = new Object();
        switch (save_action)
        {
            case 'login-logo':
                data = {
                    'skwll_action': 'skwll_save_login_settings',
                    'action': 'skwll_save_settings',
                    'skwll_login_img': jQuery('.skwll-login-logo-image-save').val()
                };
                if ((jQuery('.skwll-login-img-custom-css').val()).trim() != '')
                {
                    data.skwll_login_img_custom_css = jQuery('.skwll-login-img-custom-css').val();
                }
                break;

            case 'login-form-logo-size':
                data = {
                    'skwll_action': 'skwll_save_login_form_logo_size',
                    'action': 'skwll_save_settings',
                    'skwll_login_img_size': jQuery('.skwll-login-logo-size').val(),
                };
                if (jQuery('.skwll-login-logo-size').val() == 'custom')
                {
                    data.skwll_login_img_size_custom = jQuery('.skwll-custom-size-login-logo-1').val() + ' ' + jQuery('.skwll-custom-size-login-logo-2').val();
                }
                break;

            case 'login-form-logo-position':
                data = {
                    'skwll_action': 'skwll_save_login_form_logo_position',
                    'action': 'skwll_save_settings',
                    'skwll_login_img_position': jQuery('.skwll-login-logo-position').val()
                };
                if (jQuery('.skwll-login-logo-position').val() == 'custom')
                {
                    data.skwll_login_img_position_custom = jQuery('.skwll-custom-position-login-logo-1').val() + ' ' + jQuery('.skwll-custom-position-login-logo-2').val();
                }
                break;

            case 'login-form-logo-width':
                data = {
                    'skwll_action': 'skwll_save_login_form_logo_width',
                    'action': 'skwll_save_settings',
                    'skwll_login_img_container_width': jQuery('.skwll-login-img-container-width').val()
                };
                break;

            case 'login-form-logo-height':
                data = {
                    'skwll_action': 'skwll_save_login_form_logo_height',
                    'action': 'skwll_save_settings',
                    'skwll_login_img_container_height': jQuery('.skwll-login-img-container-height').val()
                };
                break;
            case 'login-form-logo-custom-css':
                data = {
                    'skwll_action': 'skwll_save_login_form_logo_custom_css',
                    'action': 'skwll_save_settings',
                    'skwll_login_img_custom_css': jQuery('.skwll-login-img-custom-css').val()
                };
                break;

            case 'login-form-background-img':
                data = {
                    'skwll_action': 'skwll_save_login_background_img',
                    'action': 'skwll_save_settings',
                    'skwll_login_background_img': jQuery('.skwll-login-background-img-save').val(),
                };



                break;


            case 'skwll-login-background-size-save-action':
                data = {
                    'skwll_action': 'skwll_save_login_background_img_size',
                    'action': 'skwll_save_settings',
                    'skwll_login_background_img_size': jQuery('.skwll-login-background-size').val(),
                };
                if (jQuery('.skwll-login-background-size').val() == 'custom')
                {
                    data.skwll_login_background_img_size_custom = jQuery('.skwll-custom-size-login-background-1').val() + ' ' + jQuery('.skwll-custom-size-login-background-2').val();
                }
                break;

            case 'skwll-login-background-position-save-action':
                data = {
                    'skwll_action': 'skwll_save_login_background_img_position',
                    'action': 'skwll_save_settings',
                    'skwll_login_background_img_position': jQuery('.skwll-login-background-position').val(),
                };
                if (jQuery('.skwll-login-background-position').val() == 'custom')
                {
                    data.skwll_login_background_img_position_custom = jQuery('.skwll-custom-login-background-position-1').val() + ' ' + jQuery('.skwll-custom-login-background-position-2').val();
                }
                break;
            case 'skwll-login-background-custom-css-save-action':
                data = {
                    'skwll_action': 'skwll_save_login_background_custom_css',
                    'action': 'skwll_save_settings',
                    'skwll_login_background_img_custom_css': jQuery('.skwll-login-background-img-custom-css').val(),
                };
                break;
            case 'skwll-login-form-margin-save-action':
                data = {
                    'skwll_action': 'skwll_save_login_form_margin',
                    'action': 'skwll_save_settings',
                    'skwll_login_background_img_custom_css': jQuery('.skwll-login-background-img-custom-css').val(),
                };
                break;



            case 'more-css':
                data = {
                    'skwll_action': 'skwll_save_more_css',
                    'action': 'skwll_save_settings',
                    'skwll_more_css': jQuery('.skwll-more-css').val()
                };
                break;
            case 'custom-login-url':
                data = {
                    'skwll_action': 'skwll_save_custom_login_url',
                    'action': 'skwll_save_settings',
                    'skwll_custom_login_url': jQuery('.skwll-custom-login-url').val()
                };
                break;
            case 'login-form-customization':
                data = {
                    'skwll_action': 'skwll_save_login_form_customization',
                    'action': 'skwll_save_settings',
                    'skwll_margin_left': jQuery('.skwll-login-form-margin-left').val(),
                    'skwll_margin_right': jQuery('.skwll-login-form-margin-right').val(),
                    'skwll_margin_top': jQuery('.skwll-login-form-margin-top').val(),
                    'skwll_margin_bottom': jQuery('.skwll-login-form-margin-bottom').val(),
                    'skwll_border_radius_left': jQuery('.skwll-login-form-border-radius-left').val(),
                    'skwll_border_radius_bottom': jQuery('.skwll-login-form-border-radius-bottom').val(),
                    'skwll_border_radius_right': jQuery('.skwll-login-form-border-radius-right').val(),
                    'skwll_border_radius_top': jQuery('.skwll-login-form-border-radius-top').val(),
                    'skwll_form_shadow_status': function () {
                        if (jQuery('.skwll-login-form-shadow-status').is(':checked')) {
                            return jQuery('.skwll-login-form-shadow-status').val();
                        } else {
                            return 0;
                        }
                    },
                    'skwll_form_shadow_left': jQuery('.skwll-login-form-shadow-left').val(),
                    'skwll_form_shadow_bottom': jQuery('.skwll-login-form-shadow-bottom').val(),
                    'skwll_form_shadow_right': jQuery('.skwll-login-form-shadow-right').val(),
                    'skwll_form_shadow_top': jQuery('.skwll-login-form-shadow-top').val(),
                    'skwll_login_form_container_width': jQuery('.skwll-login-form-container-width').val(),
                };
                break;
        }
        jQuery.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function (xhr) {
                UIkit.notify({
                    message: '<i class="uk-icon-spinner uk-icon-spin"></i> Saving your settings...',
                    status: 'info',
                    timeout: 0,
                    pos: 'bottom-right'
                });
            },
            complete: function (jqXHR, textStatus) {

            },
            success: function (data, textStatus, jqXHR) {
                var message = "Your settings has been saved";
                if (data.skwll_ajax_status == 1)
                {
                    jQuery('.uk-notify .uk-close').trigger('click');

                } else {
                    jQuery('.uk-notify .uk-close').trigger('click');
                    message = "Not able to save your settings.";
                }
                UIkit.notify({
                    message: message,
                    status: 'info',
                    timeout: 3000,
                    pos: 'bottom-right'
                });
//                jQuery('.skwll-preview-login').skwllPreviewUrl();
            }
        });
    });
    jQuery('.skwll-custom-values').trigger('change');
//    jQuery('.skwll-preview-login').skwllPreviewUrl();
});

