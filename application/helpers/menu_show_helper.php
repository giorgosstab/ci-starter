<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Check if the function does not exists
if ( ! function_exists('menu_show'))
{
    // Slugify a string
    function menu_show($path, $className = 'active')
    {
        $CI =& get_instance();
        $uri_string = $CI->uri->uri_string();
        $prefix = ci()->route->getPrefix();

        // Home is usually at / && has 0 total segments
        if ($path === $prefix && ($CI->uri->total_segments() === 1)) {
            $class = 'active';
        } elseif($CI->uri->total_segments() === 2) {
            $class = ($uri_string === $path) ? $className : '';
        } elseif($CI->uri->total_segments() === 3) {
            $final_path = $path.'/'.$CI->router->fetch_method();
            $class = ($uri_string === $final_path) ? $className : '';
        } else {
            $final_path = $path.'/'.$CI->uri->segment(3).'/'.$CI->router->fetch_method();
            $class = ($uri_string === $final_path) ? $className : '';
        }

        return $class;
    }
}