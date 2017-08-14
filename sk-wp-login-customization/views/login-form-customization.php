
<?php

echo "<style>";
echo "/** wordpress login logo **/";
$skwll_login_image = get_option('skwll_login_img');
$skwll_login_image_size = get_option('skwll_login_img_size');
$skwll_login_image_position = get_option('skwll_login_img_position');
$skwll_login_img_container_width = get_option('skwll_login_img_container_width');
$skwll_login_img_container_height = get_option('skwll_login_img_container_height');
$skwll_login_img_custom_css = get_option('skwll_login_img_custom_css');
if (!empty($skwll_login_image)) {
    $skwll_login_image = $this->skwllGetImage($skwll_login_image, 'full');
    echo " .login h1 a {       ";
    echo "background-image: url('$skwll_login_image') !important;";
    if (!empty($skwll_login_img_container_width)) {
        echo "width:$skwll_login_img_container_width !important;";
    }
    if (!empty($skwll_login_img_container_height)) {
        echo "height:$skwll_login_img_container_height !important;";
    }
    if (!empty($skwll_login_image_size) && $skwll_login_image_size != 'custom') {
        echo " background-size:$skwll_login_image_size !important;";
    }
    else {
        if (!empty($skwll_login_image_size) && $skwll_login_image_size == 'custom') {
            $skwll_login_img_size_custom = get_option('skwll_login_img_size_custom');
            echo " background-size:$skwll_login_img_size_custom !important;";
        }
    }
    if (!empty($skwll_login_image_position) && $skwll_login_image_position != 'custom') {
        echo " background-position:$skwll_login_image_position !important;";
    }
    else {
        if (!empty($skwll_login_image_position) && $skwll_login_image_position == 'custom') {
            $skwll_login_img_position_custom = get_option('skwll_login_img_position_custom');
            echo " background-position:$skwll_login_img_position_custom !important;";
        }
    }
    if (!empty($skwll_login_img_custom_css)) {
        echo ";$skwll_login_img_custom_css;";
    }
    echo "}";
}
$skwll_login_background_img = get_option('skwll_login_background_img');
$skwll_login_background_img_size = get_option('skwll_login_background_img_size');
$skwll_login_background_img_position = get_option('skwll_login_background_img_position');
$skwll_login_background_img_custom_css = get_option('skwll_login_background_img_custom_css');
if (!empty($skwll_login_background_img)) {
    $skwll_login_background_img = $this->skwllGetImage($skwll_login_background_img, 'full');
    echo " body {       ";
    echo "background-image: url('$skwll_login_background_img') !important;";
    if (!empty($skwll_login_background_img_size) && $skwll_login_background_img_size != 'custom') {
        echo " background-size:$skwll_login_background_img_size !important;";
    }
    else {
        if (!empty($skwll_login_background_img_size) && $skwll_login_background_img_size == 'custom') {
            $skwll_login_background_img_size_custom = get_option('skwll_login_background_img_size_custom');
            echo " background-size:$skwll_login_background_img_size_custom !important;";
        }
    }
    if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position != 'custom') {
        echo " background-position:$skwll_login_background_img_position !important;";
    }
    else {
        if (!empty($skwll_login_background_img_position) && $skwll_login_background_img_position == 'custom') {
            $skwll_login_background_img_position_custom = get_option('skwll_login_background_img_position_custom');
            echo " background-position:$skwll_login_background_img_position_custom !important;";
        }
    }
    if (!empty($skwll_login_background_img_custom_css)) {
        echo ";$skwll_login_background_img_custom_css;";
    }
    echo "}";
}
$skwll_more_css = get_option('skwll_more_css');
if (!empty($skwll_more_css)) {
    echo "$skwll_more_css";
}
$skwll_margin_left = get_option('skwll_margin_left');
$skwll_margin_right = get_option('skwll_margin_right');
$skwll_margin_top = get_option('skwll_margin_top');
$skwll_margin_bottom = get_option('skwll_margin_bottom');
$skwll_login_form_container_width = get_option('skwll_login_form_container_width');
echo "#login{";
echo (!empty($skwll_margin_left) ? ";margin-left:$skwll_margin_left !important;" : '');
echo (!empty($skwll_margin_left) ? ";margin-right:$skwll_margin_right !important;" : '');
echo (!empty($skwll_margin_left) ? ";margin-top:$skwll_margin_top !important;" : '');
echo (!empty($skwll_margin_left) ? ";margin-bottom:$skwll_margin_bottom !important;" : '');
echo (!empty($skwll_login_form_container_width) ? ";width:$skwll_login_form_container_width;" : '');
echo "}";

$skwll_border_radius_left = get_option('skwll_border_radius_left');
$skwll_border_radius_left = (!empty($skwll_border_radius_left) ? $skwll_border_radius_left : 0);
$skwll_border_radius_bottom = get_option('skwll_border_radius_bottom');
$skwll_border_radius_bottom = (!empty($skwll_border_radius_bottom) ? $skwll_border_radius_bottom : 0);
$skwll_border_radius_right = get_option('skwll_border_radius_right');
$skwll_border_radius_right = (!empty($skwll_border_radius_right) ? $skwll_border_radius_right : 0);
$skwll_border_radius_top = get_option('skwll_border_radius_top');
$skwll_border_radius_top = (!empty($skwll_border_radius_top) ? $skwll_border_radius_top : 0);
echo "form#loginform{";
echo "border-radius:$skwll_border_radius_top $skwll_border_radius_right $skwll_border_radius_bottom $skwll_border_radius_left !important;";

echo "}";
echo "</style>";
