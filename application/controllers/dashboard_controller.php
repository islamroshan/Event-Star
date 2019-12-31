<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {
	public function index()
	{
        $data['main_view'] = 'dashboard_view';
        $this->load->view('layouts/main',$data);
	}
}
