<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
 * CodeIgniter Dump Helpers
 * 
 * @package CodeIgniter
 * @category Helpers
 * @author giorgosstab (tsaxre1991@hotmail.com)
 * @version 1.0
 */
if (! function_exists('dd')) {
    function dd($var, $show = TRUE, $exit = FALSE) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        die();
    }
}