<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Check if the function does not exists
if ( ! function_exists('price_format'))
{
    // Slugify a string
    function price_format($value, $decimal_place, $currency = TRUE)
    {
        echo $currency ? number_format($value, (int)$decimal_place, '.', ','). ' &euro;' : number_format($value, (int)$decimal_place, '.', ',');
    }
}