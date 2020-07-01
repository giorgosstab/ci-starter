<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Check if the function does not exists
if ( ! function_exists('slugify'))
{
    // Slugify a string
    function slugify($string)
    {
        // Get an instance of $this
        $CI =& get_instance(); 

        $CI->load->helper('text');
        $CI->load->helper('url');

        // Replace unsupported characters (add your owns if necessary)
        $string = str_replace("'", '-', $string);
        $string = str_replace(".", '-', $string);
        $string = str_replace("²", '2', $string);

        // Slugify and return the string
        return url_title(convert_accented_characters($string), 'dash', true);
    }
}