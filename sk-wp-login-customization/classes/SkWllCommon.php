<?php

class SkWllCommon {

    public function skwllIncludeTemplate($template_name, $sk_dnd_ap_template_data = array()) {
        require_once SK_WLL_VIEWS_PATH  . '/' . $template_name . '.php';
    }

}
