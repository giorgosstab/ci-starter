<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->config->load('api_session', TRUE);
        $this->load->library(array('API_Session'));
        $this->api_session->gc($this->config->item('api_session_expiration', 'api_session'));
    }

    public function preMiddleware() {
        if (!$this->ion_auth->logged_in()) {
          $url = parse_url(current_url());
          $this->session->set_userdata('prev_url',$url['path']);
          redirect(route('admin.auth.index'), 'refresh');
        }
    }
}
