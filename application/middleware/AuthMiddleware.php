<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthMiddleware implements Luthier\MiddlewareInterface
{
    /**
     * Middleware entry point
     *
     * @return void
     */
    public function run($args)
    {
        if (!ci()->ion_auth->logged_in()) {
            // $url = parse_url(current_url());
            // $this->session->set_userdata('prev_url',$url['path']);
            redirect(route('admin.auth.index'), 'refresh');
        }
    }
}