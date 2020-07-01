<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RouteAjaxMiddleware implements Luthier\MiddlewareInterface
{

    /**
     * Middleware entry point
     *
     * @return void
     */
    public function run($args = [])
    {
        if(!ci()->input->is_ajax_request())
        {
            trigger_404();
        }
    }
}