<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
        $data['main_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
	}
}
