<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @return string
     */
    function asset($path)
    {
        return base_url().ASSETS_URL.DIRECTORY_SEPARATOR.$path;
    }
}