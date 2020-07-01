<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
 
if (! function_exists('copyrights_helper')) {
    function copyrights_helper($year = 'auto') {
        if(intval($year) == 'auto') { 
            return $year = date('Y'); 
        }
        if(intval($year) == date('Y')) { 
            return intval($year); 
        }
        if(intval($year) < date('Y')) { 
            return intval($year) . ' - ' . date('Y');
        }
        if(intval($year) > date('Y')) { 
            return date('Y'); 
        } 
    }
}