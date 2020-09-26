<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		if(getenv('APP_DEBUG') == 'TRUE' || getenv('APP_DEBUG') == 'true') {
			if(getenv('APP_ENV') != "production") {
				$this->output->enable_profiler(TRUE);
			}
		}
    }

    public function preMiddleware() {
        if (!$this->ion_auth->logged_in()) {
          $url = parse_url(current_url());
          $this->session->set_userdata('prev_url',$url['path']);
//          redirect(route('admin.auth.index'), 'refresh');
        }
    }
}
