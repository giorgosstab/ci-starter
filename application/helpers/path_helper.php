<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
 
if (! function_exists('path')) {
    function path() {
        return base_url().ASSETS_URL;
    }
}