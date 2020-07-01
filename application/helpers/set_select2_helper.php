<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
 
if (! function_exists('set_select2')) {
    function set_select2($field_name, $data_value, $data_get) {
        return set_select($field_name, $data_value, ( !empty($data_get) && $data_get == $data_value ? TRUE : FALSE ));
    }
}