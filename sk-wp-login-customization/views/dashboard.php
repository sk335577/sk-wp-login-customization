<div class="uk-grid skwll-container">
    <div class="uk-width-1-1 uk-text-center"><h1 class="uk-article-title uk-text-center"><?php echo SK_WLL_NAME; ?></h1></div>
    <div class="uk-width-1-1 uk-margin-top">
        <div class="uk-grid" data-uk-grid>
            <!--data-uk-grid-->
            <div class="uk-width-medium-1-3 skwll-widgets-margin-bottom">                
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"> <?php echo __('Login Form Logo Image', 'sk-wll') ?></h3>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-1">
                            <img src="<?php
                            $skwll_login_image = get_option('skwll_login_img');
                            if (!empty($skwll_login_image)) {
                                echo $this->skwllGetImage($skwll_login_image, 'full');
                            }
                            else {
                                echo SK_WLL_NO_IMG_URL;
                            }
                            ?>" class="skwll-full-width skwll-media-file-preview-back uk-thumbnail " alt=""/>

                            <input type="hidden" class="skwll-login-logo-image-save" value="<?php echo $skwll_login_image; ?>" />
                        </div> 
                        <div class="uk-width-medium-1-1">
                            <small class="skwll-small-hints"><?php echo __('Upload your logo.This logo will be displayed on the login screen.Remove the logo to use the default wordpress logo.', 'sk-wll'); ?></small>
                        </div>
                        <div class="uk-width-medium-1-1 uk-margin-top">
                            <div class="uk-button-group uk-align-center uk-flex-center uk-text-center">
                                <button class="uk-button skwll-media-browser uk-button-primary" data-media-file-upload-message="1"  data-media-file-type="image" data-media-file-preview=".skwll-media-file-preview-back" data-save-result-element=".skwll-login-logo-image-save" data-valid-file-types="png,jpg,jpeg"><?php echo __('Upload', 'sk-wll') ?></button>
                                <button class="uk-button uk-button-danger skwll-media-browser-remove" data-media-file-preview=".skwll-media-file-preview-back" data-save-result-element=".skwll-login-logo-image-save"><?php echo __('Remove', 'sk-wll') ?></button>
                                <button class="uk-button uk-button-success skwll-save" data-save-action="login-logo"><?php echo __('Save', 'sk-wll') ?></button>
                            </div>
                        </div>                                            

                    </div>
                </div>
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Login Form Logo Size ', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">
                        <?php
                        $skwll_login_img_size = get_option('skwll_login_img_size');
                        ?>
                        <select style="width: 100%;"  class="skwll-custom-values skwll-login-logo-size" data-custom-value-container=".skwll-custom-size">
                            <option value="" ><?php echo __('Not Set ', 'sk-wll'); ?></option>
                            <option value="auto" <?php
                            if (!empty($skwll_login_img_size) && $skwll_login_img_size == 'auto') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Auto ', 'sk-wll'); ?></option>
                            <option value="contain" <?php
                            if (!empty($skwll_login_img_size) && $skwll_login_img_size == 'contain') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Contain ', 'sk-wll'); ?></option>
                            <option value="cover" <?php
                            if (!empty($skwll_login_img_size) && $skwll_login_img_size == 'cover') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Cover ', 'sk-wll'); ?></option>
                            <option value="inherit" <?php
                            if (!empty($skwll_login_img_size) && $skwll_login_img_size == 'inherit') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Inherit ', 'sk-wll'); ?></option>

                            <option value="custom" <?php
                            if (!empty($skwll_login_img_size) && $skwll_login_img_size == 'custom') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Custom ', 'sk-wll'); ?></option>
                        </select>
                        <small class="skwll-small-hints"><?php echo __('Select size of the image, You can also select a custom size.Use Not Set to use default wordpress logo size.', 'sk-wll'); ?></small>
                        <br/>
                        <div class="skwll-custom-size uk-grid " style="<?php
                        if (!empty($skwll_login_img_size) && $skwll_login_img_size == 'custom') {
                            
                        }
                        else {
                            echo "display: none";
                        }
                        ?>">
                                 <?php
                                 $skwll_login_img_size_custom = get_option('skwll_login_img_size_custom');
                                 $skwll_login_img_size_custom_data = explode(' ', $skwll_login_img_size_custom);
                                 ?>
                            <div class="uk-width-medium-1-1 "><input class="skwll-custom-size-login-logo-1" style="width: 100%" type="text" placeholder="Width eg.1px or 1% or auto" value="<?php
                                if (isset($skwll_login_img_size_custom_data[0]) && !empty($skwll_login_img_size_custom_data[0])) {
                                    echo $skwll_login_img_size_custom_data[0];
                                }
                                ?>"/></div>
                            <div class="uk-width-medium-1-1"><input  class="skwll-custom-size-login-logo-2"  style="width: 100%" type="text" placeholder="Height eg.1px or 1% or auto"  value="<?php
                                if (isset($skwll_login_img_size_custom_data[1]) && !empty($skwll_login_img_size_custom_data[1])) {
                                    echo $skwll_login_img_size_custom_data[1];
                                }
                                ?>"/></div>
                            <small class="skwll-small-hints">
                                <?php echo __('Sets the width and height of the background image. The first value sets the width, the second value sets the height. If only one value is given, the second is set to "auto"', 'sk-wll'); ?></small>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1 uk-margin-top">
                        <div class="uk-button-group uk-align-center uk-flex-center uk-text-right">
                            <button class="uk-button uk-button-success skwll-save" data-save-action="login-form-logo-size"><?php echo __('Save', 'sk-wll') ?></button>
                        </div>
                    </div>
                </div>
                <div class="uk-panel uk-panel-box">
                    <?php
                    $skwll_login_img_position = get_option('skwll_login_img_position');
                    ?>
                    <h3 class="uk-panel-title"><?php echo __('Login Form Logo Position ', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-1">
                                <select  class="skwll-custom-values skwll-login-logo-position" data-custom-value-container=".skwll-custom-postion" style="width: 100%">
                                    <option value="" ><?php echo __('Not Set ', 'sk-wll'); ?></option>
                                    <option value="0% 0%" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == '0% 0%') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Default ', 'sk-wll'); ?></option>
                                    <option value="initial" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'initial') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Initial ', 'sk-wll'); ?></option>
                                    <option value="inherit" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'inherit') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Inherit ', 'sk-wll'); ?></option>
                                    <option value="left top"  <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'left top') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Left-Top ', 'sk-wll'); ?></option>
                                    <option value="left center"  <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'left center') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Left-Center ', 'sk-wll'); ?></option>
                                    <option value="left bottom" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'left bottom') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Left-Bottom ', 'sk-wll'); ?></option>
                                    <option value="right top" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'right top') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Right-Top ', 'sk-wll'); ?></option>
                                    <option value="right center" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'right center') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Right-Center ', 'sk-wll'); ?></option>
                                    <option value="right bottom" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'right bottom') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Right-Bottom ', 'sk-wll'); ?></option>
                                    <option value="center top" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'center top') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Center-Top ', 'sk-wll'); ?></option>
                                    <option value="center center" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'center center') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Center-Center ', 'sk-wll'); ?></option>
                                    <option value="center bottom" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'center bottom') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Center-Bottom ', 'sk-wll'); ?></option>
                                    <option value="custom" <?php
                                    if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'custom') {
                                        echo " selected='' ";
                                    }
                                    ?>><?php echo __('Custom ', 'sk-wll'); ?></option>
                                </select>   
                                <small class="skwll-small-hints"><?php echo __('Select position of the image, You can also select a custom position.Use default to use default wordpress logo position.', 'sk-wll'); ?></small>
                            </div>

                            <div class="skwll-custom-postion uk-grid " style="<?php
                            if (!empty($skwll_login_img_position) && $skwll_login_img_position == 'custom') {
                                
                            }
                            else {
                                echo "display: none";
                            }
                            ?>">
                                     <?php
                                     $skwll_login_img_position_custom = get_option('skwll_login_img_position_custom');
                                     $skwll_login_img_position_custom = explode(' ', $skwll_login_img_position_custom);
                                     ?>
                                <div class="uk-width-medium-1-1 "><input style="width: 100%" class="skwll-custom-position-login-logo-1" type="text" placeholder="Horizontal  eg.1px or 1% or auto" value="<?php
                                    if (isset($skwll_login_img_position_custom[0]) && !empty($skwll_login_img_position_custom[0])) {
                                        echo $skwll_login_img_position_custom[0];
                                    }
                                    ?>"/></div>
                                <div class="uk-width-medium-1-1"><input style="width: 100%" class="skwll-custom-position-login-logo-2" type="text" placeholder="Vertical eg.1px or 1% or auto" value="<?php
                                    if (isset($skwll_login_img_position_custom[1]) && !empty($skwll_login_img_position_custom[1])) {
                                        echo $skwll_login_img_position_custom[1];
                                    }
                                    ?>"/></div>
                                <small class="skwll-small-hints">
                                    <?php echo __('The first value is the horizontal position and the second value is the vertical. The top left corner is 0 0. Units can be pixels (0px 0px) or any other CSS units. If you only specify one value, the other value will be 50%. You can mix % and positions', 'sk-wll'); ?></small>
                            </div>
                            <div class="uk-width-medium-1-1 uk-margin-top">
                                <div class="uk-button-group uk-align-center uk-flex-center uk-text-right">
                                    <button class="uk-button uk-button-success skwll-save" data-save-action="login-form-logo-position"><?php echo __('Save', 'sk-wll') ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Login Form Logo Width ', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">
                        <?php
                        $skwll_login_img_container_width = get_option('skwll_login_img_container_width');
                        ?>
                        <input class="skwll-login-img-container-width" type="text" value="<?php
                        if (!empty($skwll_login_img_container_width)) {
                            echo $skwll_login_img_container_width;
                        }
                        ?>" style="" placeholder="Eg. 100px or 100%"/>
                        <small class="skwll-small-hints"><?php echo __('Width of the element which contains the logo.Also please adjust logo size to get full width logo.Leave this empty to use the default wordpress width.', 'sk-wll'); ?></small>                       
                    </div>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-button-group uk-align-center uk-flex-center uk-text-right">
                            <button class="uk-button uk-button-success skwll-save" data-save-action="login-form-logo-width"><?php echo __('Save', 'sk-wll') ?></button>
                        </div>
                    </div>
                </div>
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Login Form Logo Height ', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">
                        <?php
                        $skwll_login_img_container_height = get_option('skwll_login_img_container_height');
                        ?>
                        <input class="skwll-login-img-container-height" type="text" value="<?php
                        if (!empty($skwll_login_img_container_height)) {
                            echo $skwll_login_img_container_height;
                        }
                        ?>" style="" placeholder="Eg. 100px"/>
                        <small class="skwll-small-hints"><?php echo __('Height of the element which contains the logo.Leave this empty to use the default wordpress height.', 'sk-wll'); ?></small>
                    </div>
                    <div class="uk-width-medium-1-1 uk-margin-top">
                        <div class="uk-button-group uk-align-center uk-flex-center uk-text-right">
                            <button class="uk-button uk-button-success skwll-save" data-save-action="login-form-logo-height"><?php echo __('Save', 'sk-wll') ?></button>
                        </div>
                    </div>
                </div>
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Login Form Logo Custom CSS ', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">

                        <?php
                        $skwll_login_img_custom_css = get_option('skwll_login_img_custom_css');
                        ?>
                        <textarea class="skwll-login-img-custom-css" value="" style="width: 100%" rows="5" placeholder="Eg. background-size:cover;"><?php
                            if (!empty($skwll_login_img_custom_css)) {
                                echo ($skwll_login_img_custom_css);
                            }
                            ?></textarea>
                        <small class="skwll-small-hints"><?php echo __('Enter your custom css for logo image , Do not use classes or ids..', 'sk-wll'); ?></small>
                    </div> 
                    <div class="uk-width-medium-1-1 uk-margin-top">
                        <div class="uk-button-group uk-align-center uk-flex-center uk-text-right">
                            <button class="uk-button uk-button-success skwll-save" data-save-action="login-form-logo-custom-css"><?php echo __('Save', 'sk-wll') ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-3 skwll-widgets-margin-bottom">
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Login Page Background', 'sk-wll') ?></h3> 
                    <div class="uk-width-medium-1-1">
                        <img src="<?php
                        $skwll_login_background_img = get_option('skwll_login_background_img');
                        if (!empty($skwll_login_background_img)) {
                            echo $this->skwllGetImage($skwll_login_background_img, 'full');
                        }
                        else {
                            echo SK_WLL_NO_IMG_URL;
                        }
                        ?>" class="skwll-full-width skwll-media-file-preview-login-background uk-thumbnail " alt=""/>
                        <input type="hidden" class="skwll-login-background-img-save" value="<?php echo $skwll_login_background_img; ?>" />
                    </div> 
                    <div class="uk-width-medium-1-1">
                        <small class="skwll-small-hints"><?php echo __('Upload your background image, This image will be displayed as a background image on your login form.', 'sk-wll'); ?></small>
                    </div>
                    <div class="uk-width-medium-1-1 uk-margin-top">
                        <div class="uk-button-group skwll-margin-bottom-none-force uk-align-center uk-flex-center uk-text-center">
                            <button class="uk-button skwll-media-browser uk-button-primary" data-media-file-upload-message="1"  data-media-file-type="image" data-media-file-preview=".skwll-media-file-preview-login-background" data-save-result-element=".skwll-login-background-img-save" data-valid-file-types="png,jpg,jpeg"><?php echo __('Upload', 'sk-wll') ?></button>
                            <button class="uk-button uk-button-danger skwll-media-browser-remove" data-media-file-preview=".skwll-media-file-preview-login-background" data-save-result-element=".skwll-login-background-img-save"><?php echo __('Remove', 'sk-wll') ?></button>
                            <button class="uk-button uk-button-success skwll-save" data-save-action="login-form-background-img"><?php echo __('Save', 'sk-wll') ?></button>
                        </div>
                    </div>
                </div>


                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Login Page Background Size ', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">                          
                        <?php
                        $skwll_login_background_img_size = get_option('skwll_login_background_img_size');
                        ?>
                        <select style="width: 100%;"  class="skwll-custom-values skwll-login-background-size" data-custom-value-container=".skwll-custom-login-background-size">
                            <option value="" ><?php echo __('Not Set ', 'sk-wll'); ?></option>
                            <option value="auto" <?php
                            if (!empty($skwll_login_background_img_size) && $skwll_login_background_img_size == 'auto') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Auto ', 'sk-wll'); ?></option>
                            <option value="contain" <?php
                            if (!empty($skwll_login_background_img_size) && $skwll_login_background_img_size == 'contain') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Contain ', 'sk-wll'); ?></option>
                            <option value="cover" <?php
                            if (!empty($skwll_login_background_img_size) && $skwll_login_background_img_size == 'cover') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Cover ', 'sk-wll'); ?></option>
                            <option value="inherit" <?php
                            if (!empty($skwll_login_background_img_size) && $skwll_login_background_img_size == 'inherit') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Inherit ', 'sk-wll'); ?></option>

                            <option value="custom" <?php
                            if (!empty($skwll_login_background_img_size) && $skwll_login_background_img_size == 'custom') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Custom ', 'sk-wll'); ?></option>
                        </select>
                        <small class="skwll-small-hints"><?php echo __('Select size of the image, You can also select a custom size.Use Not Set to use default wordpress logo size.', 'sk-wll'); ?></small>
                        <br/>
                        <div class="skwll-custom-login-background-size uk-grid " style="<?php
                        if (!empty($skwll_login_background_img_size) && $skwll_login_background_img_size == 'custom') {
                            
                        }
                        else {
                            echo "display: none";
                        }
                        ?>">
                                 <?php
                                 $skwll_login_background_img_size_custom = get_option('skwll_login_background_img_size_custom');
                                 $skwll_login_background_img_size_custom_data = explode(' ', $skwll_login_background_img_size_custom);
                                 ?>
                            <div class="uk-width-medium-1-1 "><input class="skwll-custom-size-login-background-1" style="width: 100%" type="text" placeholder="Width eg.1px or 1% or auto" value="<?php
                                if (isset($skwll_login_background_img_size_custom_data[0]) && !empty($skwll_login_background_img_size_custom_data[0])) {
                                    echo $skwll_login_background_img_size_custom_data[0];
                                }
                                ?>"/></div>
                            <div class="uk-width-medium-1-1"><input  class="skwll-custom-size-login-background-2"  style="width: 100%" type="text" placeholder="Height eg.1px or 1% or auto"  value="<?php
                                if (isset($skwll_login_background_img_size_custom_data[1]) && !empty($skwll_login_background_img_size_custom_data[1])) {
                                    echo $skwll_login_background_img_size_custom_data[1];
                                }
                                ?>"/></div>
                            <small class="skwll-small-hints">
                                <?php echo __('Sets the width and height of the background image. The first value sets the width, the second value sets the height. If only one value is given, the second is set to "auto"', 'sk-wll'); ?></small>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1 uk-margin-top">
                        <div class="uk-button-group skwll-margin-bottom-none-force uk-align-center uk-flex-center uk-text-right">
                            <button class="uk-button uk-button-success skwll-save" data-save-action="skwll-login-background-size-save-action"><?php echo __('Save', 'sk-wll') ?></button>
                        </div>
                    </div>
                </div>

                <div class="uk-panel uk-panel-box">
                    <?php
                    $skwll_login_background_img_position = get_option('skwll_login_background_img_position');
                    ?>
                    <h3 class="uk-panel-title"><?php echo __('Login Page Background Position ', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">
                        <select  class="skwll-custom-values skwll-login-background-position" data-custom-value-container=".skwll-custom-login-background-postion" style="width: 100%">
                            <option value="" ><?php echo __('Not Set ', 'sk-wll'); ?></option>
                            <option value="0% 0%" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == '0% 0%') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Default ', 'sk-wll'); ?></option>                                        
                            <option value="initial" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'initial') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Initial ', 'sk-wll'); ?></option>
                            <option value="inherit" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'inherit') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Inherit ', 'sk-wll'); ?></option>
                            <option value="left top"  <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'left top') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Left-Top ', 'sk-wll'); ?></option>
                            <option value="left center"  <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'left center') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Left-Center ', 'sk-wll'); ?></option>
                            <option value="left bottom" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'left bottom') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Left-Bottom ', 'sk-wll'); ?></option>
                            <option value="right top" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'right top') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Right-Top ', 'sk-wll'); ?></option>
                            <option value="right center" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'right center') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Right-Center ', 'sk-wll'); ?></option>
                            <option value="right bottom" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'right bottom') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Right-Bottom ', 'sk-wll'); ?></option>
                            <option value="center top" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'center top') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Center-Top ', 'sk-wll'); ?></option>
                            <option value="center center" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'center center') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Center-Center ', 'sk-wll'); ?></option>
                            <option value="center bottom" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'center bottom') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Center-Bottom ', 'sk-wll'); ?></option>
                            <option value="custom" <?php
                            if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'custom') {
                                echo " selected='' ";
                            }
                            ?>><?php echo __('Custom ', 'sk-wll'); ?></option>
                        </select>   
                        <small class="skwll-small-hints"><?php echo __('Select position of the image, You can also select a custom position.', 'sk-wll'); ?></small>                   
                        <div class="skwll-custom-login-background-postion uk-grid " style="<?php
                        if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'custom') {
                            
                        }
                        else {
                            echo "display: none";
                        }
                        ?>">
                                 <?php
                                 $skwll_login_background_img_position_custom = get_option('skwll_login_background_img_position_custom');
                                 $skwll_login_background_img_position_custom = explode(' ', $skwll_login_background_img_position_custom);
                                 ?>
                            <div class="uk-width-medium-1-1 "><input style="width: 100%" class="skwll-custom-login-background-position-1" type="text" placeholder="Horizontal  eg.1px or 1% or auto" value="<?php
                                if (isset($skwll_login_background_img_position_custom[0]) && !empty($skwll_login_background_img_position_custom[0])) {
                                    echo $skwll_login_background_img_position_custom[0];
                                }
                                ?>"/></div>
                            <div class="uk-width-medium-1-1"><input style="width: 100%" class="skwll-custom-login-background-position-2" type="text" placeholder="Vertical eg.1px or 1% or auto" value="<?php
                                if (isset($skwll_login_background_img_position_custom[1]) && !empty($skwll_login_background_img_position_custom[1])) {
                                    echo $skwll_login_background_img_position_custom[1];
                                }
                                ?>"/></div>
                            <small class="skwll-small-hints">
                                <?php echo __('The first value is the horizontal position and the second value is the vertical. The top left corner is 0 0. Units can be pixels (0px 0px) or any other CSS units. If you only specify one value, the other value will be 50%. You can mix % and positions', 'sk-wll'); ?></small>
                        </div>
                        <div class="uk-width-medium-1-1 uk-margin-top">
                            <div class="uk-button-group uk-align-center uk-flex-center uk-text-right">
                                <button class="uk-button uk-button-success skwll-save" data-save-action="skwll-login-background-position-save-action"><?php echo __('Save', 'sk-wll') ?></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Login Page Background Custom CSS ', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">


                        <?php
                        $skwll_login_background_img_custom_css = get_option('skwll_login_background_img_custom_css');
                        ?>
                        <textarea class="skwll-login-background-img-custom-css" value="" style="width: 100%" rows="5" placeholder="Eg. background-size:cover;"><?php
                            if (!empty($skwll_login_background_img_custom_css)) {
                                echo ($skwll_login_background_img_custom_css);
                            }
                            ?></textarea>
                        <small class="skwll-small-hints"><?php echo __('Enter your custom css for background image , Do not use classes or ids..', 'sk-wll'); ?></small>
                        <div class="uk-width-medium-1-1 uk-margin-top">
                            <div class="uk-button-group uk-align-center uk-flex-center uk-text-right">
                                <button class="uk-button uk-button-success skwll-save" data-save-action="skwll-login-background-custom-css-save-action"><?php echo __('Save', 'sk-wll') ?></button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="uk-width-medium-1-3 skwll-widgets-margin-bottom" style="display: none">
                <div class="uk-panel uk-panel-box">
                    <?php
                    $skwll_custom_login_url = get_option('skwll_custom_login_url');
                    ?>
                    <h3 class="uk-panel-title"><?php echo __('Preview Login Form', 'sk-wll'); ?></h3>
                    <img class="skwll-preview-login" src="<?php
                    if (!empty($skwll_custom_login_url)) {
                        echo $skwll_custom_login_url;
                    }
                    else {
                        echo SK_WLL_NO_IMG_URL;
                    }
                    ?>" data-preview-login-url="<?php echo admin_url('wp-login.php'); ?>" style="width:100%"/>
                         <!--<a href="" data-uk-lightbox> <img class="skwll-preview-login" src="<?php // echo SK_WLL_NO_IMG_URL;                                                    ?>" data-preview-login-url="http://google.com" style="width:100%"/></a>-->
                    <input type="text"  value="<?php
                    if (!empty($skwll_custom_login_url)) {
                        echo $skwll_custom_login_url;
                    }
                    ?>" class="skwll-custom-login-url"  placeholder="Enter your custom admin url"/>
                    <div class="uk-button-group uk-align-center uk-flex-center uk-text-center uk-margin-top">
                        <button class="uk-button uk-button-success skwll-save" data-save-action="custom-login-url"><?php echo __('Save', 'sk-wll') ?></button>
                    </div>
                </div>

                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title skwll-margin-bottom-none-force"><?php echo __('Login Form Margin/Alignment', 'sk-wll'); ?></h3>
                    <div class="uk-width-medium-1-1">
                        <p>
                            <label><?php echo __('Margin Top', 'sk-wll'); ?>:</label>
                            <input type="text"  value="<?php
                            $skwll_margin_top = get_option('skwll_margin_top');
                            if (!empty($skwll_margin_top)) {
                                echo $skwll_margin_top;
                            }
                            ?>" class="skwll-login-form-margin-top"  placeholder="Eg. 10px"/>
                        </p>
                        <p>
                            <label><?php echo __('Margin Right', 'sk-wll'); ?>:</label>
                            <input type="text" value="<?php
                            $skwll_margin_right = get_option('skwll_margin_right');
                            if (!empty($skwll_margin_right)) {
                                echo $skwll_margin_right;
                            }
                            ?>"  class="skwll-login-form-margin-right"  placeholder="Eg. 10px"/>
                        </p>
                        <p >
                            <label><?php echo __('Margin Bottom', 'sk-wll'); ?>:</label>
                            <input type="text"  value="<?php
                            $skwll_margin_bottom = get_option('skwll_margin_bottom');
                            if (!empty($skwll_margin_bottom)) {
                                echo $skwll_margin_bottom;
                            }
                            ?>" class="skwll-login-form-margin-bottom"  placeholder="Eg. 10px"/>
                        </p>
                        <p class="skwll-margin-bottom-none-force">
                            <label><?php echo __('Margin Left', 'sk-wll'); ?>:</label>
                            <input type="text" value="<?php
                            $skwll_margin_left = get_option('skwll_margin_left');
                            if (!empty($skwll_margin_left)) {
                                echo $skwll_margin_left;
                            }
                            ?>" class="skwll-login-form-margin-left" placeholder="Eg. 10px"/>
                        </p>
                        <small class="skwll-small-hints"><?php echo __('Leave empty to use the default margin..', 'sk-wll'); ?></small>
                        <small class="skwll-small-hints"><?php echo __('Use margin left:auto,margin right:auto,margin top:0px,margin bottom:0px to center the form.', 'sk-wll'); ?></small>
                        <div class="uk-button-group uk-align-center uk-flex-center uk-text-center uk-margin-top">
                            <button class="uk-button uk-button-success skwll-save" data-save-action="skwll-login-form-margin-save-action"><?php echo __('Save', 'sk-wll') ?></button>
                        </div>
                    </div>
                </div>

                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Width ', 'sk-wll'); ?></h3>
                    <?php
                    $skwll_login_form_container_width = get_option('skwll_login_form_container_width');
                    ?>
                    <input class="skwll-login-form-container-width" type="text" value="<?php
                    if (!empty($skwll_login_form_container_width)) {
                        echo $skwll_login_form_container_width;
                    }
                    ?>" style="" placeholder="Eg. 100px or 100%"/>
                    <small class="skwll-small-hints"><?php echo __('Width of the element which contains the login form.Leave this empty to use the default width.', 'sk-wll'); ?></small>
                </div>

                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Border Radius ', 'sk-wll'); ?><input type="checkbox" <?php
                        $skwll_form_border_radius_status = get_option('skwll_border_radius_status');
                        if ($skwll_form_shadow_status) {
                            echo " checked='checked' ";
                        }
                        ?> style=" width: auto;" class="skwll-login-form-border-radius-status skwll-prevent-css" value="1"/></h3>
                    <div class="uk-width-medium-1-1">
                        <p>
                            <label><?php echo __('Border Radius Top', 'sk-wll'); ?>:</label>
                            <input type="text"  value="<?php
                            $skwll_border_radius_top = get_option('skwll_border_radius_top');
                            if (!empty($skwll_border_radius_top)) {
                                echo $skwll_border_radius_top;
                            }
                            ?>" class="skwll-login-form-border-radius-top"  placeholder="Eg. 10px"/>
                        </p>
                        <p>
                            <label><?php echo __('Border Radius Right', 'sk-wll'); ?>:</label>
                            <input type="text" value="<?php
                            $skwll_border_radius_right = get_option('skwll_border_radius_right');
                            if (!empty($skwll_border_radius_right)) {
                                echo $skwll_border_radius_right;
                            }
                            ?>"  class="skwll-login-form-border-radius-right"  placeholder="Eg. 10px"/>
                        </p>
                        <p>
                            <label><?php echo __('Border Radius Bottom', 'sk-wll'); ?>:</label>
                            <input type="text"  value="<?php
                            $skwll_border_radius_bottom = get_option('skwll_border_radius_bottom');
                            if (!empty($skwll_border_radius_bottom)) {
                                echo $skwll_border_radius_bottom;
                            }
                            ?>" class="skwll-login-form-border-radius-bottom"  placeholder="Eg. 10px"/>
                        </p>
                        <p class="skwll-margin-bottom-none-force">
                            <label><?php echo __('Border Radius Left', 'sk-wll'); ?>:</label>
                            <input type="text" value="<?php
                            $skwll_border_radius_left = get_option('skwll_border_radius_left');
                            if (!empty($skwll_border_radius_left)) {
                                echo $skwll_border_radius_left;
                            }
                            ?>" class="skwll-login-form-border-radius-left" placeholder="Eg. 10px"/>
                        </p>
                        <small class="skwll-small-hints"><?php echo __('Add border radius to the form..', 'sk-wll'); ?></small>


                    </div>
                </div>
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('Form Shadow ', 'sk-wll'); ?><input type="checkbox" <?php
                        $skwll_form_shadow_status = get_option('skwll_form_shadow_status');
                        if ($skwll_form_shadow_status) {
                            echo " checked='checked' ";
                        }
                        ?> style=" width: auto;" class="skwll-login-form-shadow-status skwll-prevent-css" value="1"/></h3>
                    <div class="uk-width-medium-1-1">
                        <p>
                            <label><?php echo __('Form Shadow Top', 'sk-wll'); ?>:</label>
                            <input type="text"  value="<?php
                            $skwll_form_shadow_top = get_option('skwll_form_shadow_top');
                            if (!empty($skwll_form_shadow_top)) {
                                echo $skwll_form_shadow_top;
                            }
                            ?>" class="skwll-login-form-shadow-top"  placeholder="Eg. 10px"/>
                        </p>
                        <p>
                            <label><?php echo __('Form Shadow Right', 'sk-wll'); ?>:</label>
                            <input type="text" value="<?php
                            $skwll_form_shadow_right = get_option('skwll_form_shadow_right');
                            if (!empty($skwll_form_shadow_right)) {
                                echo $skwll_form_shadow_right;
                            }
                            ?>"  class="skwll-login-form-shadow-right"  placeholder="Eg. 10px"/>
                        </p>
                        <p>
                            <label><?php echo __('Form Shadow Bottom', 'sk-wll'); ?>:</label>
                            <input type="text"  value="<?php
                            $skwll_form_shadow_bottom = get_option('skwll_form_shadow_bottom');
                            if (!empty($skwll_form_shadow_bottom)) {
                                echo $skwll_form_shadow_bottom;
                            }
                            ?>" class="skwll-login-form-shadow-bottom"  placeholder="Eg. 10px"/>
                        </p>
                        <p class="skwll-margin-bottom-none-force">
                            <label><?php echo __('Form Shadow Left', 'sk-wll'); ?>:</label>
                            <input type="text" value="<?php
                            $skwll_form_shadow_left = get_option('skwll_form_shadow_left');
                            if (!empty($skwll_form_shadow_left)) {
                                echo $skwll_form_shadow_left;
                            }
                            ?>" class="skwll-login-form-shadow-left" placeholder="Eg. 10px"/>
                        </p>
                        <small class="skwll-small-hints"><?php echo __('Add shadow to the form..', 'sk-wll'); ?></small>
                    </div>
                    <div class="uk-button-group uk-align-center uk-flex-center uk-text-center uk-margin-top">
                        <button class="uk-button uk-button-success skwll-save" data-save-action="login-form-customization"><?php echo __('Save', 'sk-wll') ?></button>
                    </div>
                </div>



            </div>
            <div class="uk-width-medium-1-3 skwll-widgets-margin-bottom">
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><?php echo __('More CSS ', 'sk-wll'); ?></h3>
                    <?php
                    $skwll_more_css = get_option('skwll_more_css');
                    ?>
                    <textarea class="skwll-more-css" value="" style="width: 100%" rows="5" placeholder="Eg. body{background-size:cover;}"><?php
                        if (!empty($skwll_more_css)) {
                            echo ($skwll_more_css);
                        }
                        ?></textarea>
                    <small class="skwll-small-hints"><?php echo __('Enter your custom css ,You can use classes,ids etc..', 'sk-wll'); ?></small>
                    <div class="uk-button-group uk-align-center uk-flex-center uk-text-center uk-margin-top">
                        <button class="uk-button uk-button-success skwll-save" data-save-action="more-css"><?php echo __('Save', 'sk-wll') ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>